<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatependudukpindahsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendudukpindahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penduduk_id')->unsigned();
            $table->date('tanggal_pindah');
            $table->text('keterangan_pindah');
            $table->text('pindah_ke');
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
        Schema::drop('pendudukpindahs');
    }
}
