<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\Geometry;

/**
 * @SWG\Definition(
 *      definition="CustomData",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="category",
 *          description="category",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="option",
 *          description="option",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="geom",
 *          description="geom",
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
class CustomData extends Model
{
    use SoftDeletes;
    use SpatialTrait;

    public $table = 'markers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $fillable = [
        'name',
        'lat',
        'icon',
        'lng',
        'category',
        'subcategory',
        'description',
        'option',
        'fitur'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'category' => 'string',
        'subcategory' => 'string',
        'description' => 'string',
        'option' => 'string',
        //'geom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'id' => 'required',
        'name' => 'required',
        'geom' => 'required',
        'category' => 'required',
    ];

    /**
     * Special field to define which column handled by laravel-mysql-spatial plugin
     */
    protected $spatialFields = [
        'geom',
    ];

    public function input_geom($input) {
        if (isset($input['geom']) && !empty($input['geom'])) {
            $this->geom = Geometry::fromJson($input['geom']);
        }
    }

    
}
