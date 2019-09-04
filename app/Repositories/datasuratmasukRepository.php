<?php

namespace App\Repositories;

use App\Models\datasuratmasuk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class datasuratmasukRepository
 * @package App\Repositories
 * @version August 12, 2018, 10:07 am UTC
 *
 * @method datasuratmasuk findWithoutFail($id, $columns = ['*'])
 * @method datasuratmasuk find($id, $columns = ['*'])
 * @method datasuratmasuk first($columns = ['*'])
*/
class datasuratmasukRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_surat',
        'nomor_surat',
        'penerima',
        'tanggal_keluar',
        'perihal',
        'tanda_tangan',
        'atas_nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return datasuratmasuk::class;
    }
}
