<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    
    public $table       = 'settings';

    protected $dates    = ['deleted_at'];

    public $fillable    = [
        'attribute',
        'value'
    ];

    protected $casts    = [
        'attribute' => 'string',
        'value'     => 'string'
    ];

    public static $rules    = [
        'attribute'     => 'required',
        'value'         => 'required'
    ];
}
