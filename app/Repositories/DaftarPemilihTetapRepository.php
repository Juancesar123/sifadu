<?php

namespace App\Repositories;

use App\Models\DaftarPemilihTetap;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DaftarPemilihTetapRepository
 * @package App\Repositories
 * @version December 4, 2018, 7:07 am UTC
 *
 * @method DaftarPemilihTetap findWithoutFail($id, $columns = ['*'])
 * @method DaftarPemilihTetap find($id, $columns = ['*'])
 * @method DaftarPemilihTetap first($columns = ['*'])
*/
class DaftarPemilihTetapRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_KTP',
        'nama',
        'alamat',
        'pekerjaan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DaftarPemilihTetap::class;
    }
}
