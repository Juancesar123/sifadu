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
class penyakitmenular extends Model
{
    use SoftDeletes;

    public $table = 'penyakitmenulars';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_kk',
        'nama_kepala_kk',
        'nama_penderita',
        'usia',
        'diagnosa',
        'rujukan',
        'jaminan_kesehatan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
      'no_kk' => 'string',
      'nama_kepala_kk' => 'string',
      'nama_penderita' => 'string',
      'usia' => 'string',
      'diagnosa' => 'string',
      'rujukan' => 'string',
      'jaminan_kesehatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'no_kk' => 'required',
      'nama_kepala_kk' => 'required',
      'nama_penderita' => 'required',
      'usia' => 'required',
      'diagnosa' => 'required',
      'rujukan' => 'required',
      'jaminan_kesehatan' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    // public function datapenduduk()
    // {
    //     return $this->belongsTo(\App\Models\datapenduduk::class, 'penduduk_id', 'id');
    // }
}
