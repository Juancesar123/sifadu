<?php

namespace App\Repositories;

use App\Models\PotensiPertambangan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PotensiPertambanganRepository
 * @package App\Repositories
 * @version December 4, 2018, 6:29 am UTC
 *
 * @method PotensiPertambangan findWithoutFail($id, $columns = ['*'])
 * @method PotensiPertambangan find($id, $columns = ['*'])
 * @method PotensiPertambangan first($columns = ['*'])
*/
class PotensiPertambanganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'statusLahan',
        'jenisPertambangan',
        'pengelola',
        'penanggungJawab',
        'luasArea',
        'masaPengelolaan',
        'nilaiInvestasi',
        'lokasiTambang'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PotensiPertambangan::class;
    }
}
