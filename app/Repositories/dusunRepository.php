<?php

namespace App\Repositories;

use App\Models\dusun;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class dusunRepository
 * @package App\Repositories
 * @version August 14, 2018, 9:15 am UTC
 *
 * @method dusun findWithoutFail($id, $columns = ['*'])
 * @method dusun find($id, $columns = ['*'])
 * @method dusun first($columns = ['*'])
*/
class dusunRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_dusun'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return dusun::class;
    }
}
