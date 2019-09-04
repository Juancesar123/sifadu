<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="kegiatanpembangunan",
 *      required={"nama_proyek", "volume", "dana_dari_pemerintah", "dana_dari_provinsi", "dana_dari_kabupaten", "dana_dari_swadaya", "jumlah_dana", "waktu", "sifat_proyek", "pelaksana", "keterangan", "tahun"},
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
 *          property="dana_dari_pemerintah",
 *          description="dana_dari_pemerintah",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dana_dari_provinsi",
 *          description="dana_dari_provinsi",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="dana_dari_kabupaten",
 *          description="dana_dari_kabupaten",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="dana_dari_swadaya",
 *          description="dana_dari_swadaya",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="jumlah_dana",
 *          description="jumlah_dana",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="sifat_proyek",
 *          description="sifat_proyek",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pelaksana",
 *          description="pelaksana",
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
class kegiatanpembangunan extends Model
{
    use SoftDeletes;

    public $table = 'kegiatanpembangunans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_proyek',
        'volume',
        'dana_dari_pemerintah',
        'dana_dari_provinsi',
        'dana_dari_kabupaten',
        'dana_dari_swadaya',
        'jumlah_dana',
        'waktu',
        'sifat_proyek',
        'pelaksana',
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
        'dana_dari_pemerintah' => 'string',
        'dana_dari_provinsi' => 'string',
        'dana_dari_kabupaten' => 'string',
        'sifat_proyek' => 'string',
        'pelaksana' => 'string',
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
        'dana_dari_pemerintah' => 'required',
        'dana_dari_provinsi' => 'required',
        'dana_dari_kabupaten' => 'required',
        'dana_dari_swadaya' => 'required',
        'jumlah_dana' => 'required',
        'waktu' => 'required',
        'sifat_proyek' => 'required',
        'pelaksana' => 'required',
        'keterangan' => 'required',
        'tahun' => 'required'
    ];

    
}
