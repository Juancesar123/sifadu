<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKeteranganPenghasilansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_penghasilans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('footer');
            $table->int('penghasilan');
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
        Schema::drop('keterangan_penghasilans');
    }
}
