<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKeteranganMenikahsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_menikahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('footer');
            $table->int('nik_mempelai_satu');
            $table->int('nik_mempelai_dua');
            $table->string('saksi_satu');
            $table->string('saksi_dua');
            $table->string('pembantu_ppn');
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
        Schema::drop('keterangan_menikahs');
    }
}
