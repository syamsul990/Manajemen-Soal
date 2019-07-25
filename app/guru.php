<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['NIK','nama_lengkap','jenis_kelamin','kelas','jurusan','mengajar'];
}
