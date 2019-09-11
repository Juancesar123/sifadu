<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="KeteranganUsahaBaru",
 *      required={"nomor", "footer", "jenis_usaha", "luas_tempat", "alamat_tempat"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nomor",
 *          description="nomor",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="footer",
 *          description="footer",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_usaha",
 *          description="jenis_usaha",
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
class KeteranganUsahaBaru extends Model
{
    use SoftDeletes;

    public $table = 'keterangan_usaha_barus';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nik',
        'nomor',
        'footer',
        'nama',
        'no_npwp',
        'badan_hukum',
        'sk_hukum_ham',
        'jenis_usaha',
        'luas_tempat',
        'alamat_tempat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'string',
        'nama' => 'string',
        'no_npwp' => 'string',
        'badan_hukum' => 'string',
        'sk_hukum_ham' => 'string',
        'alamat_tempat' => 'string',
        'footer' => 'string',
        'jenis_usaha' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik' => 'required',
        'nama' => 'required',
        'no_npwp' => 'required',
        'badan_hukum' => 'required',
        'sk_hukum_ham' => 'required',
        'nomor' => 'required',
        'footer' => 'required',
        'jenis_usaha' => 'required',
        'luas_tempat' => 'required',
        'alamat_tempat' => 'required'
    ];


}