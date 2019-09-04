<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="pendudukpindah",
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
class pendudukpindah extends Model
{
    use SoftDeletes;

    public $table = 'pendudukpindahs';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'penduduk_id',
        'tanggal_pindah',
        'keterangan_pindah',
        'pindah_ke'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'penduduk_id' => 'integer',
        'tanggal_pindah' => 'date',
        'keterangan_pindah' => 'string',
        'pindah_ke' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penduduk_id' => 'required',
        'tanggal_pindah' => 'required',
        'keterangan_pindah' => 'required',
        'pindah_ke' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function datapenduduk()
    {
        return $this->belongsTo(\App\Models\datapenduduk::class, 'penduduk_id', 'id');
    }
}
