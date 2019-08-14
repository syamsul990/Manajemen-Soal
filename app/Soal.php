<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    protected $fillable = ['kd_mapel','ujian','soal','image','jawaban1','jawaban2','jawaban3'
    ,'jawaban4','jawaban_benar','status'];
}
