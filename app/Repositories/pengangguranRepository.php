<?php

namespace App\Repositories;

use App\Models\pengangguran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pendudukmeninggalRepository
 * @package App\Repositories
 * @version August 9, 2018, 4:01 am UTC
 *
 * @method pendudukmeninggal findWithoutFail($id, $columns = ['*'])
 * @method pendudukmeninggal find($id, $columns = ['*'])
 * @method pendudukmeninggal first($columns = ['*'])
*/
class pengangguranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'nama',
        'alamat',
        'usia',
        'jenis_pengangguran',
        'usaha',
        'pengalaman',
        'keterampilan',
        'pendidikan_terakhir'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pengangguran::class;
    }
}
