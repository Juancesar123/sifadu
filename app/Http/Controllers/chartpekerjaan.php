<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chartpekerjaan extends Controller
{
    public function index(){
        return view('statistikpekerjaan.index');
    }
}
