<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['id_users','NIP','nama_lengkap','jenis_kelamin','kelas','jurusan','nama_pelajaran','password','level','email','image'];


    // public function user()
    // {
    //     return $this->hasMany(User::class);
    // }
}
