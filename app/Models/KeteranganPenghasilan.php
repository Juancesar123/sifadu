<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="KeteranganPenghasilan",
 *      required={"nomor_surat", "footer", "penghasilan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nomor_surat",
 *          description="nomor_surat",
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
        'nomor_surat',
        'footer',
        'penghasilan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor_surat' => 'string',
        'footer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_surat' => 'required',
        'footer' => 'required',
        'penghasilan' => 'required'
    ];

    
}
