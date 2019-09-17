<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="datapenduduk",
 *      required={"nik", "no_kk", "nama_lengkap", "tanggal_lahir", "agama", "hub_kel", "status_kawin", "nama_lengkap_ayah", "nama_lengkap_ibu", "alamat", "no_rt", "nama_kecamatan", "nama_kecamatan_2", "jenis_pekerjaan", "pendidikan_akhir", "status_KTP"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nik",
 *          description="nik",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_kk",
 *          description="no_kk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_lengkap",
 *          description="nama_lengkap",
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
 *          property="hub_kel",
 *          description="hub_kel",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status_kawin",
 *          description="status_kawin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_lengkap_ayah",
 *          description="nama_lengkap_ayah",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_lengkap_ibu",
 *          description="nama_lengkap_ibu",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat",
 *          description="alamat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_rt",
 *          description="no_rt",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_rw",
 *          description="no_rw",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_kecamatan",
 *          description="nama_kecamatan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_kecamatan_2",
 *          description="nama_kecamatan_2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_pekerjaan",
 *          description="jenis_pekerjaan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pendidikan_akhir",
 *          description="pendidikan_akhir",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status_KTP",
 *          description="status_KTP",
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
class datapenduduk extends Model
{
    use SoftDeletes;

    public $table = 'datapenduduks';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nik',
        'no_kk',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'hub_kel',
        'status_kawin',
        'nama_lengkap_ayah',
        'nama_lengkap_ibu',
        'alamat',
        'no_rt',
        'no_rw',
        'nama_kecamatan',
        'nama_kecamatan_2',
        'jenis_pekerjaan',
        'pendidikan_akhir',
        'jenis_kelamin',
        'status_KTP'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nik' => 'string',
        'no_kk' => 'string',
        'nama_lengkap' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'string',
        'agama' => 'string',
        'hub_kel' => 'string',
        'status_kawin' => 'string',
        'nama_lengkap_ayah' => 'string',
        'nama_lengkap_ibu' => 'string',
        'alamat' => 'string',
        'no_rt' => 'string',
        'no_rw' => 'string',
        'nama_kecamatan' => 'string',
        'nama_kecamatan_2' => 'string',
        'jenis_pekerjaan' => 'string',
        'pendidikan_akhir' => 'string',
        'status_KTP' => 'string',
        'jenis_kelamin' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik' => 'required|numeric',
        'no_kk' => 'required|numeric',
        'nama_lengkap' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'agama' => 'required',
        'hub_kel' => 'required',
        'status_kawin' => 'required',
        'nama_lengkap_ayah' => 'required',
        'nama_lengkap_ibu' => 'required',
        'alamat' => 'required',
        'no_rt' => 'required',
        'no_rw' => 'required',
        'nama_kecamatan' => 'required',
        'nama_kecamatan_2' => 'required',
        'jenis_pekerjaan' => 'required',
        'pendidikan_akhir' => 'required',
        'status_KTP' => 'required'
    ];

    public function kemiskinan() {
    	return $this->hasMany('App\Models\PendudukMiskin', 'id_penduduk', 'id');
    }
}