<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataBudiDayaHutansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_budi_daya_hutans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_lahan');
            $table->string('jenis_budidaya');
            $table->string('pengelola');
            $table->string('penanggung_jawab');
            $table->string('luas_area');
            $table->string('masa_pengelolaan');
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
        Schema::drop('data_budi_daya_hutans');
    }
}
