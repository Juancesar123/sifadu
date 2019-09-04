<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DaftarPemilihTetap",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="no_KTP",
 *          description="no_KTP",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama",
 *          description="nama",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat",
 *          description="alamat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pekerjaan",
 *          description="pekerjaan",
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
class DaftarPemilihTetap extends Model
{
    use SoftDeletes;

    public $table = 'daftar_pemilih_tetaps';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_KTP',
        'nama',
        'alamat',
        'pekerjaan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no_KTP' => 'string',
        'nama' => 'string',
        'alamat' => 'string',
        'pekerjaan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'no_KTP' => 'required',
      'nama' => 'required',
      'alamat' => 'required',
      'pekerjaan' => 'required'
    ];


}
