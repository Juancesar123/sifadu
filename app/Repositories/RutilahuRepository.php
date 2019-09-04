<?php

namespace App\Repositories;

use App\Models\Rutilahu;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RutilahuRepository
 * @package App\Repositories
 * @version December 4, 2018, 7:03 am UTC
 *
 * @method Rutilahu findWithoutFail($id, $columns = ['*'])
 * @method Rutilahu find($id, $columns = ['*'])
 * @method Rutilahu first($columns = ['*'])
*/
class RutilahuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_KTP',
        'nama',
        'alamat',
        'kondisi',
        'status_penanganan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rutilahu::class;
    }
}
