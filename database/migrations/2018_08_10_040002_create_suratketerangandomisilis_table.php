<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesuratketerangandomisilisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratketerangandomisilis', function (Blueprint $table) {
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
        Schema::drop('suratketerangandomisilis');
    }
}
