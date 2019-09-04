<?php

namespace App\Http\Requests\Adum;

use Illuminate\Foundation\Http\FormRequest;

class LembaranBeritaRequest extends FormRequest
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
        return [
            'lember_perdes_id' => 'required|integer',
            'lember_nomor' => 'required|string',
            'lember_tanggal' => 'required|date',
            'lember_tentang' => 'required|string',
            'lember_nomor_uu' => 'required|string',
            'lember_tanggal_uu' => 'required|date',
            'lember_keterangan' => 'string',
        ];
    }
}
