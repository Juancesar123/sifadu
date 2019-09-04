<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePotensiPertambangansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potensi_pertambangans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('statusLahan');
            $table->string('jenisPertambangan');
            $table->string('pengelola');
            $table->string('penanggungJawab');
            $table->string('luasArea');
            $table->string('masaPengelolaan');
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
        Schema::drop('potensi_pertambangans');
    }
}
