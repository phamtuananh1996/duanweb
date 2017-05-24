<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Categories;

class ListCategoryComposer
{
	public function compose(View $view){
        $em = 2;
		$category = Categories::all();
        echo '<table id="" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
        echo '<thead>';
            echo '<tr role="row">';
                echo '<th>title</th>';
                echo '<th>Action</th>';
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($category as $key => $value) {
            if($value->super_category_id == 0){
                echo '<tr>';
                echo '<td><span class="white-text" style="margin-left: '.$em.'em;"><strong>'.$value->title.'</strong></span></td>';
                echo '<td>';
                    echo '<div class="btn-group">';
                    echo '<a href="http://localhost:8000/admin/category/show/'.$value->id.'"><i class="fa fa-fw fa-cog"></i></a>';
                    echo '<a href="http://localhost:8000/admin/category/'.$value->id.'"><i class="fa fa-fw fa-remove"></i></a>';
                    echo '</div>';
                echo '</td>';
                $this->sublist($category,$super_category_id=$value->id,$em);
                echo '</tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';
    }
	public function sublist($category, $super_category_id,$em)
    {
        $em =$em+3;
        $cate_data = array();
        foreach ($category as $key => $item)
        {
            if ($item['super_category_id'] == $super_category_id)
            {
                $cate_data[] = $item;
                unset($category[$key]); //hủy 1 biến giá trị
            }
        }
        if ($cate_data)
        {
            foreach ($cate_data as $key => $item)
            {
                echo '<tr>';
                echo '<td><span class="white-text" style="margin-left: '.$em.'em;">'.$item->title.'</span></td>';
                echo '<td>';
                    echo '<div class="btn-group">';
                    echo '<a href="http://localhost:8000/admin/category/show/'.$item->id.'"><i class="fa fa-fw fa-cog"></i></a>';
                    echo '<a href="http://localhost:8000/admin/category/'.$item->id.'"><i class="fa fa-fw fa-remove"></i></a>';
                    echo '</div>';
                echo '</td>';
                $this->sublist($category, $item['id'],$em);
                echo '</tr>';
            }
        }
    }
}