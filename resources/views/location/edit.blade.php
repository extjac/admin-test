@extends('layouts.app')
@section('content')

@include('common.breadcrumb')


<!-- FORM -->
<form name="form" class="form " method="post" action="{{ url('/locations/'. $location->token) }}" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="PUT">

<div class="row">

    <div class="col-md-2">
      <img src="http://fakeimg.pl/250x250/" class="img-responsive img-fluid" alt="">
    </div>

    <div class="col-md-9">

      <p>
    		<button type="submit" class="btn btn-primary "data-loading-text="Please wait..."> Save Changes </button>
    	</p>

    		<div class="row">
    			<div class="col-md-9">
    			    <div class="form-group"> 
    			        <label class="control-label" for="name">Name * </label>
    			        <input  type="text" name="name" id="name" placeholder="Enter name" required class="form-control" value="{{ $location->name }}">
    			    </div>
    			</div>   
    	        <div class="col-md-3">
    	            <div class="form-group"> 
    	                <label class="control-label" for="is_active">Status </label>
    	                <select name='is_active' id="is_active"  class="form-control"  required>
    	                  <option value='1' {{ $location->is_active==1 ? 'selected' : '' }} >Active</option>
    	                  <option value="0" {{ $location->is_active==0 ? 'selected' : '' }} >Inactive</option>
    	                </select>   
    	            </div>
    	        </div>  			  
    		</div>

          <div class="row">
            <div class="col-md-12">
                <div class="form-group"> 
                    <label class="control-label" for="description">Description </label>
                    <textarea name="description" id="description"class="form-control " placeholder="Enter description" rows="2"  >{{ $location->description }}</textarea>
                </div>
            </div>
          </div><!-- /row -->


          <div class="row">
            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="address">Address </label>
                    <input  type="text" name="address" id="address" placeholder="Enter address"  class="form-control" value="{{ $location->address }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="address1">Address 1</label>
                    <input  type="text" name="address1" id="address1" placeholder="Enter address1"  class="form-control" value="{{ $location->address1 }}">
                </div>
            </div>        
          </div><!-- /row -->

          <div class="row">
            <div class="col-md-4">
                <div class="form-group"> 
                    <label class="control-label" for="city">City </label>
                    <input  type="text" name="city" id="city" placeholder="Enter city"  class="form-control" value="{{ $location->city }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group"> 
                    <label class="control-label" for="postal_code">Postal Code </label>
                    <input  type="text" name="postal_code" id="postal_code" placeholder="Enter postal code"  class="form-control" value="{{ $location->postal_code }}">
                </div>
            </div>        
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="country">Country</label>
                      <select name='country' id="country"  class="form-control"  >
                        <option value=>-select-</option>
                        <option value='US' {{ $location->country=='US' ? 'selected' : '' }} >USA</option>
                        <option value="CA" {{ $location->country=='CA' ? 'selected' : '' }} >Canada</option>
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
                        <option value='{{ $state->id }}' {{ $location->state==$state->id  ? 'selected' : '' }}  > {{ $state->name }} </option>
                        @endforeach
                      </select>                      
                </div>
            </div>                 
          </div><!-- /row -->


          <div class="row">  
            <div class="col-md-12">
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="button"  id="geolocation-load" class="btn btn-dark "> <i class="fa fa-search"></i> Find Location </button>
                </span>
                <input  type="text" name="location_name"  id="geolocation-address"  minlength="10" value="{{$location->location_name}}" placeholder="Enter Location Name or full Address (street, city, state, coutnry)" class="form-control " >
              </div>
            </div>

      </div><!--ROW -->



  <!-- GOOGLE MAP -->
  <div class="row">

    <div class="col-md-12">
          <input type="hidden" class="text" name="latitude" id="geolocation-latitude" value="" />
          <input type="hidden" class="text" name="longitude" id="geolocation-longitude" value="" />
          <input type="hidden" class="text" name="geo_country_name" id="geolocation-country" value="" />
          <input type="hidden" class="text" name="geo_country1" id="geolocation-country-code" value="" />
          <input type="hidden" class="text" name="geo_state_name" id="geolocation-state" value="" />
          <input type="hidden" class="text" name="geo_state1" id="geolocation-state-code" value="" />
          <input type="hidden" class="text" name="geo_city" id="geolocation-city" value="" />
          <input type="hidden" class="text" name="geo_zipcode" id="postal_code" value="" />
          <input type="hidden" class="text" name="geo_address" id="geolocation-short-address" value="" />
          <input type="hidden" class="text" name="short_address_country"id="geolocation-short-address-country"  value="" />
             
        <div id="geolocation_box">
          <div id="map_wrap" style="border:solid 1px #ddd; margin-top:20px">
             <div id="geolocation-map" style="width:100%;height:350px;"></div>
           </div>
        </div>

    </div>
  </div><!--ROW -->
  <!-- END GOOGLE MAP -->


	</div>
</div>

</form><!--/ END FORM -->





    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initAutocomplete"
         async defer></script>



@endsection
@section('script')
<script type="text/javascript">


</script>
@endsection