<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Test extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\categories','category_id','id');
    }

    public function multiChoiceTests(){
        return $this->hasMany('App\MultiChoiceTest','test_id','id');
    }

    public function writingTest(){
        return $this->belongsTo('App\WritingTest','test_id','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function comments() {
    	return $this->hasMany('App\TestComment','test_id','id');
    }

    public function userTests() {
    	return $this->hasMany(UserTest::class);
    }
}
