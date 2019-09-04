<?php

namespace App\Repositories;

use App\Models\suratketeranganusaha;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratketeranganusahaRepository
 * @package App\Repositories
 * @version August 10, 2018, 4:03 am UTC
 *
 * @method suratketeranganusaha findWithoutFail($id, $columns = ['*'])
 * @method suratketeranganusaha find($id, $columns = ['*'])
 * @method suratketeranganusaha first($columns = ['*'])
*/
class suratketeranganusahaRepository extends BaseRepository
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
        return suratketeranganusaha::class;
    }
}
