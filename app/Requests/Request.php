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
            'employes' =>'required',
            'image' => 'required'
        ]);
    }
    public function saveFile($date, $name)
    {
        if(request()->has($name)) {
            $date->update([$name => request($name)->store($name, 'public')]);
        }
    }


}
