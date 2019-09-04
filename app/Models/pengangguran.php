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
class pengangguran extends Model
{
    use SoftDeletes;

    public $table = 'pengangguran';


    protected $dates = ['deleted_at'];


    public $fillable = [
      'nik',
      'nama',
      'alamat',
      'usia',
      'jenis_pengangguran',
      'usaha',
      'pengalaman',
      'keterampilan',
      'pendidikan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
      'nik' => 'string',
      'nama' => 'string',
      'alamat' => 'string',
      'usia' => 'string',
      'jenis_pengangguran' => 'string',
      'usaha' => 'string',
      'pengalaman' => 'string',
      'keterampilan' => 'string',
      'pendidikan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'nik' => 'required',
      'nama' => 'required',
      'alamat' => 'required',
      'usia' => 'required',
      'jenis_pengangguran' => 'required',
      'usaha' => 'required',
      'pengalaman' => 'required',
      'keterampilan' => 'required',
      'pendidikan' => 'required'
    ];

}
