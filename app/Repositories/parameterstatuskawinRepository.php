<?php

namespace App\Repositories;

use App\Models\parameterstatuskawin;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class parameterstatuskawinRepository
 * @package App\Repositories
 * @version August 14, 2018, 8:06 am UTC
 *
 * @method parameterstatuskawin findWithoutFail($id, $columns = ['*'])
 * @method parameterstatuskawin find($id, $columns = ['*'])
 * @method parameterstatuskawin first($columns = ['*'])
*/
class parameterstatuskawinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_nikah'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return parameterstatuskawin::class;
    }
}
