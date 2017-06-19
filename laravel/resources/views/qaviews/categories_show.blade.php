@extends('qaviews.layout')

@section('qa_content')	
	<div class="col-md-9">	<!--main content-->
		@include('qaviews.content_header')
		<!--categories breadcrumbs-->
		<ol class="breadcrumb">
			@php
				if ($category->superCategory) {
					$super = $category->superCategory;
					$list_super = array($super);
					while ($super->id > 1) {
						if($super->superCategory) {
							$super = $super->superCategory;
							array_push($list_super,$super);
						}
					}
					for ($i = count($list_super) - 1; $i >= 0; $i--) {
						echo ('<li><a href="#">'.$list_super[$i]->title.'</a></li>');
					}
				} 
				echo ('<li><a href="#">'.$category->title.'</a></li>');
			@endphp
		</ol>
		@if($category->children->count())
			<div>
				<div class="panel panel-default widget">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-th-list"></span>
						<h3 class="panel-title">{{$category->title}}</h3>
					</div>
					<div class="panel-body">
						<div class="row" style="margin-left: 10px;">
						 @foreach($category->children as $child)
						  <div class="col-md-2 categores-col" style="margin-top: 10px;">
						    <a href="{{url('qa/categories/'.$child->id)}}" class="thumbnail">
						      <img src="{{ asset('') }}/images/categories_thumbnail.png" alt="" width="50" height="50">
						      <div class="caption">
						        <h3 class="text-center">{{$child->title}}</h3>
						        <p>Số câu hỏi: 12
									{{-- @php
										$count = $child->questions->count();
										if($child->children){
											foreach ($child->children as $key) {
												$count = $count + $key->questions->count();
												include 'qaviews.countQuestions';
											}	
										}
										 echo $count;
									@endphp --}}
						        </p>
						      </div>
						    </a>
						  </div>
						  @endforeach
						</div>
					</div>
				</div>
			</div>
		@endif
		<div >
			<div class="panel panel-default widget">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-th-list"></span>
					<h3 class="panel-title">Câu hỏi trong {{$category->title}}</h3>
					<span class="label label-info">{{$questions->count()}}</span>
				</div>
				<div class="panel-body">
					<ul class="list-group">
						@foreach ($questions as $question)
							@include('qaviews.card')
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	@include('qaviews.sidebar')
@endsection