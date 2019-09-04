<?php

namespace App\Models\Adum;

use Illuminate\Database\Eloquent\Model;

class BukuAparat extends Model
{
    protected $table = 'adum_buku_aparats';

    protected $primaryKey = 'abap_id';

    protected $fillable = [
        'abap_id',
        'abap_nomor_urut',
        'abap_nama',
        'abap_no_aparat',
        'abap_no_pegawai',
        'abap_jenis_kelamin',
        'abap_ttl',
        'abap_agama',
        'abap_golongan',
        'abap_jabatan',
        'abap_pendidikan',
        'abap_no_tanggal_pengangkatan',
        'abap_no_tanggal_pemberhentian',
        'abap_ket'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
