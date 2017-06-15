<li class="sub-menu-item">
	@if ($superCategory->children->count())
		<a href="#nothing" class="menu-item-link"> {{$superCategory->title}} <span class="glyphicon glyphicon-menu-right"></span></a>
		<ul class="sub-nav">
			@foreach($superCategory->children as $superCategory)
				@include('layouts.recursive_menu', $superCategory)
			@endforeach
		</ul>
	@else 
		<a href="#nothing" class="menu-item-link"> {{$superCategory->title}}</a>
	@endif
</li>
