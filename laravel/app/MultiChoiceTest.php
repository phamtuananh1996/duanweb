<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiChoiceTest extends Model
{ 
	public function test()
	{
		return $this->belongsTo('App\Test','id','test_id');
	}

	public function answers() {
		return  $this->hasMany('App\MultiChoiceTestChoice','multi_choice_test_id','id');
		
	}
}
