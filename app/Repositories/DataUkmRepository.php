<?php

namespace App\Repositories;

use App\Models\DataUkm;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataUkmRepository
 * @package App\Repositories
 * @version December 4, 2018, 7:00 am UTC
 *
 * @method DataUkm findWithoutFail($id, $columns = ['*'])
 * @method DataUkm find($id, $columns = ['*'])
 * @method DataUkm first($columns = ['*'])
*/
class DataUkmRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pengelola',
        'bentuk_usaha',
        'nama_produk',
        'bahan_baku',
        'alamat',
        'jumlah_staff',
        'omset'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataUkm::class;
    }
}
