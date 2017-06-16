<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTestChoiced extends Model
{
    public function userTest()
    {
    	return $this->belongsTo('App\UserTest','user_test_id','id');
    }

    public function multiChoiceTest ()
    {
    	return $this->belongsTo('App\MultiChoiceTest','multi_choice_test_id','id');
    }
}
