<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_name','email', 'password','phone','class','local','gender','status','coin','avatar','role_id','birthday','description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tests()
    {
        return $this->hasMany('App\Test','user_id','id');
    }

    public function userTest() {
        return $this->hasMany(UserTest::class);
    }

   public function followQuestion()
   {
      return $this->hasMany('App\FollowQuestion','user_id','id');
   }

    public function voteQuestion()
   {
      return $this->hasMany('App\VoteQuestion','user_id','id');
   }

}
