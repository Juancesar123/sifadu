<?php

namespace App\Repositories;

use App\Models\FormPengajuanKK;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FormPengajuanKKRepository
 * @package App\Repositories
 * @version August 10, 2018, 3:56 am UTC
 *
 * @method FormPengajuanKK findWithoutFail($id, $columns = ['*'])
 * @method FormPengajuanKK find($id, $columns = ['*'])
 * @method FormPengajuanKK first($columns = ['*'])
*/
class FormPengajuanKKRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik_atau_nama',
        'nomor_surat',
        'telepon',
        'jumlah_keluarga',
        'footer_cetak_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FormPengajuanKK::class;
    }
}
