<?php

namespace App\Http\Requests\Adum;

use Illuminate\Foundation\Http\FormRequest;

class EkspedisiRequest extends FormRequest
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
            'eksped_tanggal' => 'required|date',
            'eksped_tanggal_surat' => 'required|date',
            'eksped_nomor_surat' => 'required|string',
            'eksped_isi' => 'required|string',
            'eksped_penerima' => 'required|string',
        ];
    }
}
