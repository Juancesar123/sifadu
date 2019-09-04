<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="AngkaPutusSekolah",
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
 *          property="kondisi",
 *          description="kondisi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status_penanganan",
 *          description="status_penanganan",
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
class AngkaPutusSekolah extends Model
{
    use SoftDeletes;

    public $table = 'angka_putus_sekolahs';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_kk',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'pendidikan_terakhir',
        'kelas',
        'penyebab'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no_kk' => 'string',
        'nama' => 'string',
        'tempat_lahir' => 'string',
        'tgl_lahir' => 'string',
        'pendidikan_terakhir' => 'string',
        'kelas' => 'string',
        'penyebab' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
