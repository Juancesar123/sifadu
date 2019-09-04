<?php

namespace App\Repositories\Adum;

use InfyOm\Generator\Common\BaseRepository;
use App\Models\Adum\BukuPeraturan;

/**
 * Class BukuPeraturanRepository
 * @package App\Repositories\Adum
*/
class BukuPeraturanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'abp_id',
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BukuPeraturan::class;
    }
}
