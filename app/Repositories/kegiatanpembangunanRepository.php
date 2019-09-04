<?php

namespace App\Repositories;

use App\Models\kegiatanpembangunan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kegiatanpembangunanRepository
 * @package App\Repositories
 * @version August 9, 2018, 5:52 am UTC
 *
 * @method kegiatanpembangunan findWithoutFail($id, $columns = ['*'])
 * @method kegiatanpembangunan find($id, $columns = ['*'])
 * @method kegiatanpembangunan first($columns = ['*'])
*/
class kegiatanpembangunanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_proyek',
        'volume',
        'dana_dari_pemerintah',
        'dana_dari_provinsi',
        'dana_dari_kabupaten',
        'dana_dari_swadaya',
        'jumlah_dana',
        'waktu',
        'sifat_proyek',
        'pelaksana',
        'keterangan',
        'tahun'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kegiatanpembangunan::class;
    }
}
