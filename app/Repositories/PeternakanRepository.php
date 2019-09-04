<?php

namespace App\Repositories;

use App\Models\Peternakan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PeternakanRepository
 * @package App\Repositories
 * @version December 4, 2018, 6:50 am UTC
 *
 * @method Peternakan findWithoutFail($id, $columns = ['*'])
 * @method Peternakan find($id, $columns = ['*'])
 * @method Peternakan first($columns = ['*'])
*/
class PeternakanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_lahan',
        'jenis_budidaya',
        'pengelola',
        'penanggung_jawab',
        'luas_area',
        'masa_pengelolaan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Peternakan::class;
    }
}
