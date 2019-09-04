<?php

namespace App\Repositories;

use App\Models\jenispekerjaan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class jenispekerjaanRepository
 * @package App\Repositories
 * @version August 14, 2018, 9:09 am UTC
 *
 * @method jenispekerjaan findWithoutFail($id, $columns = ['*'])
 * @method jenispekerjaan find($id, $columns = ['*'])
 * @method jenispekerjaan first($columns = ['*'])
*/
class jenispekerjaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis_pekerjaan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return jenispekerjaan::class;
    }
}
