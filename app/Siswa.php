<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Siswa extends Model
{
    use Notifiable;
    protected $table = 'siswa';
    protected $fillable = ['user_id','NIS','jenis_kelamin','kelas','jurusan','level','image','semester','thn_angkatan'];


}
