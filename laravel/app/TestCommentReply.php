<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCommentReply extends Model
{
    public function user() {
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function voteCommentReplie()
    {
    	return $this->hasMany('App\VoteAnswerCommentTest','test_comment_replies_id','id');
    }
}
