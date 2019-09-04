<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\MultiPolygon;
use Grimzy\LaravelMysqlSpatial\Types\Geometry;

/**
 * @SWG\Definition(
 *      definition="DataUkm",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pengelola",
 *          description="pengelola",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bentuk_usaha",
 *          description="bentuk_usaha",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_produk",
 *          description="nama_produk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bahan_baku",
 *          description="bahan_baku",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat",
 *          description="alamat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jumlah_staff",
 *          description="jumlah_staff",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="omset",
 *          description="omset",
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
class bencanaalam extends Model
{
    use SoftDeletes;
    use SpatialTrait;

    public $table = 'bencana_alams';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'jenis_bencana',
        'lokasi',
        'status',
        'korban_jiwa',
        'korban_luka',
        'kerusakan',
        'nilai_kerusakan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'jenis_bencana' => 'string',
        'lokasi' => 'string',
        'status' => 'string',
        'korban_jiwa' => 'string',
        'korban_luka' => 'string',
        'kerusakan' => 'string',
        'nilai_kerusakan' => 'string'
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
