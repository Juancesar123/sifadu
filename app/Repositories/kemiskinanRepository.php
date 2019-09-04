<?php

namespace App\Repositories;

use App\Models\kemiskinan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kemiskinanRepository
 * @package App\Repositories
 * @version August 9, 2018, 4:30 am UTC
 *
 * @method kemiskinan findWithoutFail($id, $columns = ['*'])
 * @method kemiskinan find($id, $columns = ['*'])
 * @method kemiskinan first($columns = ['*'])
*/
class kemiskinanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penduduk_id',
        'nik',
        'no_kk',
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kemiskinan::class;
    }
}
