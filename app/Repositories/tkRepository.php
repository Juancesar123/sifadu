<?php

namespace App\Repositories;

use App\Models\tk;
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
class tkRepository extends BaseRepository
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
        return tk::class;
    }
}
