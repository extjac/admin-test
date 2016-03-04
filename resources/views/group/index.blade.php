@extends('layouts.app')
@section('content')
@include('common.breadcrumb')
<div class="row">
	<div class="col-md-12">
	   	<a href="/teams/create" class="btn btn-success " >
	      <i class="fa fa-plus"></i> Add 
	    </a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	    <table id="datatable" class="table table-striped"  >
	    	<thead>
	        	<tr class="">
		            <th></th>
		            <th>Name</th>
		            <th>Status</th>
	        	</tr>
	    	</thead>
	    	<tbody>
	    	@foreach( $teams as $team )
	        	<tr class="">
		            <td><a href="/teams/{{ $team->token }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> edit</a> </td>
		            <td>{{ $team->name }} </td>
		            <td>{{ $team->is_active ? 'Yes' : 'No' }}</td>
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