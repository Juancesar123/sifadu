<?php

namespace App\Models\Adum;

use Illuminate\Database\Eloquent\Model;

class BukuPeraturan extends Model
{
    protected $table = 'adum_buku_peraturans';

    protected $primaryKey = 'abp_id';

    protected $fillable = [
        'abp_nomor_urut',
        'abp_jenis_peraturan',
        'abp_tanggal_tetap',
        'abp_tentang',
        'abp_uraian_singkat',
        'abp_tanggal_sepakat',
        'abp_tanggal_lapor',
        'abp_tanggal_undang_lembaran',
        'abp_tanggal_undang_berita',
        'abp_keterangan'        
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
