<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ParameterIndikatorKemiskinan",
 *      required={"indikator_kemiskinan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="indikator_kemiskinan",
 *          description="indikator_kemiskinan",
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
class ParameterIndikatorKemiskinan extends Model
{
    use SoftDeletes;

    public $table = 'parameter_indikator_kemiskinans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'indikator_kemiskinan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'indikator_kemiskinan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'indikator_kemiskinan' => 'required'
    ];

    
}
