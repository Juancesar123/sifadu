<?php
/*
 * Created by Arif Budiman
 * Updated by Arif Budiman
 */

namespace App\Http\Requests\Pertanahan;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pertanahan\Blok;

class CreateBlokRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Blok::$rules;
    }
    
}
