<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = 'ujian';
    protected $fillable = ['jum_soal','jenis_ujian','kelas','jurusan','nama_pelajaran','semester'];
}
