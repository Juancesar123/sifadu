<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="pendudukmeninggal",
 *      required={"penduduk_id", "tanggal_meninggal", "keterangan_meninggal"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="penduduk_id",
 *          description="penduduk_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_meninggal",
 *          description="tanggal_meninggal",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="keterangan_meninggal",
 *          description="keterangan_meninggal",
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
class penduduklahir extends Model
{
    use SoftDeletes;

    public $table = 'penduduklahirs';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_kk',
        'tgl_lahir',
        'waktu_lahir',
        'nama_bayi',
        'tempat_lahir',
        'jenis_kelamin',
        'nama_ibu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no_kk' => 'integer',
        'tgl_lahir' => 'date',
        'waktu_lahir' => 'string',
        'nama_bayi' => 'string',
        'tempat_lahir' => 'string',
        'jenis_kelamin' => 'string',
        'nama_ibu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_kk' => 'required',
        'tgl_lahir' => 'required',
        'waktu_lahir' => 'required',
        'nama_bayi' => 'required',
        'tempat_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'nama_ibu' => 'required'
    ];

}
