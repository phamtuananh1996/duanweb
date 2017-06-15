<div class="form-group pmd-textfield pmd-textfield-floating-label">
	<select class="select-with-search form-control pmd-select2" name="category">
		<option>Chọn Thể Loại</option>
		@foreach ($superCategories as $category)
			<option value="{{$category->id}}">{{$category->title}}</option>
			@if($category->children->count())
				@foreach($category->children as $child)
					<option value="{{$child->id}}">	&nbsp;	&nbsp;	&nbsp;	&nbsp;{{$child->title}}</option>
					@if($child->children->count())
						@foreach($child->children as $child_child)
							<option value="{{$child_child->id}}">	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;{{$child_child->title}}</option>
							@if($child_child->children->count())
								@foreach($child_child->children as $child_child_child)
									<option value="{{$child_child_child->id}}">	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp; &nbsp;{{$child_child_child->title}}</option>
								@endforeach
							@endif	
						@endforeach
					@endif	
				@endforeach
			@endif
		@endforeach
	</select>
</div>
{{-- @if($category->children->count())
	@foreach($category->children as $superCategories)
		<option value="{{$superCategories->id}}">{{$superCategories->title}}</option>
	@endforeach
@endif --}}