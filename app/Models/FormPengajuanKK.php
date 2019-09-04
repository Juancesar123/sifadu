<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormPengajuanKK extends Model
{
    use SoftDeletes;

    public $table   = 'form_pengajuan_kks';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nik_atau_nama',
        'nomor_surat',
        'telepon',
        'jumlah_keluarga',
        'footer_cetak_data'
    ];

    public function dataPenduduk()
    {
        return $this->belongsTo('App\Models\datapenduduk', 'nik_atau_nama', 'id');
    }

    public function detailkk()
    {
        return $this->hasMany('App\Models\Detailkk', 'nomor_surat', 'nomor_surat');
    }

  

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nik_atau_nama' => 'string',
        'nomor_surat' => 'string',
        'telepon' => 'string',
        'jumlah_keluarga' => 'int',
        'footer_cetak_data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik_atau_nama' => 'required',
        'nomor_surat' => 'nullable',
        'telepon' => 'required',
        'jumlah_keluarga' => 'required',
        'footer_cetak_data' => 'required'
    ];

    public function syncDetailkk()
    {
        return $this->belongsToMany('App\Models\FormPengajuanKK', 'detail_k_ks', 'nomor_surat', 'nomor_surat')
                    ->withPivot('nik', 'nama_lengkap', 'nomor_surat', 'status', 'created_at', 'updated_at');
    }
}
