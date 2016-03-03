@extends('layouts.app')
@section('content')

@include('common.breadcrumb')

<!-- FORM -->
<form name="form" class="form " method="post" action="{{ url('/locations') }}" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="POST">

<div class="row">


    <div class="col-md-2">
      <img src="http://fakeimg.pl/250x250/" class="img-responsive img-fluid" alt="">
    </div>


    <div class="col-md-10">

    <p>
		<button type="submit" class="btn btn-primary " data-loading-text="Please wait...">Save Changes</button>
	</p>

		<div class="row">
			<div class="col-md-9">
			    <div class="form-group"> 
			        <label class="control-label" for="name">Name * </label>
			        <input  type="text" name="name" id="name" placeholder="Enter name" required class="form-control">
			    </div>
			</div>   
	        <div class="col-md-3">
	            <div class="form-group"> 
	                <label class="control-label" for="is_active">Status </label>
	                <select name='is_active' id="is_active"  class="form-control"  required>
	                  <option value='0'>Active</option>
	                  <option value="1">Inactive</option>
	                </select>   
	            </div>
	        </div>  			  
		</div>

      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="description">Description </label>
                <textarea name="description" id="description"class="form-control " placeholder="Enter description" rows="2"  ></textarea>
            </div>
        </div>
      </div><!-- /row -->


          <div class="row">
            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="address">Address </label>
                    <input  type="text" name="address" id="address" placeholder="Enter address"  class="form-control" value="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="address1">Address 1</label>
                    <input  type="text" name="address1" id="address1" placeholder="Enter address1"  class="form-control" value="">
                </div>
            </div>        
          </div><!-- /row -->

          <div class="row">
            <div class="col-md-4">
                <div class="form-group"> 
                    <label class="control-label" for="city">City </label>
                    <input  type="text" name="city" id="city" placeholder="Enter city"  class="form-control" value="">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group"> 
                    <label class="control-label" for="postal_code">Postal Code </label>
                    <input  type="text" name="postal_code" id="postal_code" placeholder="Enter postal code"  class="form-control" value="">
                </div>
            </div>        
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="country">country</label>
                      <select name='country' id="country"  class="form-control"  >
                        <option value=>-select-</option>
                        <option value='US'>USA</option>
                        <option value="CA">Canada</option>
                      </select>  
                </div>
            </div>   
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="state">State</label>
                      <select name='state' id="state"  class="form-control"  >
                        <option value=>-select-</option>
                        <?php $states = App\State::whereIn('country_code', ['US', 'CA'] )->orderBy('country_code', 'desc')->orderBy('name')->get() ?>
                        @foreach( $states as $state )
                        <option value='{{ $state->id }}'  > {{ $state->name }} </option>
                        @endforeach
                      </select>  
                </div>
            </div>                 
          </div><!-- /row -->

	</div>
</div>

</form><!--/ END FORM -->

@endsection
@section('script')
<script type="text/javascript">
	//
</script>
@endsection