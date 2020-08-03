<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct(Message $message, Request $request)
    {
        $this->message = $message;
        $this->request = $request;
    }

    public function getMessagesFor($id)
    {
        $messages = $this->message::where('to', $id)->orWhere('from', $id)->get();
        return $messages;
    }
    public function send()
    {
        $message = $this->message::create([
            'from' => Auth::user()->id,
            'to' => $this->request->contact_id,
            'text' => $this->request->text
        ]);
        return $message;
    }
}
