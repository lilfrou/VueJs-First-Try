<?php

namespace App\Http\Controllers;

use App\User;
use App\Requests\Request;

class ContactsController extends Controller
{
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }
    public function get()
    {

        $contacts = $this->user->latest()->get();

        return $contacts;
    }

}
