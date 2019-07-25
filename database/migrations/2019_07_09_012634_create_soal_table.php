<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mapel_id');
            $table->string('soal_id');
            $table->string('jenis_ujian');
            $table->string('soal');
            $table->string('image');
            $table->string('jawaban1');
            $table->string('jawaban2');
            $table->string('jawaban3');
            $table->string('jawaban4');
            $table->string('jawaban_benar');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal');
    }
}
