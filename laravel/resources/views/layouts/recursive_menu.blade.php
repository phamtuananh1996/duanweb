<li class="dropdown">
	@if ($superCategory->children->count())
		<a href="#nothing"> {{$superCategory->title}} <span class="caret"></a>
		<ul class="dropdown-menu main-nav">
			@foreach($superCategory->children as $superCategory)
				@include('layouts.recursive_menu', $superCategory)
			@endforeach
		</ul>
	@else 
		<a href="#nothing"> {{$superCategory->title}}</a>
	@endif
</li>
