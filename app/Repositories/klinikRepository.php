<?php

namespace App\Repositories;

use App\Models\klinik;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pendudukmeninggalRepository
 * @package App\Repositories
 * @version August 9, 2018, 4:01 am UTC
 *
 * @method pendudukmeninggal findWithoutFail($id, $columns = ['*'])
 * @method pendudukmeninggal find($id, $columns = ['*'])
 * @method pendudukmeninggal first($columns = ['*'])
*/
class klinikRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'daftar_sarana',
        'penanggungjawab',
        'lokasi',
        'kondisi',
        'sdm'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return klinik::class;
    }
}
