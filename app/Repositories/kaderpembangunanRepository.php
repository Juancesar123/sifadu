<?php

namespace App\Repositories;

use App\Models\kaderpembangunan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kaderpembangunanRepository
 * @package App\Repositories
 * @version August 9, 2018, 2:43 pm UTC
 *
 * @method kaderpembangunan findWithoutFail($id, $columns = ['*'])
 * @method kaderpembangunan find($id, $columns = ['*'])
 * @method kaderpembangunan first($columns = ['*'])
*/
class kaderpembangunanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'umur',
        'jeniskelamin',
        'pendidikan_atau_kursus',
        'bidang',
        'alamat',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kaderpembangunan::class;
    }
}
