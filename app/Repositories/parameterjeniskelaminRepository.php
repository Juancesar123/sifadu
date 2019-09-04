<?php

namespace App\Repositories;

use App\Models\parameterjeniskelamin;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class parameterjeniskelaminRepository
 * @package App\Repositories
 * @version August 14, 2018, 8:03 am UTC
 *
 * @method parameterjeniskelamin findWithoutFail($id, $columns = ['*'])
 * @method parameterjeniskelamin find($id, $columns = ['*'])
 * @method parameterjeniskelamin first($columns = ['*'])
*/
class parameterjeniskelaminRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis_kelamin'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return parameterjeniskelamin::class;
    }
}
