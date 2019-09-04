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

class ArsipDigitalLetterCController extends AppBaseController
{
    
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('pertanahan.arsip-digital-letter-c.index');
    }
    
}
