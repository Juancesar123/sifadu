<?php

namespace App\Repositories;

use App\Models\Perikanan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PerikananRepository
 * @package App\Repositories
 * @version December 4, 2018, 6:53 am UTC
 *
 * @method Perikanan findWithoutFail($id, $columns = ['*'])
 * @method Perikanan find($id, $columns = ['*'])
 * @method Perikanan first($columns = ['*'])
*/
class PerikananRepository extends BaseRepository
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
        return Perikanan::class;
    }
}
