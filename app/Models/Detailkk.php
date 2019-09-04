<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailkk extends Model
{
    use SoftDeletes;

    public $table = 'detail_k_ks';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nik',
        'nomor_surat',
        'nama_lengkap',
        'status'
    ];

    protected $casts = [
        'nik'           => 'string',
        'nomor_surat'   => 'string',
        'nama_lengkap'  => 'string',
        'status'        => 'enum'
    ];

    public static $rules = [
        'nik'           => 'required',
        'nomor_surat'   => 'required',
        'nama_lengkap'  => 'required',
        'status'        => 'nullable'
    ];

    public function formpengajuankk()
    {
        return $this->belongsTo('App\Models\FormPengajuanKK', 'nomor_surat', 'nomor_surat');
    }

}
