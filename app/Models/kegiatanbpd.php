<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="kegiatanbpd",
 *      required={"tentang", "pelaksana", "pokok_kegiatan", "hasil_kegiatan", "keterangan", "tahun"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tentang",
 *          description="tentang",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pelaksana",
 *          description="pelaksana",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pokok_kegiatan",
 *          description="pokok_kegiatan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="hasil_kegiatan",
 *          description="hasil_kegiatan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="keterangan",
 *          description="keterangan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tahun",
 *          description="tahun",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class kegiatanbpd extends Model
{
    use SoftDeletes;

    public $table = 'kegiatanbpds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tentang',
        'pelaksana',
        'pokok_kegiatan',
        'hasil_kegiatan',
        'keterangan',
        'tahun'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tentang' => 'string',
        'pelaksana' => 'string',
        'pokok_kegiatan' => 'string',
        'hasil_kegiatan' => 'string',
        'keterangan' => 'string',
        'tahun' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tentang' => 'required',
        'pelaksana' => 'required',
        'pokok_kegiatan' => 'required',
        'hasil_kegiatan' => 'required',
        'keterangan' => 'required',
        'tahun' => 'required'
    ];

    
}
