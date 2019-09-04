<?php

namespace App\Repositories;

use App\Models\suratketerangandomisili;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratketerangandomisiliRepository
 * @package App\Repositories
 * @version August 10, 2018, 4:00 am UTC
 *
 * @method suratketerangandomisili findWithoutFail($id, $columns = ['*'])
 * @method suratketerangandomisili find($id, $columns = ['*'])
 * @method suratketerangandomisili first($columns = ['*'])
*/
class suratketerangandomisiliRepository extends BaseRepository
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
        return suratketerangandomisili::class;
    }
}
