<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesuratketerangantidakmampusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratketerangantidakmampus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 100);
            $table->string('nomor_surat', 100);
            $table->string('footer_cetak_data', 100);
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
        Schema::drop('suratketerangantidakmampus');
    }
}
