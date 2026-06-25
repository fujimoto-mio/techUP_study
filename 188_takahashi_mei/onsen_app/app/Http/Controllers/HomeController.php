<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
{
    $images = ['onsen1.jpg', 'onsen2.jpg', 'onsen3.jpg'];
    $image = $images[array_rand($images)];

    return view('home', compact('image'));
}


}
