<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatedatapenduduksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapenduduks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 50);
            $table->string('no_kk', 50);
            $table->string('nama_lengkap', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 50);
            $table->string('hub_kel', 50);
            $table->string('status_kawin', 50);
            $table->string('nama_lengkap_ayah', 100);
            $table->string('nama_lengkap_ibu', 100);
            $table->text('alamat');
            $table->string('jenis_kelamin',2);
            $table->string('no_rt', 12);
            $table->string('no_rw', 12);
            $table->string('nama_kecamatan', 50);
            $table->string('nama_kecamatan_2', 50);
            $table->char('jenis_pekerjaan', 2);
            $table->string('pendidikan_akhir', 40);
            $table->string('status_KTP', 50);
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
        Schema::drop('datapenduduks');
    }
}
