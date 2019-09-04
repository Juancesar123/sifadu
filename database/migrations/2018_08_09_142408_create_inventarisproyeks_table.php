<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateinventarisproyeksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarisproyeks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_proyek', 100);
            $table->string('volume', 100);
            $table->decimal('biaya', 10, 0);
            $table->string('lokasi', 100);
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
        Schema::drop('inventarisproyeks');
    }
}
