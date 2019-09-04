<?php

namespace App\Repositories\Adum;

use InfyOm\Generator\Common\BaseRepository;
use App\Models\Adum\BukuKeputusan;

/**
 * Class BukuKeputusanRepository
 * @package App\Repositories\Adum
*/
class BukuKeputusanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'abk_nomor_urut',
        'abk_nomor_tanggal',
        'tentang',
        'abk_uraian_singkat',
        'abk_nomor_tanggal_lapor',
        'abk_keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BukuKeputusan::class;
    }
}
