<!-- FORM -->
<form name="form" class="form " method="post" action="{{ url('/organizations') }}" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="PUT">


<button type="submit" class="btn btn-primary btn-save btn-rounded" data-loading-text="Please wait...">Save Changes</button>
<hr>    

<div class="row">


    <div class="col-md-2">
      <img src="http://fakeimg.pl/250x250/" class="img-responsive img-fluid" alt="">
    </div>


    <div class="col-md-10">


		<div class="row">
			<div class="col-md-12">
			    <div class="form-group"> 
			        <label class="control-label" for="name">Name </label>
			        <input  type="text" name="name" id="name" placeholder="Enter name" required class="form-control" value="{{ $org->name }}">
			    </div>
			</div>   

		</div><!-- row -->


      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="about">About </label>
                <textarea name="about" id="about"class="form-control " placeholder="Enter about" rows="2"  >{{ $org->about }}</textarea>
            </div>
        </div>
      </div><!-- /row -->


        <div class="row">
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="email">Email  </label>
                    <input  type="email" name="email" id="email" placeholder="Enter email"  class="form-control" value="{{ $org->email }}" required>
                </div>
            </div>   
          
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="phone">Phone </label>
                    <input  type="text" name="phone" id="phone" placeholder="Enter phone"  class="form-control" value="{{ $org->phone }}" required>
                </div>
            </div>   
            
       </div><!-- row -->


        <div class="row">
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="paypal">Paypal Email  </label>
                    <input  type="email" name="paypal" id="paypal" placeholder="Enter paypal email"  class="form-control" value="{{ $org->paypal }}" required>
                </div>
            </div>             
       </div><!-- row -->



      <div class="row">
        <div class="col-md-6">
            <div class="form-group"> 
                <label class="control-label" for="address">Address </label>
                <input  type="text" name="address" id="address" placeholder="Enter address"  class="form-control" value="{{ $org->address }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group"> 
                <label class="control-label" for="address1">Address 1</label>
                <input  type="text" name="address1" id="address1" placeholder="Enter address1"  class="form-control" value="{{ $org->address1 }}">
            </div>
        </div>        
      </div><!-- /row -->

      <div class="row">
        <div class="col-md-4">
            <div class="form-group"> 
                <label class="control-label" for="city">City </label>
                <input  type="text" name="city" id="city" placeholder="Enter city"  class="form-control" value="{{ $org->city }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group"> 
                <label class="control-label" for="postal_code">Postal Code </label>
                <input  type="text" name="postal_code" id="postal_code" placeholder="Enter postal code"  class="form-control" value="{{ $org->postal_code }}">
            </div>
        </div>        
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="country">Country</label>
                  <select name='country' id="country"  class="form-control"  >
                    <option value=>-select-</option>
                    <option value='US' {{ $org->country=='US' ? 'selected' : '' }} >USA</option>
                    <option value="CA" {{ $org->country=='CA' ? 'selected' : '' }} >Canada</option>
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
                    <option value='{{ $state->id }}' {{ $org->state== $state->id ? 'selected' : '' }} > {{ $state->name }} </option>
                    @endforeach
                  </select>  
            </div>
        </div>                 
      </div><!-- /row -->


	</div>
</div>

</form><!--/ END FORM -->