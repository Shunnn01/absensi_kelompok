<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('login')
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Akun belum terdaftar. Silakan daftar terlebih dahulu.',
                ]);
        }

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('landing')); // Diubah ke 'landing'
        }

        return redirect()->route('login')
            ->withInput($request->only('email'))
            ->withErrors([
                'password' => 'Password salah. Silakan coba lagi.',
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('landing'); // Diubah ke 'landing'
    }
}