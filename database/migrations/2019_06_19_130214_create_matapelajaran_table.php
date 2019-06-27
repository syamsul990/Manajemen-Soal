<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatapelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matapelajaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matapelajaran');
            $table->string('kd_pengajar');
            $table->string('kd_mapel');
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
        Schema::dropIfExists('matapelajaran');
    }
}
