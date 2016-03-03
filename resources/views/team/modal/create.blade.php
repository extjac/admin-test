<!-- New Player Modal -->
<!--  modal-fill-in  modal-fill-in FULL SCREEN -->
<div class="modal  fade" id="modal-team-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg ">
<div class="modal-content">
<!-- FORM -->
<form name="form" class="ajax-form-team" method="post" action="{{ url('/teams') }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create Team</h4>
      </div>
       
      <div class="modal-body"> 
      
       <div class="row">
            <div class="col-md-5">
                <div class="form-group"> 
                    <label class="control-label" for="name">Name </label>
                    <input  type="text" name="name" id="name" placeholder="Enter name" required class="form-control ">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group"> 
                    <label class="control-label" for="name">Sport </label>
                      <select name='sport_id' id="sport_id"  class="form-control"  required>
                        <option value=''>-select-</option>
                        <?php $sports = App\Sport::where('is_active', 1)->get() ?>
                        @foreach($sports as $sport)
                        <option value="{{$sport->id}}">{{$sport->name}}</option>
                        @endforeach
                      </select>                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="name">Group </label>
                      
                      <select name='group_id' id="group_id"  class="form-control"  required>
                        <option value=''>-select-</option>
                        <?php $groups = App\TeamGroup::where('is_active', 1)->get() ?>
                        @foreach( $groups as $group )
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                      </select>                    
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group"> 
                    <label class="control-label" for="name">Status </label>
                      <select name='is_active' id="is_active"  class="form-control"  required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>                    
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
