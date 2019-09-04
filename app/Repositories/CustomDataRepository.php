<?php

namespace App\Repositories;

use App\Models\CustomData;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CustomDataRepository
 * @package App\Repositories
 * @version June 15, 2019, 3:47 pm UTC
 *
 * @method CustomData findWithoutFail($id, $columns = ['*'])
 * @method CustomData find($id, $columns = ['*'])
 * @method CustomData first($columns = ['*'])
*/
class CustomDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'category',
        'description',
        'option',
        'geom'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomData::class;
    }
}
