<?php

namespace App\Repositories;

use App\Models\KeteranganMenikah;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KeteranganMenikahRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:10 am UTC
 *
 * @method KeteranganMenikah findWithoutFail($id, $columns = ['*'])
 * @method KeteranganMenikah find($id, $columns = ['*'])
 * @method KeteranganMenikah first($columns = ['*'])
*/
class KeteranganMenikahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor',
        'footer',
        'nik_mempelai_satu',
        'nik_mempelai_dua',
        'saksi_satu',
        'saksi_dua',
        'pembantu_ppn'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KeteranganMenikah::class;
    }
}
