<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta name="csrf-token" content="{{csrf_token()}}" >
	<title>Admin</title>
	<!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
	<meta name="robots" content="noindex">
	<!-- Material Design Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Roboto Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
	<!-- App CSS (includes Bootstrap) -->
	<link type="text/css" href="{{ url('assets/admin/css/app.css') }} " rel="stylesheet">
	<link type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">
	<link type="text/css" href="{{ url('assets/admin/css/dataTables.bootstrap.css') }}" rel="stylesheet">
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
<body class="ls-top-navbar">
	@include('nav.auth')
	<!-- Content -->
	<div class="content-wrapper">
		<div class="container-fluid">

			<!-- Breadcrumb -->
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active"> <a href="{{ url('/'.\Request::segment(1) ) }} ">{{ $title }}</a></li>
			</ol>
			<!-- // END Breadcrumb -->
			<h1>{{ $title }}</h1>
			<!--<p class="lead">Lorem ipsum d</p>-->

			@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


			<div class="card">
				<div class="card-block">

					@yield('content')
				</div>
			</div>
			@include('common.footer')
		</div>
	</div>
	<!-- // END Content -->
	<!-- jQuery -->
	<script src="{{ url('assets/admin/vendor/jquery.min.js') }}"></script>
	<script src="{{ url('assets/admin/vendor/tether.min.js') }}"></script>
	<script src="{{ url('assets/admin/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ url('assets/admin/vendor/adminplus.js') }}"></script>
	<script src="{{ url('assets/admin/js/app.js') }}"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('assets/admin/vendor/dataTable.js') }}"></script>
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
	$(document).ready(function()
	{
		$('.form').submit(function () {
		    $('button[data-loading-text]').button('loading');
		    $('.btn-save').prop('disabled', true);
		    $('.btn-save').text( 'Please wait...');
		});

	    $('.dataTables').DataTable();
	});
</script>	

@yield('script')

</body>
</html>