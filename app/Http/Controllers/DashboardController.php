<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Http\Controllers\AuthController\register_act;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::count(),
            'message' => Message::count(),
        ];

        return view('dashboard/index', compact('data'));
    }

    public function user()
    {
        $user = User::all();
        return view('dashboard/user', compact('user'));
    }

    public function admin_register(Request $request)
    {
        $register = new AuthController;
        $register->register_act($request);

        return redirect()->route('user');
    }

    public function user_delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('user');
    }
}
