<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="pajaktanah",
 *      required={"blok", "dusun", "nop", "nama_wp", "alamat", "ketetapan_pembayaran"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="blok",
 *          description="blok",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dusun",
 *          description="dusun",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nop",
 *          description="nop",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_wp",
 *          description="nama_wp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat",
 *          description="alamat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ketetapan_pembayaran",
 *          description="ketetapan_pembayaran",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lunas",
 *          description="lunas",
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
class pajaktanah extends Model
{
    use SoftDeletes;

    public $table = 'pajaktanahs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'blok',
        'dusun',
        'nop',
        'nama_wp',
        'alamat',
        'ketetapan_pembayaran',
        'lunas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'blok' => 'string',
        'dusun' => 'string',
        'nop' => 'string',
        'nama_wp' => 'string',
        'alamat' => 'string',
        'ketetapan_pembayaran' => 'string',
        'lunas' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'blok' => 'required',
        'dusun' => 'required',
        'nop' => 'required',
        'nama_wp' => 'required',
        'alamat' => 'required',
        'ketetapan_pembayaran' => 'required'
    ];

    
}
