<?php

namespace App\Repositories;

use App\Models\datawarung;
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
class datawarungRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pemilik',
        'lokasi',
        'modal_usaha',
        'omset',
        'produk_dagang'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return datawarung::class;
    }
}
