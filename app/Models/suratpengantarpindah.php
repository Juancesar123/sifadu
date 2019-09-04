<?php
    /**
     * Author:Dodi
     * Tampilan : Surat Pengantar Pindah
     */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class suratpengantarpindah extends Model
{
    use SoftDeletes;

    public $table = 'suratpengantarpindah';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_atau_nik',
        'nomor_surat',
        'footer_cetak_data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_atau_nik' => 'string',
        'nomor_surat' => 'string',
        'footer_cetak_data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_atau_nik' => 'required',
        'nomor_surat' => 'required',
        'footer_cetak_data' => 'required'
    ];

    
}