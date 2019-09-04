<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Detailkk as detailkk;

class CreateDetailkkRequest extends FormRequest
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
       $rules['nomor_surat'] = 'required';

       if (!empty(array_filter(\Request::input('nama_lengkap')))) {
           $rulePenduduk = [
           'nik.*' => 'required',
           'nama_lengkap.*' => 'required'
           ];

           $rules = array_merge($rules, $rulePenduduk);
       }

       return $rules;
    }
}
