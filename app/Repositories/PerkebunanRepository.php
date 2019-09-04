<?php

namespace App\Repositories;

use App\Models\Perkebunan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PerkebunanRepository
 * @package App\Repositories
 * @version December 4, 2018, 6:35 am UTC
 *
 * @method Perkebunan findWithoutFail($id, $columns = ['*'])
 * @method Perkebunan find($id, $columns = ['*'])
 * @method Perkebunan first($columns = ['*'])
*/
class PerkebunanRepository extends BaseRepository
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
        return Perkebunan::class;
    }
}
