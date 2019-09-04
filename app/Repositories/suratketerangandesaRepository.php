<?php

namespace App\Repositories;

use App\Models\suratketerangandesa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratketerangandesaRepository
 * @package App\Repositories
 * @version August 10, 2018, 4:10 am UTC
 *
 * @method suratketerangandesa findWithoutFail($id, $columns = ['*'])
 * @method suratketerangandesa find($id, $columns = ['*'])
 * @method suratketerangandesa first($columns = ['*'])
*/
class suratketerangandesaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'nomor_surat',
        'footer_cetak_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return suratketerangandesa::class;
    }
}
