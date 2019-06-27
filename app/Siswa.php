<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['NIS','nama_lengkap','jenis_kelamin','kelas','jurusan'];
}
