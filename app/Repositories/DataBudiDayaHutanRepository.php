<?php

namespace App\Repositories;

use App\Models\DataBudiDayaHutan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataBudiDayaHutanRepository
 * @package App\Repositories
 * @version December 4, 2018, 6:57 am UTC
 *
 * @method DataBudiDayaHutan findWithoutFail($id, $columns = ['*'])
 * @method DataBudiDayaHutan find($id, $columns = ['*'])
 * @method DataBudiDayaHutan first($columns = ['*'])
*/
class DataBudiDayaHutanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_lahan',
        'jenis_budidaya',
        'pengelola',
        'penanggung_jawab',
        'luas_area',
        'masa_pengelolaan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataBudiDayaHutan::class;
    }
}
