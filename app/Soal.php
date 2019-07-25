<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    protected $fillable = ['mapel_id','soal_id','jenis_ujian','soal','image','jawaban1','jawaban2','jawaban3'
    ,'jawaban4','jawaban_benar','status'];
}
