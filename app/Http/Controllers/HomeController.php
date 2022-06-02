<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Message;
use App\Http\Controllers\MessageController;

class HomeController extends Controller
{
    public function findcar()
    {
        $data = [
            'cars' => Car::all(),
        ];

        return view('home.findcar', $data);
    }

    public function find_detail(Request $request, $id)
    {
        $data = [
            'car' => Car::find($id),
            'order' => Message::where('order', $id)->count(),
        ];

        return view('home.find_detail', $data);
    }

    public function message_send(Request $request)
    {
        $message = new MessageController();
        $message->message_add($request);

        return redirect()->back();
    }
}
