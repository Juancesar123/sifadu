<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataUkmsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ukms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pengelola');
            $table->string('bentuk_usaha');
            $table->string('nama_produk');
            $table->string('bahan_baku');
            $table->string('alamat');
            $table->integer('jumlah_staff');
            $table->integer('omset');
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
        Schema::drop('data_ukms');
    }
}
