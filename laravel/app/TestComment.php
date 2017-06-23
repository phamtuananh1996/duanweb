<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestComment extends Model
{
    public function user() {
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function commentReplies()
    {
    	return $this->hasMany('App\TestCommentReply','test_comment_id','id');
    }

      public function voteCommentTest()
   {
      return $this->hasMany('App\voteCommentTest','comment_tests_id','id');
   }
}
