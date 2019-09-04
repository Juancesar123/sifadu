<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="suratpengantarktp",
 *      required={"nama_atau_nik", "nomor_surat", "footer_cetak_data"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_atau_nik",
 *          description="nama_atau_nik",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nomor_surat",
 *          description="nomor_surat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="footer_cetak_data",
 *          description="footer_cetak_data",
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
class suratpengantarktp extends Model
{
    use SoftDeletes;

    public $table = 'suratpengantarktps';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_atau_nik',
        'nomor_surat',
        'footer_cetak_data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_atau_nik' => 'string',
        'nomor_surat' => 'string',
        'footer_cetak_data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_atau_nik' => 'required',
        'nomor_surat' => 'required',
        'footer_cetak_data' => 'required'
    ];

    
}
