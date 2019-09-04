<?php

namespace App\Repositories;

use App\Models\penyakitmenular;
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
class penyakitmenularRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_kk',
        'nama_kepala_kk',
        'nama_penderita',
        'usia',
        'diagnosa',
        'rujukan',
        'jaminan_kesehatan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return penyakitmenular::class;
    }
}
