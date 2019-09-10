<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="KeteranganKelahiran",
 *      required={"nomor_surat", "tanggal", "tempat", "jenis_kelamin", "nama"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nomor_surat",
 *          description="nomor_surat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal",
 *          description="tanggal",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="tempat",
 *          description="tempat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_kelamin",
 *          description="jenis_kelamin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama",
 *          description="nama",
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
class KeteranganKelahiran extends Model
{
    use SoftDeletes;

    public $table = 'keterangan_kelahirans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor_surat',
        'tanggal',
        'tempat',
        'jenis_kelamin',
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor_surat' => 'string',
        'tanggal' => 'date',
        'tempat' => 'string',
        'jenis_kelamin' => 'string',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_surat' => 'required',
        'tanggal' => 'required',
        'tempat' => 'required',
        'jenis_kelamin' => 'required',
        'nama' => 'required'
    ];

    
}
