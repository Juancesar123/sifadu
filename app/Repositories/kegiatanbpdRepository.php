<?php

namespace App\Repositories;

use App\Models\kegiatanbpd;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kegiatanbpdRepository
 * @package App\Repositories
 * @version August 12, 2018, 9:21 am UTC
 *
 * @method kegiatanbpd findWithoutFail($id, $columns = ['*'])
 * @method kegiatanbpd find($id, $columns = ['*'])
 * @method kegiatanbpd first($columns = ['*'])
*/
class kegiatanbpdRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tentang',
        'pelaksana',
        'pokok_kegiatan',
        'hasil_kegiatan',
        'keterangan',
        'tahun'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kegiatanbpd::class;
    }
}
