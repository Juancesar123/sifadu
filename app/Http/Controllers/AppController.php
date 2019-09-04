<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;

class AppController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.index');
    }

    public function updateCenter(Request $request)
    {
        $input = $request->all();

        $path = config_path('map.php');
        $contents = File::get($path);
        $oldVal = config('map.center');
        
        $content = str_replace(
            $oldVal, $input['lat'].'_'.$input['lng'], $contents);
    
        File::put($path, $content);
        
        return response()->json($input);
    }

}
