<?php

namespace App\Repositories\Adum;

use InfyOm\Generator\Common\BaseRepository;
use App\Models\Adum\BukuAgenda;

/**
 * Class BukuAgendaRepository
 * @package App\Repositories\Adum
*/
class BukuAgendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'aba_tanggal',
        'aba_jenis_surat',
        'aba_nomor_surat',
        'aba_tanggal_surat',
        'aba_pengirim_surat',
        'aba_tujuan_surat',
        'aba_isi_surat',
        'aba_keterangan_surat',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BukuAgenda::class;
    }
}
