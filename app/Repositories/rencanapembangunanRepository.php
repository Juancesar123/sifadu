<?php

namespace App\Repositories;

use App\Models\rencanapembangunan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class rencanapembangunanRepository
 * @package App\Repositories
 * @version August 9, 2018, 5:12 am UTC
 *
 * @method rencanapembangunan findWithoutFail($id, $columns = ['*'])
 * @method rencanapembangunan find($id, $columns = ['*'])
 * @method rencanapembangunan first($columns = ['*'])
*/
class rencanapembangunanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_proyek',
        'lokasi',
        'dana_dari_pemerintah',
        'dana_dari_provinsi',
        'dana_dari_kabupaten',
        'dana_dari_swadaya',
        'jumlah_dana',
        'pelaksana',
        'manfaat',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return rencanapembangunan::class;
    }
}
