<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDaftarPemilihTetapsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_pemilih_tetaps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_KTP');
            $table->string('nama');
            $table->string('alamat');
            $table->string('pekerjaan');
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
        Schema::drop('daftar_pemilih_tetaps');
    }
}
