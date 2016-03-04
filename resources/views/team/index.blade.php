@extends('layouts.app')
@section('content')
@include('common.breadcrumb')
<div class="row">
	<div class="col-md-12">
	    <a href="{{ url('/teams/create') }}" class="btn btn-success btn-rounded">New <i class="material-icons md-18">add</i></a>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
	    <table id="datatable" class="table table-striped dataTables"  >
	    	<thead>
	        	<tr class="">
		            <th></th>
		            <th>Name</th>
		            <th>Sport</th>
		            <th>Gender</th>
		            <th>Category</th>
		            <th>Status</th>
	        	</tr>
	    	</thead>
	    	<tbody>
	    	@foreach( $teams as $team )
        	<tr class="">
	            <td><a href="{{ url('/teams/'.$team->token.'/edit') }}" class="btn btn-info btn-circle btn-xs"><i class="material-icons">edit</i></a> </td>
	            <td>{{ $team->name }} </td>
	            <td>{{ $team->sport->name }} </td>
	            <td>{{ $team->gender }} </td>
	            <td>{{ $team->category->name }} </td>
	            <td>{{ $team->is_active ? 'Active' : 'Inactive' }}</td>
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