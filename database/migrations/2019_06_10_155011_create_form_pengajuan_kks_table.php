<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormPengajuanKKsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_pengajuan_kks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik_atau_nama', 100);
            $table->string('telepon', 14);
            $table->integer('jumlah_keluarga');
            $table->string('nomor_surat', 100);
            $table->text('footer_cetak_data');
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
        Schema::dropIfExists('form_pengajuan_kks');
    }
}
