<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatekeputusanbpdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keputusanbpds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_keputusan', 100);
            $table->string('tentang', 100);
            $table->date('tanggal_keputusan');
            $table->text('uraian_singkat');
            $table->text('keterangan');
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
        Schema::drop('keputusanbpds');
    }
}
