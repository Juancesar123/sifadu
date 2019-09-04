<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="suratpengantarkk",
 *      required={"nik_atau_nama", "nomor_surat", "footer_cetak_data"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nik_atau_nama",
 *          description="nik_atau_nama",
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
class suratpengantarkk extends Model
{
    use SoftDeletes;

    public $table = 'suratpengantarkks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nik_atau_nama',
        'nomor_surat',
        'telepon',
        'jumlah_keluarga',
        'footer_cetak_data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nik_atau_nama' => 'string',
        'nomor_surat' => 'string',
        'telepon' => 'string',
        'jumlah_keluarga' => 'int',
        'footer_cetak_data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik_atau_nama' => 'required',
        'nomor_surat' => 'required',
        'telepon' => 'required',
        'jumlah_keluarga' => 'required',
        'footer_cetak_data' => 'required'
    ];

    
}
