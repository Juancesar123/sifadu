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
class pendudukmeninggal extends Model
{
    use SoftDeletes;

    public $table = 'pendudukmeninggals';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'penduduk_id',
        'tanggal_meninggal',
        'keterangan_meninggal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'penduduk_id' => 'integer',
        'tanggal_meninggal' => 'date',
        'keterangan_meninggal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penduduk_id' => 'required',
        'tanggal_meninggal' => 'required',
        'keterangan_meninggal' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function datapenduduk()
    {
        return $this->belongsTo(\App\Models\datapenduduk::class, 'penduduk_id', 'id');
    }
}
