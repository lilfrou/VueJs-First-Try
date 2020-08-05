<?php

namespace App\Http\Controllers;

use App\User;
use App\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }
    public function get()
    {

        $contacts = $this->user->where('id','!=',Auth()->id())->latest()->get();

        return $contacts;
    }

}
