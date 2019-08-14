<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mapel;
class Ujian extends Model
{
    protected $table = 'ujian';
    protected $fillable = ['jum_soal','jenis_ujian','kelas','jurusan','kd_mapel','semester','waktu_mulai','waktu_selesai'];


}
