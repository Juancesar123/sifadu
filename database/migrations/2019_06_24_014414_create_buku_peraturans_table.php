<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuPeraturansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adum_buku_peraturans', function (Blueprint $table) {
            $table->increments('abp_id');
            $table->unsignedInteger('abp_nomor_urut');
            $table->string('abp_jenis_peraturan');
            $table->date('abp_tanggal_tetap');
            $table->string('abp_tentang');
            $table->text('abp_uraian_singkat');
            $table->date('abp_tanggal_sepakat');
            $table->date('abp_tanggal_lapor');
            $table->date('abp_tanggal_undang_lembaran');
            $table->date('abp_tanggal_undang_berita');
            $table->text('abp_keterangan')->nullable();
            $table->timestamps();
        });
        
        Schema::dropIfExists('buku_peraturans');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adum_buku_peraturans');
    }
}
