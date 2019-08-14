<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'matapelajaran';
    protected $fillable = ['kd_mapel','nama_pelajaran','kelas','jurusan','semester','kategori'];
}
