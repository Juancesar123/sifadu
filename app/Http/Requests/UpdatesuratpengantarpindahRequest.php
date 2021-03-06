<?php
    /**
     * Author:Dodi
     * Tampilan : Surat Pengantar Pindah
     */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\suratpengantarpindah;

class UpdatesuratpengantarpindahRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return suratpengantarpindah::$rules;
    }
}