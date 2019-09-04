<?php

namespace App\Repositories;

use App\Models\AngkaPutusSekolah;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AngkaPutusSekolahRepository
 * @package App\Repositories
 * @version December 4, 2018, 7:05 am UTC
 *
 * @method AngkaPutusSekolah findWithoutFail($id, $columns = ['*'])
 * @method AngkaPutusSekolah find($id, $columns = ['*'])
 * @method AngkaPutusSekolah first($columns = ['*'])
*/
class AngkaPutusSekolahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_KTP',
        'nama',
        'alamat',
        'kondisi',
        'status_penanganan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AngkaPutusSekolah::class;
    }
}
