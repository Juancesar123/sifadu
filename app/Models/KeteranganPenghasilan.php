<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="KeteranganPenghasilan",
 *      required={"nomor", "footer", "penghasilan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nomor",
 *          description="nomor",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="footer",
 *          description="footer",
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
class KeteranganPenghasilan extends Model
{
    use SoftDeletes;

    public $table = 'keterangan_penghasilans';


    protected $dates = ['deleted_at'];


    public $fillable = [
    	'nik',
        'nomor',
        'footer',
        'penghasilan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'string',
        'footer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    	'nik'=>'required',
        'nomor' => 'required',
        'footer' => 'required',
        'penghasilan' => 'required'
    ];


}