<?php

namespace App\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use App\Models\Profil;

class ProfilRepository extends BaseRepository
{
    public function model()
    {
        return Profil::class;
    }
}