<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function message()
    {
        $message = Message::all();
        return view('dashboard.message.index', compact('message'));
    }

    public function message_add(Request $request)
    {
        $request->validate([
            'order' => 'required',
            'email' => 'required|email|unique:messages',
            'number' => 'required|numeric|unique:messages',
            'message' => 'required',
        ]);

        $data = [
            'order' => $request->order,
            'email' => $request->email,
            'number' => $request->number,
            'message' => $request->message,
        ];

        Message::create($data);

        $toast = [
            'title' => 'Success',
            'message' => 'Message has been sent',
            'type' => 'success',
        ];

        return redirect()->back()->with($toast);
    }

    public function message_confirm($id)
    {
        Message::find($id)->delete();
        return redirect()->back();
    }
}
