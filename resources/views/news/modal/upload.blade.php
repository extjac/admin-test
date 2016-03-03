
<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Upload</h4>
        </div>
      
      <form id="formUploadFile" method="POST" enctype="multipart/form-data" action="{{ url('/news/'.$post->id.'/upload') }}">
      <input type="hidden" name="id" value="{{ $post->id }}">

        <div class="modal-body">

          <input type="file"    name="file" id="file"> 
          <input type="hidden"  name="post_id" id="post_id" value="{{ $post->id }}"> 
          <p><span id="spin_upload"></span></p>

          <div class="progress">
              <div class="bar"></div >
              <div class="percent">0%</div >
          </div>

          <div id="uploadStatus"></div>

         </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary"  value="Upload"> 
        </div>

      </form>  

    </div>
  </div>
</div>