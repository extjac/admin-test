<!-- New Player Modal -->
<!-- fade modal-fill-in FULL SCREEN -->
<div class="modal   fade" id="modal-post-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg ">
<div class="modal-content">
<!-- FORM -->
<form name="form" class="ajax-form-post" method="post" action="{{ url('/posts') }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create Post</h4>
      </div>
      
      <div class="modal-body"> 
      

      <div class="row">

        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="title">Title * </label>
                <input  type="text" name="title" id="post_title" placeholder="Enter title" required class="form-control">
            </div>
        </div>
      
      </div>
      
      <div class="row">

        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="title">Type *</label>
                <select name='type_id' id="type_id"  class="form-control"  required>
                  <option value=''>-select-</option>
                  <?php $types = App\PostType::where('is_active', 1)->get() ?>
                  @foreach($types as $type)
                  <option value="{{$type->id}}">{{$type->name}}</option>
                  @endforeach
                </select>   
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="parent_id">Parent * </label>
                <select name='parent_id' id="parent_id"  class="form-control"  required>
                  <option value=''>-select-</option>
                  <?php $posts = App\Post::where('org_id', Auth::user()->org_id )->where('parent_id', 0)->where('type_id', 2)->get() ?>
                  <option value=''>/root</option>
                  @foreach($posts as $post)
                  <option value="{{$post->id}}">{{$post->title}}</option>
                  @endforeach
                </select>     
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="parent_id">Order *</label>
                <input  type="number" name="order" id="order" placeholder="Enter order" required class="form-control" minlength="1" maxlength="2">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="status">Status *</label>
                <select name='status' id="status"  class="form-control"  required>
                  <option value='0'>Draft</option>
                  <option value="1">Published</option>
                  <option value="2">Unpublished</option>
                </select>   
            </div>
        </div>  

      </div><!-- /row -->

               


      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="excerpt">Excerpt </label>
                <textarea name="excerpt" id="excerpt"class="form-control " maxlength="155" placeholder="Enter up to 155 characters" rows="2"  ></textarea>
            </div>
        </div>
      </div><!-- /row -->

      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="excerpt">Content </label>
                <textarea name="content" id="content" class="form-control editor"  ></textarea>
            </div>
        </div>
      </div><!-- /row -->



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
