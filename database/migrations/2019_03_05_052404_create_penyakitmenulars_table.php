<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyakitmenularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyakitmenulars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kk');
            $table->string('nama_kepala_kk');
            $table->string('nama_penderita');
            $table->string('usia');
            $table->string('diagnosa');
            $table->string('rujukan');
            $table->string('jaminan_kesehatan');
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
        Schema::dropIfExists('penyakitmenulars');
    }
}
