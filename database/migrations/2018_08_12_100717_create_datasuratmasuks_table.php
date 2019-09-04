<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatedatasuratmasuksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasuratmasuks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_surat', 100);
            $table->string('nomor_surat', 100);
            $table->string('penerima', 100);
            $table->date('tanggal_keluar');
            $table->string('perihal', 100);
            $table->string('tanda_tangan', 100);
            $table->string('atas_nama', 100);
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
        Schema::drop('datasuratmasuks');
    }
}
