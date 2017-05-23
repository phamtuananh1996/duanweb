<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\categories','category_id','id');
    }
}
