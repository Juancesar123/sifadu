<?php

namespace App\Repositories\Adum;

use InfyOm\Generator\Common\BaseRepository;
use App\Models\Adum\LembaranBerita;

/**
 * Class LembaranBeritaRepository
 * @package App\Repositories\Adum
*/
class LembaranBeritaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lember_nomor',
        'lember_tanggal',
        'lember_tentang',
        'lember_nomor_uu',
        'lember_tanggal_uu',
        'lember_keterangan',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LembaranBerita::class;
    }
}
