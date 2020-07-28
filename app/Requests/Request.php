<?php

namespace App\Requests;


class Request
{
    public function setCompagnies()
    {
        return request()->validate([
            'name' => 'required',
            'type' => 'required',
            'date' => 'required',
            'employes' =>'required'
        ]);
    }


}
