<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateanggotabpdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotabpds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 1);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('agama', 1);
            $table->string('pendidikan_terakhir', 100);
            $table->string('nomor_keputusan_pengangkatan', 100);
            $table->date('tanggal_keputusan_pengangkatan');
            $table->string('nomor_keputusan_pemberentian', 100);
            $table->date('tanggal_keputusan_pemberentian');
            $table->text('keterangan');
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
        Schema::drop('anggotabpds');
    }
}
