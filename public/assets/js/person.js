var Person = (function () {

  // Create & Update
  var store = function ( e ) 
  {
      e.preventDefault();
      
      var form = $(this);      
      var $btn  = form.find('button[type="submit"]').button('loading');// Please wait... message

      $.ajax({
          url     : form.attr('action'),
          type    : form.find('input[name="_method"]').val() || 'POST' ,
          data    : form.serialize(),
          dataType: 'json',
          success : function( json )
          {
           // window.location = "/checkrequest/"+json.data['id']+"/edit";  
            $('.modal').modal('hide');//hide modal
          },
          error   : function ( jqXhr, textStatus, errorThrown ) 
          {
            alert( jqXhr.responseText );
          }
      }).always(function(){
          $btn.button('reset');
      });
  };

 
  var show = function ( e ) 
  {
      e.preventDefault();

      $.get( api + $(this).data('url'), function( data ) 
      {
         $('#_method').val( 'PUT' );
         $('#id').val( data.id );
         $('#name').val( data.name ); 
         $('#is_visible').val( data.is_visible ); 
         $('#active').val( data.active );
      });        

      $('#modalGroup').modal('show');

  };

  var destroy = function ( e ) 
  {
      e.preventDefault();

      if( confirm('Are you sure?') ) 
      {
        $.post( api + $(this).data("url"), { _method: 'DELETE' } )
          .done(function( data ) {
              table.api().ajax.reload();//reload table
        });          
        return false;
      }
  };
 
  return {

      init: function ()  
      {
        // create & update
        $('.ajax-form-person').on('submit', store ); 
        // show
        $('#table').on('click', '.edit-group-id', show ) ;
        // remove
        $('#table').on('click', '.remove-group-id', destroy ) ;
     }
  }

})();

Person.init();