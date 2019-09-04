<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="anggotabpd",
 *      required={"nama", "jenis_kelamin", "tempat_lahir", "tanggal_lahir", "agama", "pendidikan_terakhir", "nomor_keputusan_pengangkatan", "tanggal_keputusan_pengangkatan", "nomor_keputusan_pemberentian", "tanggal_keputusan_pemberentian"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama",
 *          description="nama",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_kelamin",
 *          description="jenis_kelamin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tempat_lahir",
 *          description="tempat_lahir",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_lahir",
 *          description="tanggal_lahir",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="agama",
 *          description="agama",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pendidikan_terakhir",
 *          description="pendidikan_terakhir",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nomor_keputusan_pengangkatan",
 *          description="nomor_keputusan_pengangkatan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_keputusan_pengangkatan",
 *          description="tanggal_keputusan_pengangkatan",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="nomor_keputusan_pemberentian",
 *          description="nomor_keputusan_pemberentian",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_keputusan_pemberentian",
 *          description="tanggal_keputusan_pemberentian",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="keterangan",
 *          description="keterangan",
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
class anggotabpd extends Model
{
    use SoftDeletes;

    public $table = 'anggotabpds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan_terakhir',
        'nomor_keputusan_pengangkatan',
        'tanggal_keputusan_pengangkatan',
        'nomor_keputusan_pemberentian',
        'tanggal_keputusan_pemberentian',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'jenis_kelamin' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'agama' => 'string',
        'pendidikan_terakhir' => 'string',
        'nomor_keputusan_pengangkatan' => 'string',
        'tanggal_keputusan_pengangkatan' => 'date',
        'nomor_keputusan_pemberentian' => 'string',
        'tanggal_keputusan_pemberentian' => 'date',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'agama' => 'required',
        'pendidikan_terakhir' => 'required',
        'nomor_keputusan_pengangkatan' => 'required',
        'tanggal_keputusan_pengangkatan' => 'required',
        'nomor_keputusan_pemberentian' => 'required',
        'tanggal_keputusan_pemberentian' => 'required',
        'keterangan' => 'required'
    ];

    
}
