<!-- New Player Modal -->
<!-- fade modal-fill-in FULL SCREEN -->
<div class="modal   fade" id="modalGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg ">
<div class="modal-content">
<!-- FORM -->
<form name="form" class="ajax-form-group" method="post" action="{{ url('/groups') }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create Group</h4>
      </div>
      
      <div class="modal-body"> 
      
       <div class="row">

            <div class="col-md-6">
                <div class="form-group"> 
                    <label class="control-label" for="name">Name </label>
                    <input  type="text" name="name" id="name" placeholder="Enter name" required class="form-control ">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="name">Type </label>
                      <select name='type_id' id="type_id"  class="form-control"  required>
                        <option value=''>-select-</option>
                        <option value="4">Class</option>
                        <option value="2">Division</option>
                        <option value="1">Group</option>
                        <option value="3">Level</option>
                      </select>                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group"> 
                    <label class="control-label" for="name">Status </label>
                      <select name='is_active' id="is_active"  class="form-control"  required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>                    
                </div>
            </div>

        </div><!-- /row -->

       <div class="row">
            <div class="col-md-12">
                <div class="form-group"> 
                    <label class="control-label" for="Description">Description </label>
                    <textarea  name="description" id="description" placeholder="Enter description" class="form-control" rows="5"></textarea >
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
