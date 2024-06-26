<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('throttle:5,1')->only('login');
    }

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
        return $this->sendFailedLoginResponse($request);
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

    /**
     * Mengirim respons jika login gagal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => 'Incorrect username or password.'];

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $errors = [$this->username() => 'You have been locked out due to too many failed login attempts. Please try again in ' . $this->decayMinutes() * 60 . ' seconds.'];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
