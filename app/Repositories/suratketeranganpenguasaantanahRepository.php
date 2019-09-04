<?php

namespace App\Repositories;

use App\Models\suratketeranganpenguasaantanah;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratketeranganpenguasaantanahRepository
 * @package App\Repositories
 * @version August 10, 2018, 4:05 am UTC
 *
 * @method suratketeranganpenguasaantanah findWithoutFail($id, $columns = ['*'])
 * @method suratketeranganpenguasaantanah find($id, $columns = ['*'])
 * @method suratketeranganpenguasaantanah first($columns = ['*'])
*/
class suratketeranganpenguasaantanahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'nomor_surat',
        'footer_cetak_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return suratketeranganpenguasaantanah::class;
    }
}
