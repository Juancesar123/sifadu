<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\Geometry;

class Marker extends Model
{
    use SoftDeletes;
    use SpatialTrait;

    protected $fillable = ['name','lat','lng','category','subcategory','description','option','fitur'];

    protected $spatialFields = [
        'geom',
    ];

    public function input_geom($input) {
        if (isset($input['geom']) && !empty($input['geom'])) {
           return  $this->geom = Geometry::fromJson($input['geom']);
        }
    }
}
