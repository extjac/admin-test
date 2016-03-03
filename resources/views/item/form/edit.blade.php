
<form name="form" class="form" method="post" action="{{ url('/items/'.$item->token) }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit" class="btn btn-primary btn-save"  data-loading-text="Please wait...">Save Changes</button>
 
<hr>   
<div class="row">

    <div class="col-md-4">

    <a href="javascript:;" class="btn-upload-image">
      <img id="main-picture" src="{{ $item->picture==null ? "http://fakeimg.pl/850x480/" : "http://files.local/photos/items/$item->id/$item->picture" }}" class="img-responsive img-fluid" alt="">
    </a>
        
    </div>

    <div class="col-md-8">

      <div class="row">
        <div class="col-md-6">
            <div class="form-group"> 
                <label class="control-label" for="name">Name </label>
                <input  type="text" name="name" id="name" placeholder="Enter title" required class="form-control" value="{{ $item->name }}">
            </div>
        </div>     
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="is_featured">Currency</label>
                <select name='currency' id="currency"  class="form-control c-select"  required>
                  <option value='' >-select-</option>
                  <option value='USD' <?php if( $item->currency=='USD') echo 'selected' ?>  >USD</option>
                  <option value="CAD" <?php if( $item->currency=='CAD') echo 'selected' ?>>CAD</option>
                </select>   
            </div>
        </div>          
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="order">Price</label>
                <input  type="text" name="price" id="price" placeholder="Enter price" required class="form-control" minlength="1" value="{{ $item->price }}">
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="status">Status *</label>
                <select name='is_active' id="is_active" class="form-control c-select"  required>
                  <option value='0' <?php if( $item->is_active==0) echo 'selected' ?> >Inactive </option>
                  <option value="1" <?php if( $item->is_active==1) echo 'selected' ?> >Active</option>
                </select>   
            </div>
        </div>  

      </div><!-- /row -->


      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="excerpt">Excerpt </label>
                <textarea name="excerpt" id="excerpt"class="form-control " maxlength="155" placeholder="Enter up to 155 characters" rows="2"  >{{ $item->excerpt }}</textarea>
            </div>
        </div>
      </div><!-- /row -->


</div>
</div>



      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="description">description </label>
                <textarea name="description" id="description" class="form-control editor"  rows="10" >{{ $item->description }}</textarea>
            </div>
        </div>
      </div><!-- /row -->

</form><!--/ END FORM -->