<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk', function (Blueprint $table) {
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
        Schema::dropIfExists('tk');
    }
}
