<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="KeteranganMenikah",
 *      required={"nomor", "footer", "nik_mempelai_satu", "nik_mempelai_dua", "saksi_satu", "saksi_dua", "pembantu_ppn"},
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
 *          property="saksi_satu",
 *          description="saksi_satu",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="saksi_dua",
 *          description="saksi_dua",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pembantu_ppn",
 *          description="pembantu_ppn",
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
class KeteranganMenikah extends Model
{
    use SoftDeletes;

    public $table = 'keterangan_menikahs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor',
        'footer',
        'nik_mempelai_satu',
        'nik_mempelai_dua',
        'saksi_satu',
        'saksi_dua',
        'pembantu_ppn'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'string',
        'footer' => 'string',
        'saksi_satu' => 'string',
        'saksi_dua' => 'string',
        'pembantu_ppn' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'required',
        'footer' => 'required',
        'nik_mempelai_satu' => 'required',
        'nik_mempelai_dua' => 'required',
        'saksi_satu' => 'required',
        'saksi_dua' => 'required',
        'pembantu_ppn' => 'required'
    ];

    
}
