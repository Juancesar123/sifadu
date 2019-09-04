<?php

namespace App\Repositories;

use App\Models\suratpengantarkk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratpengantarkkRepository
 * @package App\Repositories
 * @version August 10, 2018, 3:56 am UTC
 *
 * @method suratpengantarkk findWithoutFail($id, $columns = ['*'])
 * @method suratpengantarkk find($id, $columns = ['*'])
 * @method suratpengantarkk first($columns = ['*'])
*/
class suratpengantarkkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik_atau_nama',
        'nomor_surat',
        'telepon',
        'jumlah_keluarga',
        'footer_cetak_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return suratpengantarkk::class;
    }
}
