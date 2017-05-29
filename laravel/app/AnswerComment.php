<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use App\Question;
use Auth;
class AnswerComment extends Model
{
   public function user()
   {
   		return $this->belongsTo('App\User','user_id','id');
   }
}
