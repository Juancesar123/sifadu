<?php

namespace App\Models\Adum;

use Illuminate\Database\Eloquent\Model;

class BukuAgenda extends Model
{
    protected $table = 'adum_buku_agendas';

    protected $primaryKey = 'aba_id';

    protected $fillable = [
        'aba_nomor_urut',
        'aba_tanggal',
        'aba_jenis_surat',
        'aba_nomor_surat',
        'aba_tanggal_surat',
        'aba_pengirim_surat',
        'aba_tujuan_surat',
        'aba_isi_surat',
        'aba_keterangan_surat',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
