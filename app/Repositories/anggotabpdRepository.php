<?php

namespace App\Repositories;

use App\Models\anggotabpd;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class anggotabpdRepository
 * @package App\Repositories
 * @version August 12, 2018, 9:14 am UTC
 *
 * @method anggotabpd findWithoutFail($id, $columns = ['*'])
 * @method anggotabpd find($id, $columns = ['*'])
 * @method anggotabpd first($columns = ['*'])
*/
class anggotabpdRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan_terakhir',
        'nomor_keputusan_pengangkatan',
        'tanggal_keputusan_pengangkatan',
        'nomor_keputusan_pemberentian',
        'tanggal_keputusan_pemberentian',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return anggotabpd::class;
    }
}
