<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends controller
{
    public function index()
    {
        return view('pages.dashboard');
    }
}
