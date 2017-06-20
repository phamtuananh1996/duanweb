<li class="v-menu-item ">
	@if ($superCategory->children->count())
		<a href="#nothing" data-toggle="collapse" data-target="#{{$superCategory->id}}" ><span class="glyphicon glyphicon-folder-open"></span>&nbsp; {{$superCategory->title}} </a>
		<div class="collapse" id="{{$superCategory->id}}" style="height: 0px;">
		    <ul class="v-menu-list" ">
			    @foreach($superCategory->children as $superCategory)
			        @include('qaviews.recursive_partials', $superCategory)
			    @endforeach
		    </ul>
	    </div>
	@else
		<a href="{{url('qa/categories/'.$superCategory->id)}}" ><span class="glyphicon glyphicon-file"></span>&nbsp;{{$superCategory->title}} </a>
	@endif
</li>
	