<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Siswa extends Model
{
    use Notifiable;
    protected $table = 'siswa';
    protected $fillable = ['id_users','NIS','nama_lengkap','email','jenis_kelamin','kelas','jurusan','password','level','image','semester','thn_angkatan'];


}
