<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatependudukmeninggalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendudukmeninggals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penduduk_id')->unsigned();
            $table->date('tanggal_meninggal');
            $table->text('keterangan_meninggal');
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
        Schema::drop('pendudukmeninggals');
    }
}
