<?php

namespace App\Repositories;

use App\Models\KeteranganUsahaBaru;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KeteranganUsahaBaruRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:13 am UTC
 *
 * @method KeteranganUsahaBaru findWithoutFail($id, $columns = ['*'])
 * @method KeteranganUsahaBaru find($id, $columns = ['*'])
 * @method KeteranganUsahaBaru first($columns = ['*'])
*/
class KeteranganUsahaBaruRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor',
        'footer',
        'jenis_usaha',
        'luas_tempat',
        'alamat_tempat'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KeteranganUsahaBaru::class;
    }
}
