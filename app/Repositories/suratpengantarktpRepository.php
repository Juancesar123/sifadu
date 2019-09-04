<?php

namespace App\Repositories;

use App\Models\suratpengantarktp;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class suratpengantarktpRepository
 * @package App\Repositories
 * @version August 10, 2018, 3:38 am UTC
 *
 * @method suratpengantarktp findWithoutFail($id, $columns = ['*'])
 * @method suratpengantarktp find($id, $columns = ['*'])
 * @method suratpengantarktp first($columns = ['*'])
*/
class suratpengantarktpRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_atau_nik',
        'nomor_surat',
        'footer_cetak_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return suratpengantarktp::class;
    }
}
