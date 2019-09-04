<?php

namespace App\Repositories;

use App\Models\datapenduduk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class datapendudukRepository
 * @package App\Repositories
 * @version August 8, 2018, 3:28 pm UTC
 *
 * @method datapenduduk findWithoutFail($id, $columns = ['*'])
 * @method datapenduduk find($id, $columns = ['*'])
 * @method datapenduduk first($columns = ['*'])
*/
class datapendudukRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'no_kk',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'hub_kel',
        'status_kawin',
        'nama_lengkap_ayah',
        'nama_lengkap_ibu',
        'alamat',
        'no_rt',
        'no_rw',
        'nama_kecamatan',
        'nama_kecamatan_2',
        'jenis_pekerjaan',
        'pendidikan_akhir',
        'status_KTP'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return datapenduduk::class;
    }
}
