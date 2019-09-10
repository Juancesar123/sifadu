<?php

namespace App\Repositories;

use App\Models\KeteranganKelahiran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KeteranganKelahiranRepository
 * @package App\Repositories
 * @version September 10, 2019, 3:57 am UTC
 *
 * @method KeteranganKelahiran findWithoutFail($id, $columns = ['*'])
 * @method KeteranganKelahiran find($id, $columns = ['*'])
 * @method KeteranganKelahiran first($columns = ['*'])
*/
class KeteranganKelahiranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_surat',
        'tanggal',
        'tempat',
        'jenis_kelamin',
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KeteranganKelahiran::class;
    }
}
