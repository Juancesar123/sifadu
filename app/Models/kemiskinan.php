<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="kemiskinan",
 *      required={"penduduk_id", "tanggal_pindah", "keterangan_pindah", "pindah_ke"},
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
 *          property="tanggal_pindah",
 *          description="tanggal_pindah",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="keterangan_pindah",
 *          description="keterangan_pindah",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pindah_ke",
 *          description="pindah_ke",
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
class kemiskinan extends Model
{
    use SoftDeletes;

    public $table = 'kemiskinan';


    protected $dates = ['deleted_at'];


    public $fillable = [
      'nik',
      'penduduk_id',
      'no_kk',
      'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
      'nik' => 'string',
      'penduduk_id' => 'string',
      'no_kk' => 'string',
      'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'nik' => 'required',
      'penduduk_id' => 'required',
      'no_kk' => 'required',
      'nama' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function datapenduduk()
    {
        return $this->belongsTo(\App\Models\datapenduduk::class, 'penduduk_id', 'id');
    }
}
