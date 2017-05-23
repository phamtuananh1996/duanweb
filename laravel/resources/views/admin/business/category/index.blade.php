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
          @include('admin.business.category.listcategory')
      </div>
    </div>
  </div>
</div>
</section>
@stop