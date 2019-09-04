<?php

namespace App\Repositories;

use App\Models\pendudukmeninggal;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pendudukmeninggalRepository
 * @package App\Repositories
 * @version August 9, 2018, 4:01 am UTC
 *
 * @method pendudukmeninggal findWithoutFail($id, $columns = ['*'])
 * @method pendudukmeninggal find($id, $columns = ['*'])
 * @method pendudukmeninggal first($columns = ['*'])
*/
class pendudukmeninggalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penduduk_id',
        'tanggal_meninggal',
        'keterangan_meninggal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pendudukmeninggal::class;
    }
}
