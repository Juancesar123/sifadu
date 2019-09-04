<?php

namespace App\Repositories;

use App\Models\penduduklahir;
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
class penduduklahirRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_kk',
        'tgl_lahir',
        'waktu_lahir',
        'nama_bayi',
        'tempat_lahir',
        'jenis_kelamin',
        'nama_ibu'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return penduduklahir::class;
    }
}
