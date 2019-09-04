<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="keputusanbpd",
 *      required={"no_keputusan", "tentang", "tanggal_keputusan", "uraian_singkat", "keterangan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="no_keputusan",
 *          description="no_keputusan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tentang",
 *          description="tentang",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_keputusan",
 *          description="tanggal_keputusan",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="uraian_singkat",
 *          description="uraian_singkat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="keterangan",
 *          description="keterangan",
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
class keputusanbpd extends Model
{
    use SoftDeletes;

    public $table = 'keputusanbpds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_keputusan',
        'tentang',
        'tanggal_keputusan',
        'uraian_singkat',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no_keputusan' => 'string',
        'tentang' => 'string',
        'tanggal_keputusan' => 'date',
        'uraian_singkat' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_keputusan' => 'required',
        'tentang' => 'required',
        'tanggal_keputusan' => 'required',
        'uraian_singkat' => 'required',
        'keterangan' => 'required'
    ];

    
}
