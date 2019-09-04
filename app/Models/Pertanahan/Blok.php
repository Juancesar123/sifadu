<?php
/*
 * Created by Arif Budiman
 * Updated by Arif Budiman
 */

namespace App\Models\Pertanahan;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blok extends Model
{
    
    use SoftDeletes;

    public $table = 'pertanahan_blok';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'nomor',
        'keterangan'
    ];

    protected $casts = [
        'nomor' => 'integer',
        'keterangan' => 'string'
    ];

    public static $rules = [
        
    ];
    
}
