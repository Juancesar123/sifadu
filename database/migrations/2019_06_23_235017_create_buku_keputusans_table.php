<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuKeputusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adum_buku_keputusans', function (Blueprint $table) {
            $table->increments('abk_id');
            $table->unsignedInteger('abk_nomor_urut');
            $table->string('abk_nomor_tanggal');
            $table->string('abk_tentang');
            $table->text('abk_uraian_singkat');
            $table->string('abk_nomor_tanggal_lapor');
            $table->text('abk_keterangan')->nullable();
            $table->timestamps();
        });
        
        Schema::dropIfExists('buku_keputusans');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adum_buku_keputusans');
    }
}
