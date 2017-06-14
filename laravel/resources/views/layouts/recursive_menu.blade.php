<li class="dropdown pmd-dropdown">
	@if ($superCategory->children->count())
		<a href="#nothing" data-toggle="dropdown" class="pmd-ripple-effect dropdown-toggle" data-sidebar="true"> {{$superCategory->title}} <span class="glyphicon glyphicon-triangle-right"></span></a>
		<ul class="dropdown-menu">
			@foreach($superCategory->children as $superCategory)
				@include('layouts.recursive_menu', $superCategory)
			@endforeach
		</ul>
	@else 
		<a href="#nothing" data-toggle="dropdown" class="pmd-ripple-effect dropdown-toggle" data-sidebar="true"> {{$superCategory->title}}</a>
	@endif
</li>
