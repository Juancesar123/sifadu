<?php

namespace App\Models;

use Eloquent as Model;

class Profil extends Model
{
    public $table = 'profil';

    public $fillable = [
        'profil_kode',
        'profil_nama',
        'profil_propinsi',
        'profil_kabupaten',
        'profil_kecamatan',
        'profil_alamat',
        'profil_kode_pos',
        'profil_luas',
        'profil_latitude',
        'profil_longitude',
        'profil_koordinate',
        'profil_batas',
		'profil_logo',
		'profil_jumlah_penduduk'
    ];

    protected $dates = ['created_at', 'updated_at'];
}