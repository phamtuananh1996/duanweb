<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Http\Requests\CategoryRequestUpdate;
use App\Http\Requests\CategoryRequestCreate;

class CategoryController extends Controller
{
    public function index(){
    	$category = Categories::all();
    	return view('admin.business.category.index',compact('category'));
    }
    public function getcreate(){
        return view('admin.business.category.create');
    }
    public function postcreate(CategoryRequestCreate $request){
        Categories::create($request->all());
        \Session::flash('notify','Thêm thành công');
        return redirect('category');
    }
    public function Show($id){
    	$category = Categories::find($id);
    	return view('admin.business.category.show',compact('category'));
    }

    public function update(CategoryRequestUpdate $request,Categories $category){
    	$category->super_category_id = $request->super_category_id;
    	$category->title = $request->title;
    	$category->description = $request->description;
        $category->save();
        \Session::flash('notify','Sửa thành công');
    	return redirect('category');
    }
    public function destroy($id){
    	$category = Categories::find($id);
        $category->delete();
        \Session::flash('notify','Xóa thành công');
        return redirect('category');
    }
}
