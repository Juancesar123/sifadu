<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="kaderpembangunan",
 *      required={"nama", "umur", "jeniskelamin", "pendidikan_atau_kursus", "bidang", "alamat", "keterangan"},
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
 *          property="umur",
 *          description="umur",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jeniskelamin",
 *          description="jeniskelamin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pendidikan_atau_kursus",
 *          description="pendidikan_atau_kursus",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bidang",
 *          description="bidang",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat",
 *          description="alamat",
 *          type="string"
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
class kaderpembangunan extends Model
{
    use SoftDeletes;

    public $table = 'kaderpembangunans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'umur',
        'jeniskelamin',
        'pendidikan_atau_kursus',
        'bidang',
        'alamat',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'umur' => 'string',
        'jeniskelamin' => 'string',
        'pendidikan_atau_kursus' => 'string',
        'bidang' => 'string',
        'alamat' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'umur' => 'required',
        'jeniskelamin' => 'required',
        'pendidikan_atau_kursus' => 'required',
        'bidang' => 'required',
        'alamat' => 'required',
        'keterangan' => 'required'
    ];

    
}
