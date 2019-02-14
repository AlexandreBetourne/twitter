<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Tweet;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'img', 'fullname' ,'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets(){
      return $this->hasMany(Tweet::Class);
    }

    public function follows(){
      return $this->belongsToMany(User::Class, 'followers', 'userid1', 'userid2');
    }

    public function followers(){
      return $this->belongsToMany(User::Class, 'followers', 'userid2', 'userid1');
    }
}
