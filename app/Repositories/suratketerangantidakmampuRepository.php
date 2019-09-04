<?php

namespace App\Repositories;

use App\Models\suratketerangantidakmampu;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratketerangantidakmampuRepository
 * @package App\Repositories
 * @version August 10, 2018, 3:58 am UTC
 *
 * @method suratketerangantidakmampu findWithoutFail($id, $columns = ['*'])
 * @method suratketerangantidakmampu find($id, $columns = ['*'])
 * @method suratketerangantidakmampu first($columns = ['*'])
*/
class suratketerangantidakmampuRepository extends BaseRepository
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
        return suratketerangantidakmampu::class;
    }
}
