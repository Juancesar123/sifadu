<?php

namespace App\Http\Requests\Adum;

use Illuminate\Foundation\Http\FormRequest;

class BukuAgendaRequest extends FormRequest
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
            'aba_tanggal' => 'required',
            'aba_jenis_surat' => 'required',
            'aba_nomor_surat' => 'required',
            'aba_tanggal_surat' => 'required',
        ];
    }
}
