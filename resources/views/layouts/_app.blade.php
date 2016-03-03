<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <title>SAMPP</title>
    <!-- Fonts -->
    
    <!--
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href="{{ url('/assets/css/app.css') }}" rel="stylesheet">
    <!--  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" />
    -->
    <!--
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
    <style type="text/css">
    body{
        margin: 0 auto;
        
        font-size: 16px;
    }
    .btn {
         font-size: 16px;
    }
    #page-wrapper {
        width: 100%;
        padding: 0;     
        background-color: #fff;
    }
    .page-header{
        margin-top: 65px;
        padding: 0px;
        border-bottom: 0px
    }
    .page-title{

    }

    .modal-content {
      border: none;
      border-radius: 4px;
      -webkit-box-shadow: 0 2px 12px rgba(0, 0, 0, .2);
              box-shadow: 0 2px 12px rgba(0, 0, 0, .2);
    }
    .modal-header {
      padding: 15px 20px;
      border-bottom: none;
    }
    .modal-header .close {
      margin-top: 1px;
    }
    .modal-body {
      padding: 20px;
    }
    .modal-footer {
      padding: 6px 20px 20px;
      border-top: none;
    }


 

    </style>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
    tinymce.init({
      selector: '.editor',
      plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
      content_css: [
        '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
        '//www.tinymce.com/css/codepen.min.css'
      ]
    });
    </script>

</head>
<body>

    <!-- Nav -->
    @if ( Auth::check() )
        @include('nav.top')
    @else
        @include('nav.guest')
    @endif

    <div class="container">
    @yield('content')
    </div>

    <!-- Footer -->
    @include('common.footer')


<!-- JavaScripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
-->
<script src="{{ url('/assets/js/person.js') }}"></script>
<script src="{{ url('/assets/js/team.js') }}"></script>
<script src="{{ url('/assets/js/teamgroup.js') }}"></script>
<script src="{{ url('/assets/js/post.js') }}"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<script>
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/*
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}); 
*/   
$('.form').submit(function () {
    $('button[data-loading-text]').button('loading');
});

</script>
</body>
</html>
