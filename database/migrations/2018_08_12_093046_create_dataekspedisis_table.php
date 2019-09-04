<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatedataekspedisisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataekspedisis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_urut', 100);
            $table->date('tanggal_pengiriman');
            $table->date('tanggal_surat');
            $table->string('nomor_surat', 100);
            $table->text('isi_surat');
            $table->string('surat_yang_dituju', 100);
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
        Schema::drop('dataekspedisis');
    }
}
