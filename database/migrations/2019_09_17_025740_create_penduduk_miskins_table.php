<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatekemiskinanTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk_miskins', function (Blueprint $table) {
            $table->increments('id');
            $table->int('id_penduduk');
            $table->int('id_indikator_kemiskinan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penduduk_miskins');
    }
}