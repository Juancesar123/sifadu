<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\MultiPolygon;
use Grimzy\LaravelMysqlSpatial\Types\Geometry;

/**
 * @SWG\Definition(
 *      definition="Peternakan",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status_lahan",
 *          description="status_lahan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_budidaya",
 *          description="jenis_budidaya",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pengelola",
 *          description="pengelola",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="penanggung_jawab",
 *          description="penanggung_jawab",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="luas_area",
 *          description="luas_area",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="masa_pengelolaan",
 *          description="masa_pengelolaan",
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
class Peternakan extends Model
{
    use SoftDeletes;
    use SpatialTrait;

    public $table = 'peternakans';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status_lahan',
        'jenis_budidaya',
        'pengelola',
        'penanggung_jawab',
        'luas_area',
        'jumlah_ternak',
        'masa_pengelolaan',
        'hasil_pertahun'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status_lahan' => 'string',
        'jenis_budidaya' => 'string',
        'pengelola' => 'string',
        'penanggung_jawab' => 'string',
        'luas_area' => 'string',
        'jumlah_ternak' => 'string',
        'masa_pengelolaan' => 'string',
        'hasil_pertahun' => 'string'
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
        'peternakan_koordinate',
    ];

    public function input_peternakan_koordinate($input) {
        if (isset($input['peternakan_koordinate']) && !empty($input['peternakan_koordinate'])) {
            $geom = Geometry::fromJson($input['peternakan_koordinate']);
            $this->peternakan_koordinate = new MultiPolygon([ $geom ]);
        }
    }
}
