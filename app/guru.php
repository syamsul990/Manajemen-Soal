<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['user_id','NIP','jenis_kelamin','kelas','jurusan','nama_pelajaran'];
}
