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

    public static function superCategories () {
    	return static::where('super_category_id',0)
    								->orderBy('order_display')
    								->get();
    }
}
