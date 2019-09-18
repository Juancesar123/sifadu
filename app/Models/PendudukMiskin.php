<?php

namespace App\Models;

use Eloquent as Model;
/**
 * @SWG\Definition(
 *      definition="PendudukMiskin",
 *      required={"id_penduduk", "id_indikator_kemiskinan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
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
class PendudukMiskin extends Model
{
    public $table = 'penduduk_miskins';
    public $fillable = [
        'id_penduduk',
        'id_indikator_kemiskinan'
    ];
    protected $casts = [

    ];
    public static $rules = [
        'id_penduduk' => 'required',
        'id_indikator_kemiskinan' => 'required'
    ];

    public function indikator() {
    	return $this->hasOne('App\Models\ParameterIndikatorKemiskinan', 'id', 'id_indikator_kemiskinan');
    }
    public function penduduk() {
    	return $this->belongsTo('App\Models\datapenduduk', 'id_penduduk', 'id');
    }
}