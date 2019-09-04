<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeraturanDesa extends Model
{
    protected $table = 'mst_peraturan_desa';

    protected $primaryKey = 'perdes_id';

    protected $fillable = [
        'perdes_nama',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
