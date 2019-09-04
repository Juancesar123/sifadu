<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBencanaAlamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencana_alams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_bencana');
            $table->string('lokasi');
            $table->string('status');
            $table->string('korban_jiwa');
            $table->string('korban_luka');
            $table->string('kerusakan');
            $table->string('nilai_kerusakan');
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
        Schema::dropIfExists('bencana_alams');
    }
}
