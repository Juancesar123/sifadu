<?php

namespace App\Repositories;

use App\Models\ParameterIndikatorKemiskinan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ParameterIndikatorKemiskinanRepository
 * @package App\Repositories
 * @version September 17, 2019, 2:46 am UTC
 *
 * @method ParameterIndikatorKemiskinan findWithoutFail($id, $columns = ['*'])
 * @method ParameterIndikatorKemiskinan find($id, $columns = ['*'])
 * @method ParameterIndikatorKemiskinan first($columns = ['*'])
*/
class ParameterIndikatorKemiskinanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'indikator_kemiskinan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ParameterIndikatorKemiskinan::class;
    }
}
