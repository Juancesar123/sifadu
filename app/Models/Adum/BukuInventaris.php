<?php

namespace App\Models\Adum;

use Illuminate\Database\Eloquent\Model;

class BukuInventaris extends Model
{
    protected $table = 'adum_buku_inventaris';

    protected $primaryKey = 'abi_id';

    protected $fillable = [
        'abi_id',
        'abi_nomor_urut',
        'abi_jenis_inventaris',
        'abi_dibeli_sendiri',
        'abi_bantuan_pemerintah',
        'abi_bantuan_provinsi',
        'abi_bantuan_kabkota',
        'abi_sumbangan',
        'abi_awal_baik',
        'abi_awal_rusak',
        'abi_hapus_rusak',
        'abi_hapus_dijual',
        'abi_hapus_disumbangkan',
        'abi_tanggal_hapus',
        'abi_akhir_baik',
        'abi_akhir_rusak',
        'ket'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
