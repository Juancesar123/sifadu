<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adum_buku_inventaris', function (Blueprint $table) {
            $table->increments('abi_id');
            $table->unsignedInteger('abi_nomor_urut');
            $table->string('abi_jenis_inventaris');
            $table->integer('abi_dibeli_sendiri')->nullable();
            $table->integer('abi_bantuan_pemerintah')->nullable();
            $table->integer('abi_bantuan_provinsi')->nullable();
            $table->integer('abi_bantuan_kabkota')->nullable();
            $table->integer('abi_sumbangan')->nullable();
            $table->integer('abi_awal_baik')->nullable();
            $table->integer('abi_awal_rusak')->nullable();
            $table->integer('abi_hapus_rusak')->nullable();
            $table->integer('abi_hapus_dijual')->nullable();
            $table->integer('abi_hapus_disumbangkan')->nullable();
            $table->date('abi_tanggal_hapus')->nullable();
            $table->integer('abi_akhir_baik')->nullable();
            $table->integer('abi_akhir_rusak')->nullable();
            $table->string('ket');
            $table->timestamps();
        });

        Schema::dropIfExists('buku_inventaris');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adum_buku_inventaris');
    }
}
