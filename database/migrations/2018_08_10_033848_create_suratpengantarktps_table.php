<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesuratpengantarktpsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratpengantarktps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_atau_nik', 100);
            $table->string('nomor_surat', 100);
            $table->text('footer_cetak_data');
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
        Schema::drop('suratpengantarktps');
    }
}
