<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataKosongController extends Controller
{
    public function index()
    {
    	return view('datakosong/index');
    }
}
