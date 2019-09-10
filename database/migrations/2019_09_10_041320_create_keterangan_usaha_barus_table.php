<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKeteranganUsahaBarusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_usaha_barus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('footer');
            $table->string('jenis_usaha');
            $table->int('luas_tempat');
            $table->int('alamat_tempat');
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
        Schema::drop('keterangan_usaha_barus');
    }
}
