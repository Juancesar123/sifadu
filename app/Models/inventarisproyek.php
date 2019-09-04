<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="inventarisproyek",
 *      required={"nama_proyek", "volume", "biaya", "lokasi", "keterangan", "tahun"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_proyek",
 *          description="nama_proyek",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="volume",
 *          description="volume",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="biaya",
 *          description="biaya",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="lokasi",
 *          description="lokasi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="keterangan",
 *          description="keterangan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tahun",
 *          description="tahun",
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
class inventarisproyek extends Model
{
    use SoftDeletes;

    public $table = 'inventarisproyeks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_proyek',
        'volume',
        'biaya',
        'lokasi',
        'keterangan',
        'tahun'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_proyek' => 'string',
        'volume' => 'string',
        'lokasi' => 'string',
        'keterangan' => 'string',
        'tahun' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_proyek' => 'required',
        'volume' => 'required',
        'biaya' => 'required',
        'lokasi' => 'required',
        'keterangan' => 'required',
        'tahun' => 'required'
    ];

    
}
