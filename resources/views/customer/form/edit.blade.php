
<!-- FORM -->
<form name="form" class="form " method="post" action="{{ url('/customers/'.$user->token) }}" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="PUT">


<button type="submit" class="btn btn-primary btn-save " data-loading-text="Please wait...">Save Changes</button>
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
			        <input  type="text" name="first_name" id="first_name" placeholder="Enter first name" required class="form-control" value="{{ $user->first_name }}">
			    </div>
			</div>   
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="name">Last Name </label>
                    <input  type="text" name="last_name" id="last_name" placeholder="Enter last name" required class="form-control"  value="{{ $user->last_name }}">
                </div>
            </div>   
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="name">Birthday </label>
                    <input  type="date" name="birthday" id="birthday"   class="form-control"  data-date-format="yyyy-mm-dd" value="{{ $user->birthday }}">
                </div>
            </div>  
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="gender">Gender </label>
                    <select name='gender' id="gender"  class="form-control"  required>
                      <option value='M' {{ $user->gender=='M' ? 'selected' : '' }}  >Male</option>
                      <option value="F" {{ $user->gender=='F' ? 'selected' : '' }}  >Female</option>
                    </select>   
                </div>
            </div>  
		</div><!-- row -->





      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="bio">Bio </label>
                <textarea name="bio" id="bio"class="form-control " placeholder="Enter bio" rows="2"  >{{ $user->bio }}</textarea>
            </div>
        </div>
      </div><!-- /row -->


        <div class="row">
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="email">Email <small>(primary)</small> </label>
                    <input  type="email" name="email" id="email" placeholder="Enter email"  class="form-control" value="{{ $user->email }}">
                </div>
            </div>   
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="secondary_email">Email <small>(seconday)</small> </label>
                    <input  type="email" name="secondary_email" id="secondary_email" placeholder="Enter email"  class="form-control" value="{{ $user->secondary_email }}">
                </div>
            </div>           
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="primary_phone">Phone <small>(primary)</small> </label>
                    <input  type="text" name="primary_phone" id="primary_phone" placeholder="Enter phone"  class="form-control" value="{{ $user->primary_phone }}">
                </div>
            </div>   
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="secondary_phone">Phone <small>(seconday)</small> </label>
                    <input  type="text" name="secondary_phone" id="secondary_phone" placeholder="Enter phone"  class="form-control" value="{{ $user->secondary_phone }}">
                </div>
            </div>               
       </div><!-- row -->



      <div class="row">
        <div class="col-md-6">
            <div class="form-group"> 
                <label class="control-label" for="address">Address </label>
                <input  type="text" name="address" id="address" placeholder="Enter address"  class="form-control" value="{{ $user->address }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group"> 
                <label class="control-label" for="address1">Address 1</label>
                <input  type="text" name="address1" id="address1" placeholder="Enter address1"  class="form-control" value="{{ $user->address1 }}">
            </div>
        </div>        
      </div><!-- /row -->

      <div class="row">
        <div class="col-md-4">
            <div class="form-group"> 
                <label class="control-label" for="city">City </label>
                <input  type="text" name="city" id="city" placeholder="Enter city"  class="form-control" value="{{ $user->city }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group"> 
                <label class="control-label" for="postal_code">Postal Code </label>
                <input  type="text" name="postal_code" id="postal_code" placeholder="Enter postal code"  class="form-control" value="{{ $user->postal_code }}">
            </div>
        </div>        
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="country">Country</label>
                  <select name='country' id="country"  class="form-control"  >
                    <option value=>-select-</option>
                    <option value='US' {{ $user->country=='US' ? 'selected' : '' }} >USA</option>
                    <option value="CA" {{ $user->country=='CA' ? 'selected' : '' }} >Canada</option>
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
                    <option value='{{ $state->id }}' {{ $user->state== $state->id ? 'selected' : '' }} > {{ $state->name }} </option>
                    @endforeach
                  </select>  
            </div>
        </div>                 
      </div><!-- /row -->


      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="notes">Notes </label>
                <textarea name="notes" id="notes"class="form-control " placeholder="Enter notes" rows="2"  >{{ $user->notes }}</textarea>
            </div>
        </div>
      </div><!-- /row -->

        <div class="row">
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="is_active">Status </label>
                    <select name='is_active' id="is_active"  class="form-control"  required>
                      <option value='1'  {{ $user->is_active==1 ? 'selected' : '' }} >Active</option>
                      <option value="0"  {{ $user->is_active==0 ? 'selected' : '' }} >Inactive</option>
                    </select>   
                </div>
            </div>  
        </div><!-- row -->

	</div>
</div>

</form><!--/ END FORM -->