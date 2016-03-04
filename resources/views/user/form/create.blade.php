
<!-- FORM -->
<form name="form" class="form " method="post" action="{{ url('/users') }}" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit" class="btn btn-primary btn-rounded btn-save" data-loading-text="Please wait...">Save Changes</button>
<hr>


<div class="row">


    <div class="col-md-2">
      <img src="http://fakeimg.pl/250x250/" class="img-responsive img-fluid" alt="">
    </div>


    <div class="col-md-10">

		<div class="row">
			<div class="col-md-3">
			    <div class="form-group"> 
			        <label class="control-label" for="name">First Name </label>
			        <input  type="text" name="first_name" id="first_name" placeholder="Enter first name" required class="form-control">
			    </div>
			</div>   
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="name">Last Name </label>
                    <input  type="text" name="last_name" id="last_name" placeholder="Enter last name" required class="form-control">
                </div>
            </div>   
     

		</div><!-- row -->

        <div class="row">

            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="email">Email </label>
                    <input  type="email" name="email" id="email" placeholder="Enter email" required class="form-control">
                </div>
            </div>   
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="password">Password </label>
                    <input  type="password" name="password" id="password" placeholder="Enter password" required class="form-control">
                </div>
            </div>   

       </div><!-- row -->





        <div class="row">
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="is_active">Status </label>
                    <select name='is_active' id="is_active"  class="form-control"  required>
                      <option value='0'>Active</option>
                      <option value="1">Inactive</option>
                    </select>   
                </div>
            </div>  
  </div><!-- /row -->
	</div>
</div>

</form><!--/ END FORM -->