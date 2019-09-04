<?php

namespace App\Repositories;

use App\Models\suratketeranganskck;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratketeranganskckRepository
 * @package App\Repositories
 * @version August 10, 2018, 4:01 am UTC
 *
 * @method suratketeranganskck findWithoutFail($id, $columns = ['*'])
 * @method suratketeranganskck find($id, $columns = ['*'])
 * @method suratketeranganskck first($columns = ['*'])
*/
class suratketeranganskckRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'start_date',
        'end_date',
        'keperluan',
        'keterangan',
        'nomor_surat',
        'footer_cetak_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return suratketeranganskck::class;
    }
}
