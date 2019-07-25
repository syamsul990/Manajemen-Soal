<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Notifications\Notifiable;

class Siswa extends Model
{
    use Notifiable;
    protected $table = 'siswa';
    protected $fillable = ['id_users','NIS','nama_lengkap','email','jenis_kelamin','kelas','jurusan','password','level','image','semester','thn_angkatan'];


=======

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['NIS','nama_lengkap','jenis_kelamin','kelas','jurusan','password'];
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
}
