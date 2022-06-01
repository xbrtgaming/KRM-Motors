<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Car;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::count(),
            'message' => Message::count(),
            'car' => Car::count(),
        ];

        return view('dashboard/index', compact('data'));
    }
}
