<?php

namespace App\Repositories\Adum;

use InfyOm\Generator\Common\BaseRepository;
use App\Models\Adum\BukuInventaris;

/**
 * Class BukuInventarisRepository
 * @package App\Repositories\Adum
*/
class BukuInventarisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'abi_id',
        'abi_nomor_urut',
        'abi_jenis_inventaris',
        'abi_dibeli_sendiri',
        'abi_bantuan_pemerintah',
        'abi_bantuan_provinsi',
        'abi_bantuan_kabkota',
        'abi_sumbangan',
        'abi_awal_baik',
        'abi_awal_rusak',
        'abi_hapus_rusak',
        'abi_hapus_dijual',
        'abi_hapus_disumbangkan',
        'abi_tanggal_hapus',
        'abi_akhir_baik',
        'abi_akhir_rusak',
        'ket'        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BukuInventaris::class;
    }
}
