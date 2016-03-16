@extends('layouts.app')
@section('content')
@include('common.breadcrumb')
<div class="row">
	<div class="col-md-12">
	    <a href="{{ url('/items/create') }}" class="btn btn-success btn-rounded">New <i class="material-icons md-18">add</i></a>
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
		            <th>Price</th>
		            <th>Status</th>
	        	</tr>
	    	</thead>
	    	<tbody>
	    	@foreach( $items as $item )
	        	<tr class="">
		            <td><a href="{{ url('/items/'.$item->token.'/edit') }}" class="btn btn-info btn-circle btn-xs"><i class="material-icons">edit</i></a> </td>
		            <td>{{ $item->name }} </td>
		            <td>{{ $item->currency}} {{ $item->price}} </td>
		            <td>{{ $item->is_active ? 'Active' : 'Inactive ' }}</td>
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