<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="agendabpd",
 *      required={"tanggal", "nomor_surat_masuk", "tanggal_surat_masuk", "pengirim_surat_masuk", "isi_singkat_surat_masuk", "isi_singkat_surat_keluar", "tanggal_pengiriman_surat_keluar", "tujuan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tanggal",
 *          description="tanggal",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nomor_surat_masuk",
 *          description="nomor_surat_masuk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_surat_masuk",
 *          description="tanggal_surat_masuk",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="pengirim_surat_masuk",
 *          description="pengirim_surat_masuk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="isi_singkat_surat_masuk",
 *          description="isi_singkat_surat_masuk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="isi_singkat_surat_keluar",
 *          description="isi_singkat_surat_keluar",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_pengiriman_surat_keluar",
 *          description="tanggal_pengiriman_surat_keluar",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="tujuan",
 *          description="tujuan",
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
class agendabpd extends Model
{
    use SoftDeletes;

    public $table = 'agendabpds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tanggal',
        'nomor_surat_masuk',
        'tanggal_surat_masuk',
        'pengirim_surat_masuk',
        'isi_singkat_surat_masuk',
        'isi_singkat_surat_keluar',
        'tanggal_pengiriman_surat_keluar',
        'tujuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'string',
        'nomor_surat_masuk' => 'string',
        'tanggal_surat_masuk' => 'date',
        'pengirim_surat_masuk' => 'string',
        'isi_singkat_surat_masuk' => 'string',
        'isi_singkat_surat_keluar' => 'string',
        'tanggal_pengiriman_surat_keluar' => 'date',
        'tujuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal' => 'required',
        'nomor_surat_masuk' => 'required',
        'tanggal_surat_masuk' => 'required',
        'pengirim_surat_masuk' => 'required',
        'isi_singkat_surat_masuk' => 'required',
        'isi_singkat_surat_keluar' => 'required',
        'tanggal_pengiriman_surat_keluar' => 'required',
        'tujuan' => 'required'
    ];

    
}
