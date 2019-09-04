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
        Schema::create('kemiskinan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penduduk_id')->unsigned();
            $table->date('nik');
            $table->text('no_kk');
            $table->text('nama');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('penduduk_id')->references('id')->on('datapenduduks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kemiskinan');
    }
}
