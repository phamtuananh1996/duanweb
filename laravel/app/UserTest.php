<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    
    public function test()
    {
		return $this->belongsTo('App\Test','test_id','id');	
	}

	public function user() {
		return $this->belongsTo('App\User','user_id','id');
	}

	public function multiChoiceTestAnswers(){
		return $this->hasMany('App\UserTestChoiced','user_test_id','id');
	}

	public function writingTestAnswer(){
		return $this->belongsTo('App\UserWritingTestAnswer','user_test_id','id');
	}
}
