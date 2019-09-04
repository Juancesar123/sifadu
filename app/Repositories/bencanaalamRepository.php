<?php

namespace App\Repositories;

use App\Models\bencanaalam;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataUkmRepository
 * @package App\Repositories
 * @version December 4, 2018, 7:00 am UTC
 *
 * @method DataUkm findWithoutFail($id, $columns = ['*'])
 * @method DataUkm find($id, $columns = ['*'])
 * @method DataUkm first($columns = ['*'])
*/
class bencanaalamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis_bencana',
        'lokasi',
        'status',
        'korban_jiwa',
        'korban_luka',
        'kerusakan',
        'nilai_kerusakan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return bencanaalam::class;
    }
}
