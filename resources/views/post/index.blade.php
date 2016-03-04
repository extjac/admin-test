@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<a href="{{ url('/posts/create') }}" class="btn btn-success btn-rounded">New <i class="material-icons md-18">add</i></a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-3">
	@include('post.nav')
	</div>

	<div class="col-md-12">
			
  	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" charset="utf-8">
</script>
@endsection