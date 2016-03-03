<!-- FORM -->
<form name="form" class="form " method="post" action="{{ url('/teams/') }}" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit" class="btn btn-primary btn-save" data-loading-text="Please wait...">Save Changes</button>
<hr>

<div class="row">


    <div class="col-md-2">
      <img src="http://fakeimg.pl/250x250/" class="img-responsive img-fluid" alt="">
    </div>


    <div class="col-md-10">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group"> 
                <label class="control-label" for="name">Name </label>
                <input  type="text" name="name" id="name" placeholder="Enter name" required class="form-control" value="">
            </div>
        </div>   
        <div class="col-md-2">
            <div class="form-group"> 
                <label class="control-label" for="level_id">Sport </label>
                <select name='sport_id' id="sport_id"  class="form-control"  required>
                <?php $sports = App\Sport::where('is_active', 1 )->orderBy('name')->get(); ?>
                  <option value= >-select-</option>
                  @foreach( $sports as $sport )
                  <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                  @endforeach
                </select> 
            </div>
        </div>         
        <div class="col-md-2">
            <div class="form-group"> 
                <label class="control-label" for="level_id">Gender </label>
                <select name='gender' id="gender"  class="form-control"  required>
                  <option value= >-select-</option>
                  <option value="M" > Male</option>
                  <option value="F" > Female</option>
                  <option value="C" > Co-ed </option>
                </select> 
            </div>
        </div> 
        <div class="col-md-2">
            <div class="form-group"> 
                <label class="control-label" for="level_id">Category/Level </label>
                <select name='category_id' id="category_id"  class="form-control"  required>
                  <option value= >-select-</option>
                  <?php $categories = App\TeamCategory::where('org_id', Auth::user()->org_id )->get(); ?>
                  @foreach( $categories as $category )
                  <option value="{{ $category->id }}" >{{ $category->name }}</option>
                  @endforeach
                </select>   
            </div>
        </div>  
    </div><!-- row -->
    <div class="row">
    <div class="col-md-12">
        <div class="form-group"> 
            <label class="control-label" for="bio">Description </label>
            <textarea name="description" id="description"class="form-control " placeholder="Enter description" rows="2"  ></textarea>
        </div>
    </div>
    </div><!-- /row -->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="is_active">Status </label>
                <select name='is_active' id="is_active"  class="form-control"  required>
                  <option value='1'   >Active</option>
                  <option value="0"  >Inactive</option>
                </select>   
            </div>
        </div>  
    </div><!-- row -->
    </div>
</div>

</form><!--/ END FORM -->