<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.edit')->withErrors($validator);
        }

        $user = Auth::user();
        $nameChanged = $emailChanged = false;

        // Periksa perubahan nama
        if ($user->name !== $request->input('name')) {
            $nameChanged = true;
        }

        // Periksa perubahan email
        if ($user->email !== $request->input('email')) {
            $emailChanged = true;
        }

        // Simpan perubahan
        if ($nameChanged) {
            $user->name = $request->input('name');
        }

        if ($emailChanged) {
            $user->email = $request->input('email');
            $user->email_verified_at = null;
        }

        // Tangani upload gambar
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures','public');
            $user->profile_picture = $path;
        }

        // Simpan user
        $user->save();

        // Setel pesan sukses berdasarkan perubahan
        if ($nameChanged && $emailChanged) {
            $message = 'You have successfully changed your username and email.';
        } elseif ($nameChanged) {
            $message = 'You have successfully changed your username.';
        } elseif ($emailChanged) {
            $message = 'You have successfully changed your email.';
        } 
        else {
            $message = 'changes were made.';
        }

        return redirect()->route('profile.edit')->with('status', $message);
    }

    /**
     * Remove the user's profile picture.
     */
    public function removePicture(Request $request): RedirectResponse
    {
        $user = Auth::user();
        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('status', 'Profile picture removed successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}