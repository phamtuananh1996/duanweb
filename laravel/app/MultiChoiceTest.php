<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiChoiceTest extends Model
{
    
	public function test()
	{
		return $this->belongsTo(App\Test::class);
	}
}
