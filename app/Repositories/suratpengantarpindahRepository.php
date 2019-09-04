<?php
    /**
     * Author:Dodi
     * Tampilan : Surat Pengantar Pindah
     */

namespace App\Repositories;

use App\Models\suratpengantarpindah;
use InfyOm\Generator\Common\BaseRepository;

class suratpengantarpindahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_atau_nik',
        'nomor_surat',
        'footer_cetak_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return suratpengantarpindah::class;
    }
}