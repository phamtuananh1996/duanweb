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
    protected $table = "users";
    public function role(){
        return $this->belongsTo('App\Role','role_id','id');
    }
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

   public function listFollowingQuestions() {

      // $followings = $this->hasMany('App\FollowQuestion','user_id','id')->get();
      // $questions = new \Illuminate\Database\Eloquent\Collection;
      // foreach ($followings as $following ) {
      //  $question = Question::find($following->question_id);
      //  $questions->add($question);
      // }
     return $this->belongsToMany('App\Question','follow_questions','user_id','question_id');
   }

    public function voteQuestion()
   {
      return $this->hasMany('App\VoteQuestion','user_id','id');
   }

    public function voteAnswer()
   {
      return $this->hasMany('App\voteAnswer','user_id','id');
   }

   public function likeAnswerComment()
   {
       return $this->hasMany('App\LikeAnswerComment','user_id','id');
   }

   public function follow_question()
   {
       return $this->belongsToMany('App\Question','Follow_Questions','user_id','question_id');
   }
}
