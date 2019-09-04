<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkaPutusSekolahsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angka_putus_sekolahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_KTP');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kondisi');
            $table->string('status_penanganan');
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
        Schema::drop('angka_putus_sekolahs');
    }
}
