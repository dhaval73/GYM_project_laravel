<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchedualController extends Controller
{
    public function index()
    {
        return view('frontend/schedual');
    }
}
