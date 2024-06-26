<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan formulir login.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses login pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, arahkan ke lokasi yang ditentukan
            return redirect()->intended('/dashboard');
        }

        // Jika otentikasi gagal, kembalikan ke halaman login dengan pesan kesalahan
        return redirect()->back()->withErrors(['email' => 'Email atau kata sandi salah']);
    }

    /**
     * Keluar dari aplikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
    $errors = $this->username() ;

    if ($request->expectsJson()) {
        return response()->json($errors, 422);
    }

    return redirect()->back()
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors($errors);
}
}
