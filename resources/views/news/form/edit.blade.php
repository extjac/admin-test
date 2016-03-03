
<form name="form" class="form" method="post" action="{{ url('/news/'.$post->token) }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit" class="btn btn-primary btn-save"  data-loading-text="Please wait...">Save Changes</button>
 
<hr>   
<div class="row">

    <div class="col-md-4">

    <a href="javascript:;" class="btn-upload-image">
      <img id="main-picture" src="{{ $post->picture==null ? "http://fakeimg.pl/850x480/" : "http://files.local/photos/posts/$post->id/$post->picture" }}" class="img-responsive img-fluid" alt="">
    </a>
        
    </div>

    <div class="col-md-8">

      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="title">Title * </label>
                <input  type="text" name="title" id="post_title" placeholder="Enter title" required class="form-control" value="{{ $post->title }}">
            </div>
        </div>     
      </div>

      <div class="row">
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="order">Order *</label>
                <input  type="number" name="order" id="order" placeholder="Enter order" required class="form-control" minlength="1" maxlength="2" value="{{ $post->order }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="is_featured">Featured</label>
                <select name='is_featured' id="is_featured"  class="form-control c-select"  required>
                  <option value='0' <?php if( $post->is_featured==0) echo 'selected' ?> >No</option>
                  <option value="1" <?php if( $post->is_featured==1) echo 'selected' ?> >Yes</option>
                </select>   
            </div>
        </div>  
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="is_ticker">Ticker</label>
                <select name='is_ticker' id="is_ticker"  class="form-control  c-select"  required>
                  <option value='0' <?php if( $post->is_ticker==0) echo 'selected' ?> >No</option>
                  <option value="1" <?php if( $post->is_ticker==1) echo 'selected' ?> >Yes</option>
                </select>   
            </div>
        </div>  
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="status">Status *</label>
                <select name='status' id="status" class="form-control c-select"  required>
                  <option value='0' <?php if( $post->status==0) echo 'selected' ?> >Inactive </option>
                  <option value="1" <?php if( $post->status==1) echo 'selected' ?> >Active</option>
                </select>   
            </div>
        </div>  

      </div><!-- /row -->


      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="excerpt">Excerpt </label>
                <textarea name="excerpt" id="excerpt"class="form-control " maxlength="155" placeholder="Enter up to 155 characters" rows="2"  >{{ $post->excerpt }}</textarea>
            </div>
        </div>
      </div><!-- /row -->


</div>
</div>



      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="excerpt">Content </label>
                <textarea name="content" id="content" class="form-control editor"  rows="10" >{{ $post->content }}</textarea>
            </div>
        </div>
      </div><!-- /row -->

</form><!--/ END FORM -->