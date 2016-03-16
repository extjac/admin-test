
<form name="form" class="form" method="post" action="{{ url('/items') }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit" class="btn btn-primary btn-save btn-rounded"  data-loading-text="Please wait...">Save Changes</button>
 
<hr>   
<div class="row">
<!--
    <div class="col-md-4">

    <a href="javascript:;" class="btn-upload-image">
      <img id="main-picture" src="http://fakeimg.pl/850x480/" class="img-responsive img-fluid" alt="">
    </a>
        
    </div>
-->
    <div class="col-md-12">

      <div class="row">
        <div class="col-md-6">
            <div class="form-group"> 
                <label class="control-label" for="name">Name </label>
                <input  type="text" name="name" id="name" placeholder="Enter title" required class="form-control" value="">
            </div>
        </div>     
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="is_featured">Currency</label>
                <select name='currency' id="currency"  class="form-control c-select"  required>
                  <option value='' >-select-</option>
                  <option value='USD' >USD</option>
                  <option value="CAD" >CAD</option>
                </select>   
            </div>
        </div>          
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="order">Price</label>
                <input  type="text" name="price" id="price" placeholder="Enter price" required class="form-control" minlength="1" >
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="start_date_time">Start Date</label>
                <input  type="date" name="start_date_time" id="start_date_time" placeholder="Enter start date"  class="form-control" minlength="1" >
            </div>
        </div>  
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="start_date_time">End Date</label>
                <input  type="date" name="end_date_time" id="end_date_time" placeholder="Enter start date"  class="form-control" minlength="1" >
            </div>
        </div>     
   
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="status">Status *</label>
                <select name='status' id="status" class="form-control c-select"  required>
                  <option value='0'  >Inactive </option>
                  <option value="1"  >Active</option>
                </select>   
            </div>
        </div>  
      </div><!-- /row -->


      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="excerpt">Excerpt </label>
                <textarea name="excerpt" id="excerpt"class="form-control " maxlength="155" placeholder="Enter up to 155 characters" rows="2"></textarea>
            </div>
        </div>
      </div><!-- /row -->


</div>
</div>



      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="description">description </label>
                <textarea name="description" id="description" class="form-control editor"  rows="10" ></textarea>
            </div>
        </div>
      </div><!-- /row -->

</form><!--/ END FORM -->