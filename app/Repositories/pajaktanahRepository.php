<?php

namespace App\Repositories;

use App\Models\pajaktanah;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pajaktanahRepository
 * @package App\Repositories
 * @version August 16, 2018, 2:30 pm UTC
 *
 * @method pajaktanah findWithoutFail($id, $columns = ['*'])
 * @method pajaktanah find($id, $columns = ['*'])
 * @method pajaktanah first($columns = ['*'])
*/
class pajaktanahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'blok',
        'dusun',
        'nop',
        'nama_wp',
        'alamat',
        'ketetapan_pembayaran',
        'lunas'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pajaktanah::class;
    }
}
