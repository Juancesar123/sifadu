<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenduduklahirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduklahirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kk');
            $table->string('tgl_lahir');
            $table->string('waktu_lahir');
            $table->string('nama_bayi');
            $table->string('tempat_lahir');
            $table->string('jenis_kelamin');
            $table->string('nama_ibu');
            $table->softDeletes();
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
        Schema::dropIfExists('penduduklahirs');
    }
}
