<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="suratketeranganskck",
 *      required={"nik", "nomor_surat", "footer_cetak_data"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nik",
 *          description="nik",
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
class suratketeranganskck extends Model
{
    use SoftDeletes;

    public $table = 'suratketeranganskcks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nik',
        'id_pekerjaan',
        'keperluan',
        'start_date',
        'end_date',
        'keterangan',
        'nomor_surat',
        'footer_cetak_data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nik'               => 'integer',
        'id_pekerjaan'      => 'integer',
        'keperluan'         => 'string',
        'start_date'        => 'string',
        'end_date'          => 'string',
        'keterangan'        => 'string',
        'nomor_surat'       => 'string',
        'footer_cetak_data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik'               => 'required',
        'id_pekerjaan'      => 'required',
        'keperluan'         => 'nullable',
        'start_date'        => 'required',
        'end_date'          => 'required',
        'keterangan'        => 'nullable',        
        'nomor_surat'       => 'nullable',
        'footer_cetak_data' => 'required'
    ];

    public function datapenduduk()
    {
        return $this->belongsTo('App\Models\datapenduduk', 'nik');
    }

    public function pekerjaan()
    {
        return $this->belongsTo('App\Models\jenispekerjaan', 'id_pekerjaan');
    }

    
}
