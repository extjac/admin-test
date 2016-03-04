
<form name="form" class="form" method="post" action="{{ url('/items/categories') }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit" class="btn btn-primary btn-save btn-rounded"  data-loading-text="Please wait...">Save Changes</button>
 
<hr>   
<div class="row">

    <div class="col-md-4">

    <a href="javascript:;" class="btn-upload-image">
      <img id="main-picture" src="http://fakeimg.pl/850x480/" class="img-responsive img-fluid" alt="">
    </a>
        
    </div>

    <div class="col-md-8">

      <div class="row">
        <div class="col-md-9">
            <div class="form-group"> 
                <label class="control-label" for="name">Name </label>
                <input  type="text" name="name" id="name" placeholder="Enter title" required class="form-control" value="">
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
                <label class="control-label" for="description">Description </label>
                <textarea name="description" id="description"class="form-control " placeholder="Enter description" rows="2"></textarea>
            </div>
        </div>
      </div><!-- /row -->

</div>
</div>





</form><!--/ END FORM -->