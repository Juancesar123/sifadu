<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateagendabpdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendabpds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal', 100);
            $table->string('nomor_surat_masuk', 100);
            $table->date('tanggal_surat_masuk');
            $table->string('pengirim_surat_masuk', 100);
            $table->text('isi_singkat_surat_masuk');
            $table->text('isi_singkat_surat_keluar');
            $table->date('tanggal_pengiriman_surat_keluar');
            $table->string('tujuan', 100);
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
        Schema::drop('agendabpds');
    }
}
