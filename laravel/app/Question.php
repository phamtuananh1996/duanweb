<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers()
    {
    	return $this->hasMany('App\Answer','question_id','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function category()
    {
    	return $this->belongsTo('App\Categories','categories_id','id');
    }

    public function voteQuestion()
    {
         return $this->hasMany('App\VoteQuestion','question_id','id');
    }
}
