<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="rencanapembangunan",
 *      required={"nama_proyek", "lokasi", "dana_dari_pemerintah", "dana_dari_provinsi", "dana_dari_kabupaten", "dana_dari_swadaya", "jumlah_dana", "pelaksana", "manfaat"},
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
 *          property="lokasi",
 *          description="lokasi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dana_dari_pemerintah",
 *          description="dana_dari_pemerintah",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dana_dari_provinsi",
 *          description="dana_dari_provinsi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dana_dari_kabupaten",
 *          description="dana_dari_kabupaten",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dana_dari_swadaya",
 *          description="dana_dari_swadaya",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jumlah_dana",
 *          description="jumlah_dana",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pelaksana",
 *          description="pelaksana",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="manfaat",
 *          description="manfaat",
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
class rencanapembangunan extends Model
{
    use SoftDeletes;

    public $table = 'rencanapembangunans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_proyek',
        'lokasi',
        'dana_dari_pemerintah',
        'dana_dari_provinsi',
        'dana_dari_kabupaten',
        'dana_dari_swadaya',
        'jumlah_dana',
        'pelaksana',
        'manfaat',
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
        'lokasi' => 'string',
        'dana_dari_pemerintah' => 'string',
        'dana_dari_provinsi' => 'string',
        'dana_dari_kabupaten' => 'string',
        'dana_dari_swadaya' => 'string',
        'jumlah_dana' => 'string',
        'pelaksana' => 'string',
        'manfaat' => 'string',
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
        'lokasi' => 'required',
        'dana_dari_pemerintah' => 'required',
        'dana_dari_provinsi' => 'required',
        'dana_dari_kabupaten' => 'required',
        'dana_dari_swadaya' => 'required',
        'jumlah_dana' => 'required',
        'pelaksana' => 'required',
        'manfaat' => 'required',
        'keterangan' => 'required',
        'tahun' => 'required'
    ];

    
}
