<?php

namespace App\Models\Adum;

use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    protected $table = 'adum_ekspedisi';

    protected $primaryKey = 'eksped_id';

    protected $fillable = [
        'eksped_tanggal',
        'eksped_tanggal_surat',
        'eksped_nomor_surat',
        'eksped_isi',
        'eksped_penerima',
        'eksped_keterangan',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
