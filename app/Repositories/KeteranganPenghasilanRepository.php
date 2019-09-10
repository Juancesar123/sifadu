<?php

namespace App\Repositories;

use App\Models\KeteranganPenghasilan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KeteranganPenghasilanRepository
 * @package App\Repositories
 * @version September 10, 2019, 3:55 am UTC
 *
 * @method KeteranganPenghasilan findWithoutFail($id, $columns = ['*'])
 * @method KeteranganPenghasilan find($id, $columns = ['*'])
 * @method KeteranganPenghasilan first($columns = ['*'])
*/
class KeteranganPenghasilanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_surat',
        'footer',
        'penghasilan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KeteranganPenghasilan::class;
    }
}
