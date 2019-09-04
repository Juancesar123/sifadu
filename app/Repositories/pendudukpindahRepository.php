<?php

namespace App\Repositories;

use App\Models\pendudukpindah;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pendudukpindahRepository
 * @package App\Repositories
 * @version August 9, 2018, 4:30 am UTC
 *
 * @method pendudukpindah findWithoutFail($id, $columns = ['*'])
 * @method pendudukpindah find($id, $columns = ['*'])
 * @method pendudukpindah first($columns = ['*'])
*/
class pendudukpindahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penduduk_id',
        'tanggal_pindah',
        'keterangan_pindah',
        'pindah_ke'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pendudukpindah::class;
    }
}
