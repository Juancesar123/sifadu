<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\MultiPolygon;
use Grimzy\LaravelMysqlSpatial\Types\Geometry;

/**
 * @SWG\Definition(
 *      definition="dusun",
 *      required={"nama_dusun"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_dusun",
 *          description="nama_dusun",
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
class dusun extends Model
{
    use SoftDeletes;
    use SpatialTrait;

    public $table = 'dusuns';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_dusun'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_dusun' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_dusun' => 'required'
    ];


    /**
     * Special field to define which column handled by laravel-mysql-spatial plugin
     */
    protected $spatialFields = [
        'dusun_koordinate',
    ];

    public function input_dusun_koordinate($input) {
        if (isset($input['dusun_koordinate']) && !empty($input['dusun_koordinate'])) {
            $geom = Geometry::fromJson($input['dusun_koordinate']);
            $this->dusun_koordinate = new MultiPolygon([ $geom ]);
        }
    }
}