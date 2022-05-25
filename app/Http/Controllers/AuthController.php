<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('register');
    }

    public function register_act(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'number' => ['required', 'unique:users', 'numeric', 'min:10'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'same:confirm_password', 'min:8'],
            'confirm_password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'number' => $request->number,
            'level' => "user",
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
