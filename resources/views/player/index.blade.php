@extends('layouts.app')
@section('content')
@include('common.breadcrumb')
<div class="row">
	<div class="col-md-12">
	    <a href="{{ url('/players/create') }}" class="btn btn-success btn-rounded">New <i class="material-icons md-18">add</i></a>
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
		            <th>Email</th>
		            <th>Phone</th>
		            <th>Gender</th>
		            <th>Status</th>
	        	</tr>
	    	</thead>
	    	<tbody>
	    	@foreach( $persons as $person )
	        	<tr class="">
		            <td><a href="/players/{{ $person->token }}/edit" class="btn btn-info btn-circle btn-xs"><i class="material-icons">edit</i></a> </td>
		            <td>{{ $person->first_name }} {{ $person->last_name }}</td>
		            <td>{{ $person->email  }}</td>
		            <td>{{ $person->primary_phone }}</td>
		            <td>{{ $person->gender }}</td>
		            <td>{{ $person->is_active ? 'Yes' : 'No' }}</td>
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