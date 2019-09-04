<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="datasuratkeluar",
 *      required={"kode_surat", "nomor_surat", "penerima", "tanggal_keluar", "perihahl", "tanda_tangan", "atas_nama"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="kode_surat",
 *          description="kode_surat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nomor_surat",
 *          description="nomor_surat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="penerima",
 *          description="penerima",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_keluar",
 *          description="tanggal_keluar",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="perihahl",
 *          description="perihahl",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanda_tangan",
 *          description="tanda_tangan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="atas_nama",
 *          description="atas_nama",
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
class datasuratkeluar extends Model
{
    use SoftDeletes;

    public $table = 'datasuratkeluars';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode_surat',
        'nomor_surat',
        'penerima',
        'tanggal_keluar',
        'perihahl',
        'tanda_tangan',
        'atas_nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kode_surat' => 'string',
        'nomor_surat' => 'string',
        'penerima' => 'string',
        'tanggal_keluar' => 'date',
        'perihahl' => 'string',
        'tanda_tangan' => 'string',
        'atas_nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_surat' => 'required',
        'nomor_surat' => 'required',
        'penerima' => 'required',
        'tanggal_keluar' => 'required',
        'perihahl' => 'required',
        'tanda_tangan' => 'required',
        'atas_nama' => 'required'
    ];

    
}
