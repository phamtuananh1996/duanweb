{{-- created by tran.nham on 19.05.2017 --}}
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@yield('test_content')
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        <!-- Simple Selectbox -->
        $(".select-simple").select2({
            theme: "bootstrap",
            minimumResultsForSearch: Infinity,
        });
        
    });
</script>
@endsection