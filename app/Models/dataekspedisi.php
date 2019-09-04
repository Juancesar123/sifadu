<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="dataekspedisi",
 *      required={"nomor_urut", "tanggal_pengiriman", "tanggal_surat", "nomor_surat", "isi_surat", "keterangan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nomor_urut",
 *          description="nomor_urut",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_pengiriman",
 *          description="tanggal_pengiriman",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_surat",
 *          description="tanggal_surat",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="nomor_surat",
 *          description="nomor_surat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="isi_surat",
 *          description="isi_surat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="surat_yang_dituju",
 *          description="surat_yang_dituju",
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
class dataekspedisi extends Model
{
    use SoftDeletes;

    public $table = 'dataekspedisis';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor_urut',
        'tanggal_pengiriman',
        'tanggal_surat',
        'nomor_surat',
        'isi_surat',
        'surat_yang_dituju',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor_urut' => 'string',
        'tanggal_pengiriman' => 'date',
        'tanggal_surat' => 'date',
        'nomor_surat' => 'string',
        'isi_surat' => 'string',
        'surat_yang_dituju' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_urut' => 'required',
        'tanggal_pengiriman' => 'required',
        'tanggal_surat' => 'required',
        'nomor_surat' => 'required',
        'isi_surat' => 'required',
        'surat_yang_dituju' => 'required',
        'keterangan' => 'required'
    ];

    
}
