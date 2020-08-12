<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
    	$imageName = time().'.'.$request->image->getClientOriginalExtension();
        $path=$request->image->move(public_path('images'), $imageName);
        Image::create(['image'=>$path , 'name' => $request->name]);
    	return response()->json(['success'=>'You have successfully upload image.']);
    }
}
