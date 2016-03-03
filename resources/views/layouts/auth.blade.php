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


</head>


<body class="ls-top-navbar">



	<!-- Content -->
	<div class="content-wrapper">
		<div class="container" style="width: 300px">
			<!--<p class="lead">Lorem ipsum d</p> -->
			<div class="card">
				<div class="card-block">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	<!-- // END Content -->


	<!-- jQuery -->
	<script src="{{ url('assets/admin/vendor/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ url('assets/admin/vendor/tether.min.js') }}"></script>
	<script src="{{ url('assets/admin/vendor/bootstrap.min.js') }}"></script>



	{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}


</script>	
</body>
</html>