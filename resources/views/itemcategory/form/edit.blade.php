
<form name="form" class="form" method="post" action="{{ url('/items/categories/'.$category->token) }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit" class="btn btn-primary btn-save"  data-loading-text="Please wait...">Save Changes</button>
 
<hr>   
<div class="row">

    <div class="col-md-4">

    <a href="javascript:;" class="btn-upload-image">
      <img id="main-picture" src="{{ $category->picture==null ? "http://fakeimg.pl/850x480/" : "http://files.local/photos/items/$category->id/$category->picture" }}" class="img-responsive img-fluid" alt="">
    </a>
        
    </div>

    <div class="col-md-8">

      <div class="row">
        <div class="col-md-9">
            <div class="form-group"> 
                <label class="control-label" for="name">Name </label>
                <input  type="text" name="name" id="name" placeholder="Enter title" required class="form-control" value="{{ $category->name }}">
            </div>
        </div>     
    
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="status">Status </label>
                <select name='is_active' id="is_active" class="form-control c-select"  required>
                  <option value='0' <?php if( $category->is_active==0) echo 'selected' ?> >Inactive </option>
                  <option value="1" <?php if( $category->is_active==1) echo 'selected' ?> >Active</option>
                </select>   
            </div>
        </div>  
      </div><!-- /row -->
      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="description">Description </label>
                <textarea name="description" id="description"class="form-control " placeholder="Enter description" rows="2">{{ $category->description }}</textarea>
            </div>
        </div>
      </div><!-- /row -->

</div>
</div>






</form><!--/ END FORM -->