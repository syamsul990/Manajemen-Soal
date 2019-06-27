<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mapel_id');
            $table->string('nama_ujian');
            $table->date('tgl');
            $table->time('waktu');
            $table->string('kelas');
            $table->string('jurusan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ujian');
    }
}
