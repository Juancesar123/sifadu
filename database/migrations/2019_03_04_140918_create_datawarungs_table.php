<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatawarungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_warungs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pemilik');
            $table->string('lokasi');
            $table->string('modal_usaha');
            $table->string('omset');
            $table->string('produk_dagang');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datawarungs');
    }
}
