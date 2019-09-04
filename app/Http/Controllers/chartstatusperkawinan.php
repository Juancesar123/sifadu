<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chartstatusperkawinan extends Controller
{
    public function index(){
        return view('statistikstatusperkawinan.index');
    }
}
