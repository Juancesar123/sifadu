<?php

namespace App\Repositories;

use App\Models\dataekspedisi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class dataekspedisiRepository
 * @package App\Repositories
 * @version August 12, 2018, 9:30 am UTC
 *
 * @method dataekspedisi findWithoutFail($id, $columns = ['*'])
 * @method dataekspedisi find($id, $columns = ['*'])
 * @method dataekspedisi first($columns = ['*'])
*/
class dataekspedisiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_urut',
        'tanggal_pengiriman',
        'tanggal_surat',
        'nomor_surat',
        'isi_surat',
        'surat_yang_dituju',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return dataekspedisi::class;
    }
}
