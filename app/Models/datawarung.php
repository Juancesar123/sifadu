<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DataUkm",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pengelola",
 *          description="pengelola",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bentuk_usaha",
 *          description="bentuk_usaha",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_produk",
 *          description="nama_produk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bahan_baku",
 *          description="bahan_baku",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat",
 *          description="alamat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jumlah_staff",
 *          description="jumlah_staff",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="omset",
 *          description="omset",
 *          type="integer",
 *          format="int32"
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
class datawarung extends Model
{
    use SoftDeletes;

    public $table = 'data_warungs';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'pemilik',
        'lokasi',
        'modal_usaha',
        'omset',
        'produk_dagang',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pemilik' => 'string',
        'lokasi' => 'string',
        'modal_usaha' => 'string',
        'omset' => 'string',
        'produk_dagang' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
