<?php

namespace App\Models\Adum;

use Illuminate\Database\Eloquent\Model;

class LembaranBerita extends Model
{
    protected $table = 'adum_lembaran_berita';

    protected $primaryKey = 'lember_id';

    protected $fillable = [
        'lember_perdes_id',
        'lember_nomor',
        'lember_tanggal',
        'lember_tentang',
        'lember_nomor_uu',
        'lember_tanggal_uu',
        'lember_keterangan',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function perdes()
    {
        return $this->belongsTo('App\Models\PeraturanDesa', 'lember_perdes_id', 'perdes_id');
    }
}
