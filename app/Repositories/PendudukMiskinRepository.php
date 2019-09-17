<?php

namespace App\Repositories;

use App\Models\PendudukMiskin;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PendudukMiskinRepository
 * @package App\Repositories
 * @version September 17, 2019, 2:57 am UTC
 *
 * @method PendudukMiskin findWithoutFail($id, $columns = ['*'])
 * @method PendudukMiskin find($id, $columns = ['*'])
 * @method PendudukMiskin first($columns = ['*'])
*/
class PendudukMiskinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_penduduk',
        'id_indikator_kemiskinan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PendudukMiskin::class;
    }
}
