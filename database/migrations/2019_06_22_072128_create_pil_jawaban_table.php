<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pil_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('soal_id');
            $table->string('jawaban1');
            $table->string('jawaban2');
            $table->string('jawaban3');
            $table->string('jawaban4');
            $table->string('jawaban_benar');
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
        Schema::dropIfExists('pil_jawaban');
    }
}
