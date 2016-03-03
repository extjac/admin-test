<!-- New Player Modal -->
<!-- fade modal-fill-in FULL SCREEN -->
<div class="modal   fade" id="modal-player-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg ">
<div class="modal-content">
<!-- FORM -->
<form name="form" class="ajax-form-person" method="post" action="{{ url('/players') }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create Player</h4>
      </div>
      
      <div class="modal-body"> 
      
       <div class="row">
            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="first_name">First Name </label>
                    <input  type="text" name="first_name" id="first_name" placeholder="Enter first name" required class="form-control ">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label  class="control-label" for="last_name">Last Name </label>
                    <input  type="text" name="last_name" id="last_name" placeholder="Enter last name" required class="form-control">
                </div>
            </div>  
        </div><!-- /row -->

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">   
                    <label class="control-label" for="month">Birthday</label>
                   
                    <input  type="date" name="birthday" id="birthday" required class="form-control"  data-provide='datepicker' data-date-format='yyyy-mm-dd'>

                </div>
            </div>  

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label"  for="gender">Gender</label>
                      <select name='gender' id="gender"  class="form-control  "  required>
                        <option value=''>-select-</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                      </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label"  for="height">Height</label>
                      <input  type="text" name="height" id="height"  placeholder="Enter height"  class="form-control ">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label"  for="weight">Weight </label>
                      <input  type="text" name="weight" id="weight" placeholder="Enter weight"  class="form-control ">
                </div>
            </div>

        </div><!-- end row -->
  

      <!-- Ajax message response -->    
      <div id="ajax_message" class="ajax_message"></div>
      
      </div>
      <div class="modal-footer" >
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"data-loading-text="Please wait...">Save Changes</button>
      </div>

<!--/ New Player Modal -->
</form><!--/ END FORM -->
</div>
</div>
</div>  
