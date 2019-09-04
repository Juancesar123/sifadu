<?php

namespace App\Models\Adum;

use Illuminate\Database\Eloquent\Model;

class BukuKeputusan extends Model
{
    protected $table = 'adum_buku_keputusans';

    protected $primaryKey = 'abk_id';

    protected $fillable = [
        'abk_id',
        'abk_nomor_urut',
        'abk_nomor_tanggal',
        'abk_tentang',
        'abk_uraian_singkat',
        'abk_nomor_tanggal_lapor',
        'abk_keterangan'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
