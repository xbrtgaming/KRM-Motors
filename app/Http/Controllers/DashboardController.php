<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

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
}
