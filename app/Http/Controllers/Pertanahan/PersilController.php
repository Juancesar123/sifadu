<?php
/*
 * Created by Arif Budiman
 * Updated by Arif Budiman
 */

namespace App\Http\Controllers\Pertanahan;

use App\Http\Requests;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PersilController extends AppBaseController
{
    
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('pertanahan.persil.index');
    }
    
}
