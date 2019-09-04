<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datapenduduk as Datapenduduk;
class chartpendidikan extends Controller
{
    public function index(){
        return view('statistikpendidikan.index');
    }
    public function getdata(){
        $data = Datapenduduk::all();
        return $data;
    }
}
