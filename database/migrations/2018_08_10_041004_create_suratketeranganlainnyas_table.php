<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesuratketeranganlainnyasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratketeranganlainnyas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 100);
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
        Schema::drop('suratketeranganlainnyas');
    }
}
