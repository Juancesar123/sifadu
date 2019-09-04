<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('daftar_sarana');
            $table->string('penanggungjawab');
            $table->string('lokasi');
            $table->string('kondisi');
            $table->string('sumber_daya_manusia');
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
        Schema::dropIfExists('sd');
    }
}
