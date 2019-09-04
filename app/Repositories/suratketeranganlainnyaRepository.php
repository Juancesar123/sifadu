<?php

namespace App\Repositories;

use App\Models\suratketeranganlainnya;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratketeranganlainnyaRepository
 * @package App\Repositories
 * @version August 10, 2018, 4:10 am UTC
 *
 * @method suratketeranganlainnya findWithoutFail($id, $columns = ['*'])
 * @method suratketeranganlainnya find($id, $columns = ['*'])
 * @method suratketeranganlainnya first($columns = ['*'])
*/
class suratketeranganlainnyaRepository extends BaseRepository
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
        return suratketeranganlainnya::class;
    }
}
