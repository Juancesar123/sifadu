<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatepajaktanahsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pajaktanahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blok', 100);
            $table->string('dusun', 100);
            $table->string('nop', 100);
            $table->string('nama_wp', 100);
            $table->text('alamat');
            $table->string('ketetapan_pembayaran', 100);
            $table->string('lunas', 100);
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
        Schema::drop('pajaktanahs');
    }
}
