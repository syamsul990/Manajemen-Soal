<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NIS');
            $table->string('nama_mapel');
            $table->string('jenis_ujian');
            $table->string('nilai');
            $table->time('waktu');
            $table->date('tanggal');
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
        Schema::dropIfExists('histori_ujian');
    }
}
