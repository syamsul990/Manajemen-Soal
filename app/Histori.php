<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class histori extends Model
{
    protected $table = 'histori_ujian';
    protected $fillable = ['NIS','kd_mapel', 'jenis_ujian', 'nilai', 'waktu', 'tanggal', 'semester', 'kelas','jurusan'];
}
