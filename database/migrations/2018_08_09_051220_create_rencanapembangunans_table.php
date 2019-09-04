<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreaterencanapembangunansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencanapembangunans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_proyek', 100);
            $table->string('lokasi', 100);
            $table->decimal('dana_dari_pemerintah', 10,0);
            $table->decimal('dana_dari_provinsi', 10,0);
            $table->decimal('dana_dari_kabupaten', 10,0);
            $table->decimal('dana_dari_swadaya', 10,0);
            $table->decimal('jumlah_dana', 10,0);
            $table->string('pelaksana', 100);
            $table->string('manfaat', 100);
            $table->string('tahun', 100);
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
        Schema::drop('rencanapembangunans');
    }
}
