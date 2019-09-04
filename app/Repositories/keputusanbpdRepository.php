<?php

namespace App\Repositories;

use App\Models\keputusanbpd;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class keputusanbpdRepository
 * @package App\Repositories
 * @version August 12, 2018, 9:04 am UTC
 *
 * @method keputusanbpd findWithoutFail($id, $columns = ['*'])
 * @method keputusanbpd find($id, $columns = ['*'])
 * @method keputusanbpd first($columns = ['*'])
*/
class keputusanbpdRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_keputusan',
        'tentang',
        'tanggal_keputusan',
        'uraian_singkat',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return keputusanbpd::class;
    }
}
