<?php

namespace App\Http\Homecontroller;
use illuminate\Http\request;

public function index()
{
    return view('home');
}

public function about()
{
    return view('about');
}
