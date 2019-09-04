<?php

namespace App\Repositories\Adum;

use InfyOm\Generator\Common\BaseRepository;
use App\Models\Adum\Ekspedisi;

/**
 * Class LembaranBeritaRepository
 * @package App\Repositories\Adum
*/
class EkspedisiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'eksped_tanggal',
        'eksped_tanggal_surat',
        'eksped_nomor_surat',
        'eksped_penerima',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ekspedisi::class;
    }
}
