<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatekaderpembangunansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaderpembangunans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->string('umur', 100);
            $table->char('jeniskelamin', 1);
            $table->string('pendidikan_atau_kursus', 100);
            $table->string('bidang', 100);
            $table->text('alamat');
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
        Schema::drop('kaderpembangunans');
    }
}
