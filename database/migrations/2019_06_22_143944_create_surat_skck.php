<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratSkck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratketeranganskcks', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('nik');
                $table->unsignedInteger('id_pekerjaan'); 
                $table->text('keperluan')->nullable();
                $table->date('start_date');
                $table->date('end_date');
                $table->text('keterangan')->nullable();
                   
                $table->string('nomor_surat', 100);
                $table->string('footer_cetak_data', 100);
                $table->softDeletes();
            
            $table->timestamps();
        });
        Schema::table('suratketeranganskcks', function (Blueprint $table) {
            $table->foreign('id_pekerjaan')->references('id')->on('jenispekerjaans')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nik')->references('id')->on('datapenduduks')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suratketeranganskcks');
        Schema::table('suratketeranganskcks', function (Blueprint $table) {
            $table->dropForeign('id_pekerjaan');
            $table->dropForeign('nik');
        });
    }
}
