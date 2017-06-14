<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
class Categories extends Model
{
    protected $table = "categories";
    protected $fillable = ['supartialsgory_id','title','description','oder_display'];

    public function children()
    {
    	return $this->hasMany('App\Categories','super_category_id','id');
    }
}
