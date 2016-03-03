<!-- FORM -->

<form name="form" class="ajax-form-player" method="post" action="{{ url('/players/'.$people->id.') }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">


        <button type="submit" class="btn btn-primary"data-loading-text="Please wait...">Save Changes</button>




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
                    <input  type="text" name="last_name" id="last_name" placeholder="Enter last name" required class="form-control ">
                </div>
            </div>  
        </div><!-- /row -->



        <div class="row">
            <div class="col-md-2">
                <div class="form-group">   
                    <label class="control-label" for="month">Birthday</label>
                      <select name='month' class="form-control  "  id="month" >
                        <option value='' >mm</option>
                        <option value=""></option>
                      </select>
                </div>
            </div>  


            <div class="col-md-2">
                <div class="form-group">
                <label class="control-label"  for="day">&nbsp;</label>
                       <select name='day' id="day" class="form-control "   >
                        <option value='' >dd</option>
                        <?php for($i=1;$i<=31;$i++) { ?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php } ?>
                      </select>
                </div>
            </div>  


            <div class="col-md-2">
               <div class="form-group">
                <label for="year">&nbsp;</label>
                      <select name='year' id="year" class="form-control "   >
                        <option value='' >yyyy</option>
                        <?php for($i=1980;$i<=2015;$i++) { ?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php } ?>
                      </select>
                </div>
            </div>  


            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label"  for="gender">Gender</label>
                      <select name='gender' id="gender"  class="form-control  "  required>
                        <option value=''>-select-</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                      </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label"  for="height">Height</label>
                      <input  type="text" name="height" id="height"  placeholder="Enter height"  class="form-control ">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label"  for="weight">Weight </label>
                      <input  type="text" name="weight" id="weight" placeholder="Enter weight"  class="form-control ">
                </div>
            </div>

        </div><!-- end row -->

       <div class="row">
            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="email">Email</label>
                    <input  type="email" name="email" id="email" placeholder="Enter email"  class="form-control ">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label  class="control-label" for="email2">Phone</label>
                    <input  type="text" name="phone" id="phone" placeholder="Enter phone number"  class="form-control ">
                </div>
            </div>  
        </div><!-- /row -->


        <div class="row">
            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="address">Address</label>
                    <input  type="text" name="address" id="address"  placeholder="address"  class="form-control ">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="address1">Address 1</label>
                    <input  type="text" name="address1" id="address1" placeholder="Enter address1" class="form-control ">
                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label  class="control-label" for="city">City</label>
                    <input  type="text" name="city" id="city" placeholder="Enter city"  class="form-control ">
                </div>
            </div>  
            <div class="col-md-2">
                <div class="form-group">
                    <label  class="control-label" for="zip">Zip/Postal Code</label>
                    <input  type="text" name="zip" id="zip" placeholder="Enter zip/postal code"  class="form-control ">
                </div>
            </div>  
         
        
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="first_name">Country </label>
                      <select name="country" class="form-control country" required id="country" >
                      <option value=''>-select-</option>
                      <option value="US">USA</option>
                      <option value="CA">Canada</option>
                      </select>  
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label"  for="state">State/Province</label>
                      <select name="state" id="state" class="form-control state"  required>
                      <option value=''>-state-</option>
                      </select>   
                </div>
          </div>


        </div><!-- /row -->

      


<!--/ New Player Modal -->
</form><!--/ END FORM -->