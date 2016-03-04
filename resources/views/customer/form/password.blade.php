<!-- FORM -->
<form name="form" class="form " method="post" action="{{ url('/users/'.$user->token .'/password') }}" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="PUT">


<button type="submit" class="btn btn-primary btn-save btn-rounded" data-loading-text="Please wait...">Save Changes</button>

<hr>

<div class="row">
	<div class="col-md-3">
    	<div class="form-group"> 
	        <label class="control-label" for="name">Password </label>
	        <input  type="password" name="password" id="password" placeholder="Enter password" required class="form-control" value="">
	    </div>
	</div>  
</div>

</form><!--/ END FORM -->