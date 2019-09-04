<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatekegiatanbpdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatanbpds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tentang', 100);
            $table->string('pelaksana', 100);
            $table->string('pokok_kegiatan', 100);
            $table->string('hasil_kegiatan', 100);
            $table->text('keterangan');
            $table->string('tahun', 100);
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
        Schema::drop('kegiatanbpds');
    }
}
