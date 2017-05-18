@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <h1>
    Category
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Category</li>
  </ol>
</section>
<!-- list account -->
<section class="content">
 <div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">List Category</h3>
      </div>
      @if(session('notify'))
          <div class="alert bg-teal disabled color-palette">
            {{session('notify')}}
          </div>
          @endif
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
            <tr role="row">
              <th>ID</th>
              <th>parent category id</th>
              <th>Title</th>
              <th>Description</th>
              <th>Create date</th>
              <th>Update date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($category as $cate)
            <tr role="row" class="odd">
              <td class="sorting_1">{{$cate->id}}</td>
              <td>{{$cate->super_category_id}}</td>
              <td>{{$cate->title}}</td>
              <td>{{$cate->description}}</td>
              <td>{{$cate->created_at}}</td>
              <td>{{$cate->updated_at}}</td>
              <td>
                <div class="btn-group">
                  <a href="{{ url('admin/category/show',$cate->id) }}"><i class="fa fa-fw fa-cog"></i></a>
                  <a href="{{ url('admin/category',$cate->id) }}"><i class="fa fa-fw fa-remove"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</section>
@stop