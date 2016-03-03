@extends('layouts.app')
@section('content')

@include('common.breadcrumb')

@include('item.form.edit') 



@endsection
@section('script')
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>

(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var status = $('#uploadStatus');
   
$('#formUploadFile').ajaxForm({

    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function( data ) {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
        //filesTable.api().ajax.reload();
        //$('#main-picture').html('<img id="main-picture" src="'+data+'" class="img-responsive img-fluid" alt="">');
        //$('#main-picture').attr('scr', data);
        //$("#main-picture").removeAttr("src").attr("src", data);
        location.reload();
        $('#uploadModal').modal('hide');
    },

  complete: function(xhr) {
    //status.html(xhr.responseText);
  }
}); 

})();       
 

$(".btn-upload-image").click(function()
{ 
  $('#uploadModal').modal('show');
})

</script>
@endsection