<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
use Storage;
use Avatar;
=======
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2

class User extends Authenticatable
{
    use Notifiable;

<<<<<<< HEAD
=======
    protected $guard = 'user';

>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'email', 'password','level'
=======
        'name', 'email', 'password',
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD

    protected $appends = ['avatar_url'];

    public function getAvatarUrlAttribute()
    {
        return Storage::url('avatars/'.$this->id.'/'.$this->avatar);
    }

    public function makeAvatar(){
        $avatar = Avatar::create($this->name)->getImageObject()->encode('png');
        Storage::put('public/avatars/'.$this->id.'/avatar.png', (string) $avatar);
    }

    // public function user()
    // {
    //     return $this->belongsTo(Siswa::class);
    // }
=======
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
}
