@extends('layouts.app')
@section('content')
@include('common.breadcrumb')
<div class="row">
	<div class="col-md-12">
	    <a href="{{ url('/locations/create') }}" class="btn btn-success btn-rounded">New <i class="material-icons md-18">add</i></a>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
	    <table id="locationsTable datatable" class="table table-striped"  >
	    	<thead>
	        	<tr class="">
		            <th></th>
		            <th>Name</th>
		            <th>Status</th>
	        	</tr>
	    	</thead>
	    	<tbody>
	    	@foreach($locations as $location)
	        	<tr class="">
		            <td><a href="{{ url('/locations/'.$location->token.'/edit') }}" class="btn btn-info btn-circle btn-xs"><i class="material-icons">edit</i> </td>
		            <td>{{ $location->name }}</td>
		            <td>{{ $location->is_active ? 'Yes' : 'No' }}</td>
	        	</tr>
	        @endforeach
	    	</tbody>	    	
	 	</table> 
  	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" charset="utf-8">
//
</script>
@endsection