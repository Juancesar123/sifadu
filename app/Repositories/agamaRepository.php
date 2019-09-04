<?php

namespace App\Repositories;

use App\Models\Agama;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class agamaRepository
 * @package App\Repositories
 * @version August 14, 2018, 9:19 am UTC
 *
 * @method agama findWithoutFail($id, $columns = ['*'])
 * @method agama find($id, $columns = ['*'])
 * @method agama first($columns = ['*'])
*/
class agamaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'agama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agama::class;
    }
}
