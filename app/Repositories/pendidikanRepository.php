<?php

namespace App\Repositories;

use App\Models\pendidikan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pendidikanRepository
 * @package App\Repositories
 * @version August 14, 2018, 9:11 am UTC
 *
 * @method pendidikan findWithoutFail($id, $columns = ['*'])
 * @method pendidikan find($id, $columns = ['*'])
 * @method pendidikan first($columns = ['*'])
*/
class pendidikanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pendidikan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pendidikan::class;
    }
}
