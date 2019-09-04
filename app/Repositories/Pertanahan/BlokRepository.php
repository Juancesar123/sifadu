<?php
/*
 * Created by Arif Budiman
 * Updated by Arif Budiman
 */

namespace App\Repositories\Pertanahan;

use App\Models\Pertanahan\Blok;
use InfyOm\Generator\Common\BaseRepository;

class BlokRepository extends BaseRepository
{
    
    protected $fieldSearchable = [
        'nomor',
        'keterangan'
    ];

    public function model()
    {
        return Blok::class;
    }
    
}
