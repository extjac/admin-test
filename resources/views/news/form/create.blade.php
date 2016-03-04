
<form name="form" class="form" method="post" action="{{ url('/news') }}" autocomplete="off">
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
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="title">Title * </label>
                <input  type="text" name="title" id="post_title" placeholder="Enter title" required class="form-control" value="">
            </div>
        </div>     
      </div>

      <div class="row">
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="order">Order *</label>
                <input  type="number" name="order" id="order" placeholder="Enter order" required class="form-control" minlength="1" maxlength="2" value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="is_featured">Featured</label>
                <select name='is_featured' id="is_featured"  class="form-control c-select"  required>
                  <option value='0'   >No</option>
                  <option value="1"  >Yes</option>
                </select>   
            </div>
        </div>  
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="is_ticker">Ticker</label>
                <select name='is_ticker' id="is_ticker"  class="form-control  c-select"  required>
                  <option value='0'  >No</option>
                  <option value="1"  >Yes</option>
                </select>   
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
                <label class="control-label" for="excerpt">Content </label>
                <textarea name="content" id="content" class="form-control editor"  rows="10" ></textarea>
            </div>
        </div>
      </div><!-- /row -->

</form><!--/ END FORM -->