
<!-- FORM -->
<form name="form" class="form " method="post" action="{{ url('/teams/categories/'.$category->token) }}" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="PUT">



<button type="submit" class="btn btn-primary btn-save" data-loading-text="Please wait...">Save Changes</button>
<hr>


<div class="row">
    <div class="col-md-2">
      <img src="http://fakeimg.pl/250x250/" class="img-responsive img-fluid" alt="">
    </div>


    <div class="col-md-10">

        <div class="row">
            <div class="col-md-9">
                <div class="form-group"> 
                    <label class="control-label" for="name">Name </label>
                    <input  type="text" name="name" id="name" placeholder="Enter name" required class="form-control" value="{{ $category->name }}">
                </div>
            </div>   
            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="is_active">Status </label>
                    <select name='is_active' id="is_active"  class="form-control"  required>
                      <option value='1'  {{ $category->is_active==1 ? 'selected' : '' }} >Active</option>
                      <option value="0"  {{ $category->is_active==0 ? 'selected' : '' }} >Inactive</option>
                    </select>   
                </div>
            </div>              
        </div><!-- row -->
        <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="bio">Description </label>
                <textarea name="description" id="description"class="form-control " placeholder="Enter description" rows="2"  >{{ $category->description }}</textarea>
            </div>
        </div>
        </div><!-- /row -->

</div>

</form><!--/ END FORM -->