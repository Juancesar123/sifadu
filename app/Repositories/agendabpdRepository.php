<?php

namespace App\Repositories;

use App\Models\agendabpd;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class agendabpdRepository
 * @package App\Repositories
 * @version August 12, 2018, 9:26 am UTC
 *
 * @method agendabpd findWithoutFail($id, $columns = ['*'])
 * @method agendabpd find($id, $columns = ['*'])
 * @method agendabpd first($columns = ['*'])
*/
class agendabpdRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'nomor_surat_masuk',
        'tanggal_surat_masuk',
        'pengirim_surat_masuk',
        'isi_singkat_surat_masuk',
        'isi_singkat_surat_keluar',
        'tanggal_pengiriman_surat_keluar',
        'tujuan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return agendabpd::class;
    }
}
