@extends('layouts.app')
@section('content')
@include('common.breadcrumb')
<div class="row">
	<div class="col-md-12">
	    <a href="{{ url('/users/create') }}" class="btn btn-success btn-rounded">New <i class="material-icons md-18">add</i></a>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
	    <table id="locationsTable datatable" class="table table-striped "  >
	    	<thead>
	        	<tr class="">
		            <th></th>
		            <th>Name</th>
		            <th>Email</th>
		            <th>Status</th>
	        	</tr>
	    	</thead>
	    	<tbody>
	    	@foreach( $users as $user )
	        	<tr class="">
		            <td><a href="/users/{{ $user->token }}/edit" class="btn btn-info btn-xs btn-rounded"> <i class="material-icons">edit</i>  </a> </td>
		            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
		            <td>{{ $user->email }} </td>
		            <td>{{ $user->is_active ? 'Yes' : 'No' }}</td>
	        	</tr>
	        @endforeach
	    	</tbody>	    	
	 	</table> 
  	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" charset="utf-8">
</script>
@endsection