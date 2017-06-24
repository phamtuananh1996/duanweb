<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
	protected $table = "permissions";
	protected $fillable = ['role_id'];
	public function role(){
		return $this->hasOne('App\Role','permissions_id','id');
	}
}
