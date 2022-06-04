<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

        if ($request->remember == "on") {
            $request->session()->put('remember', true);
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
        if (Route::currentRouteName() == 'user_register') {
            $request->validate([
                'name' => ['required'],
                'number' => ['required', 'unique:users', 'numeric', 'min:10'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'same:confirm_password', 'min:8'],
                'confirm_password' => ['required'],
            ]);
        } else if (Route::currentRouteName() == 'admin_register') {
            $request->validate([
                'name' => ['required'],
                'number' => ['required', 'unique:users', 'numeric', 'min:10'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:8'],
            ]);
        }

        $data = [
            'name' => $request->name,
            'number' => $request->number,
            'level',
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        if (Route::currentRouteName() == 'user_register') {
            $data['level'] = 'user';
        } else if (Route::currentRouteName() == 'admin_register') {
            $data['level'] = $request->level;
        }

        $user = User::create([
            'name' => $data['name'],
            'number' => $data['number'],
            'level' => $data['level'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function user_register(Request $request)
    {
        $this->register_act($request);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function reset_password(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'same:password_confirm', 'min:8'],
            'password_confirm' => ['required'],
        ]);

        $data = [
            'password' => bcrypt($request->password),
        ];

        User::find($id)->update($data);
    }
}
