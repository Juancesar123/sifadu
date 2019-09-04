<?php

namespace App\Repositories\Adum;

use InfyOm\Generator\Common\BaseRepository;
use App\Models\Adum\BukuAparat;

/**
 * Class BukuAparatRepository
 * @package App\Repositories\Adum
*/
class BukuAparatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'abap_id',
        'abap_nomor_urut',
        'abap_nama',
        'abap_no_aparat',
        'abap_no_pegawai',
        'abap_jenis_kelamin',
        'abap_ttl',
        'abap_agama',
        'abap_golongan',
        'abap_jabatan',
        'abap_pendidikan',
        'abap_no_tanggal_pengangkatan',
        'abap_no_tanggal_pemberhentian',
        'abap_ket'        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BukuAparat::class;
    }
}
