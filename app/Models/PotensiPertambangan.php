<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\MultiPolygon;
use Grimzy\LaravelMysqlSpatial\Types\Geometry;

/**
 * @SWG\Definition(
 *      definition="PotensiPertambangan",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="statusLahan",
 *          description="statusLahan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenisPertambangan",
 *          description="jenisPertambangan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pengelola",
 *          description="pengelola",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="penanggungJawab",
 *          description="penanggungJawab",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="luasArea",
 *          description="luasArea",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="masaPengelolaan",
 *          description="masaPengelolaan",
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
class PotensiPertambangan extends Model
{
    use SoftDeletes;
    use SpatialTrait;

    public $table = 'potensi_pertambangans';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'statusLahan',
        'jenisPertambangan',
        'pengelola',
        'penanggungJawab',
        'luasArea',
        'masaPengelolaan',
        'nilaiInvestasi',
        'lokasiTambang'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'statusLahan' => 'required|string',
        'jenisPertambangan' => 'required|string',
        'pengelola' => 'required|string',
        'penanggungJawab' => 'required|string',
        'luasArea' => 'required|string',
        'masaPengelolaan' => 'required|string',
        'nilaiInvestasi' => 'required|string',
        'lokasiTambang' => 'required|string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Special field to define which column handled by laravel-mysql-spatial plugin
     */
    protected $spatialFields = [
        'koordinate',
    ];

    public function input_koordinate($input) {
        if (isset($input['koordinate']) && !empty($input['koordinate'])) {
            $geom = Geometry::fromJson($input['koordinate']);
            $this->koordinate = new MultiPolygon([ $geom ]);
        }
    }
}
