<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKeteranganKelahiransTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_kelahirans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('jenis_kelamin');
            $table->string('nama');
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
        Schema::drop('keterangan_kelahirans');
    }
}
