<?php

namespace App\Repositories;

use App\Models\datasuratkeluar;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class datasuratkeluarRepository
 * @package App\Repositories
 * @version August 12, 2018, 10:09 am UTC
 *
 * @method datasuratkeluar findWithoutFail($id, $columns = ['*'])
 * @method datasuratkeluar find($id, $columns = ['*'])
 * @method datasuratkeluar first($columns = ['*'])
*/
class datasuratkeluarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_surat',
        'nomor_surat',
        'penerima',
        'tanggal_keluar',
        'perihahl',
        'tanda_tangan',
        'atas_nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return datasuratkeluar::class;
    }
}
