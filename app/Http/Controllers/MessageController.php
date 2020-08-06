<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
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
      // mark all messages with the selected contact as read
      Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

      // get all messages between the authenticated user and the selected user
      $messages = Message::where(function($q) use ($id) {
          $q->where('from', auth()->id());
          $q->where('to', $id);
      })->orWhere(function($q) use ($id) {
          $q->where('from', $id);
          $q->where('to', auth()->id());
      })
      ->get();
        return $messages;
    }
    public function send()
    {
        $message = $this->message::create([
            'from' => Auth::user()->id,
            'to' => $this->request->contact_id,
            'text' => $this->request->text
        ]);
        broadcast(new NewMessage($message));

        return $message;
    }
}
