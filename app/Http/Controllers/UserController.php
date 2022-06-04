<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Http\Controllers\AuthController\register_act;
use App\Http\Controllers\AuthController\reset_password;

class UserController extends Controller
{
    public function user()
    {
        $user = User::all();
        return view('dashboard.user.index', compact('user'));
    }

    public function admin_register(Request $request)
    {
        $register = new AuthController;
        $register->register_act($request);

        $toast = [
            'title' => 'Success',
            'message' => 'New user has been added',
            'type' => 'success',
        ];

        return redirect()->back()->with($toast);
    }

    public function user_delete($id)
    {
        User::find($id)->delete();

        $toast = [
            'title' => 'Success',
            'message' => 'User has been removed',
            'type' => 'success',
        ];
        return redirect()->back()->with($toast);
    }

    public function user_edit(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'number' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'email'],
            'level' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'level' => $request->level,
        ];

        User::find($id)->update($data);

        $toast = [
            'title' => 'Success',
            'message' => 'User has been updated',
            'type' => 'success',
        ];
        return redirect()->back()->with($toast);
    }

    public function reset_pass(Request $request, $id)
    {
        $user = new AuthController;
        $user->reset_password($request, $id);
        $toast = [
            'title' => 'Success',
            'type' => 'success',
            'message' => 'Password has been reset',
        ];
        return redirect()->back()->with($toast);
    }
}
