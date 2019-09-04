<?php

namespace App\Repositories;

use App\Models\inventarisproyek;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class inventarisproyekRepository
 * @package App\Repositories
 * @version August 9, 2018, 2:24 pm UTC
 *
 * @method inventarisproyek findWithoutFail($id, $columns = ['*'])
 * @method inventarisproyek find($id, $columns = ['*'])
 * @method inventarisproyek first($columns = ['*'])
*/
class inventarisproyekRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_proyek',
        'volume',
        'biaya',
        'lokasi',
        'keterangan',
        'tahun'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return inventarisproyek::class;
    }
}
