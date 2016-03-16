<form name="form" class="form" method="post" action="{{ url('/items/'.$item->token.'/edit') }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<br><br>

 <table id="datatable" class="table table-striped "  >
	<thead>
    	<tr class="">
            <th></th>
            <th></th>
            <th>ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Paid</th>
            <th>Balance</th>
            <th>Status</th>
            <th>Action</th>
    	</tr>
	</thead>
    <tbody>
        <tr class="">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Approve | Refuse </td>
        </tr>    
    </tbody>
</table> 

</form>