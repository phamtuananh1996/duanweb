<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
class Categories extends Model
{
    protected $table = "categories";
    protected $fillable = ['super_category_id','title','description','oder_display'];

    public function children()
    {
    	return $this->hasMany('App\Categories','super_category_id','id');
    }
}
