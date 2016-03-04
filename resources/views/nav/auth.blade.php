<!-- Navbar -->
<nav class="navbar navbar-light bg-white navbar-full navbar-fixed-top left-md-sidebar">
<!-- Navbar toggle 
<button class="navbar-toggler hidden-md-up pull-xs-right" type="button" data-toggle="collapse" data-target="#navbar"><span class="material-icons">menu</span></button>
<!-- Sidebar toggle -->
<button class="navbar-toggler pull-xs-left hidden-md-up first-child-xs" type="button" data-toggle="sidebar" data-target="#sidebar"><span class="material-icons">menu</span></button>
<!-- Brand -->
<span class="navbar-brand first-child-md">{{ $title }}</span>
<!-- Search -->
<form class="form-inline pull-xs-left hidden-sm-down">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search for...">
    <span class="input-group-btn"><button class="btn" type="button"><i class="material-icons">search</i></button></span>
  </div>
</form>
<!-- // END Search -->
<!-- Collapse   
<div class="collapse navbar-toggleable-xs" id="navbar">
	<ul class="nav navbar-nav">
		<li class="nav-item"><a class="nav-link" href="index.html">Fixed</a></li>
		<li class="nav-item active"><a class="nav-link" href="sidebar.html">Sidebar</a></li>
	</ul>
</div>

<!-- // END Collapse -->
  <div class="btn-group">
    <button type="button" class="btn btn-primary-outline dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">settings</i> Actions</button>
    <div class="dropdown-menu">
    	<a class="dropdown-item" href="{{ url('/items/create') }}">Create Event</a>
    	<div class="dropdown-divider"></div>
      	<a class="dropdown-item" href="{{ url('/posts/create') }}">Create Page</a>
      	<a class="dropdown-item" href="{{ url('/news/create') }}">Create News</a>
      	<div class="dropdown-divider"></div>
      	<a class="dropdown-item" href="{{ url('/teams/create') }}">Create Team</a>
      	<a class="dropdown-item" href="{{ url('/players/create') }}">Create Player</a>
      	<a class="dropdown-item" href="{{ url('/users/create') }}">Create Staff</a>
      	<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="{{ url('/locations/create') }}">Create Locations</a>      	
    </div>
  </div>

<!-- Top Menu -->
<ul class="nav navbar-nav pull-xs-right hidden-md-down ">
  <!-- User dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false">
      Me
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
      <a class="dropdown-item" href="{{ url('/users/'.\Auth::user()->token.'/edit') }}"><i class="material-icons md-18">lock</i> <span class="icon-text">Edit Account</span></a>
      <a class="dropdown-item" href="{{ url('logout') }}"><i class="material-icons">exit_to_app</i> Logout</a>
    </div>
  </li>
  <!-- // END User dropdown -->
</ul>
<!-- // END Menu -->		

</nav>
<!-- // END Navbar -->

<!-- Sidebar -->
<div class="sidebar sidebar-left sidebar-dark bg-primary show-desktop" id="sidebar">
<!-- Brand -->
<a href="{{ url('/') }}" class="sidebar-brand">ADMIN</a>
<!-- Menu -->
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ url('/home') }}">
			<i class="material-icons">home</i><span class="icon-text">Home</span>
		</a>
	</li>
	<li class="nav-item  <?php if( \Request::segment(1)=='posts' OR \Request::segment(1)=='news' ) echo 'open' ?> ">
		<a class="nav-link" href="#">
			<i class="material-icons">view_module</i><span class="icon-text">CMS</span>
		</a>
     	<ul>
          <li><a href="{{ url('/posts') }}"><i class="material-icons">keyboard_arrow_right</i> Pages / Menues</a> </li>
          <li><a href="{{ url('/news') }}"><i class="material-icons">keyboard_arrow_right</i> News </a></li>
        </ul>				
	</li>	

	<li class="nav-item <?php if( \Request::segment(1)=='items' OR \Request::segment(1)=='items' ) echo 'open' ?>  ">
		<a class="nav-link" href="#">
			<i class="material-icons">store</i><span class="icon-text">Store</span>
		</a>
     	<ul>     
          <li><a href="{{ url('/items/categories') }}"><i class="material-icons">keyboard_arrow_right</i> Categories </a> </li>
          <li><a href="{{ url('/items') }}"><i class="material-icons">keyboard_arrow_right</i> Registration / Events</a> </li>
          <li><a href="{{ url('/orders') }}"><i class="material-icons">keyboard_arrow_right</i> Orders </a> </li>
          <li><a href="{{ url('/payments') }}"><i class="material-icons">keyboard_arrow_right</i> Payments </a> </li>
        </ul>				
	</li>		

	<li class="nav-item <?php if( \Request::segment(1)=='teams'  ) echo 'open' ?> ">
		<a class="nav-link" href="#">	
			<i class="material-icons">group</i><span class="icon-text">Teams</span>
		</a>
     	<ul>
          <li><a href="{{ url('/teams/categories') }}"> <i class="material-icons">keyboard_arrow_right</i> Categroies </a> </li>
          <li><a href="{{ url('/teams') }}"><i class="material-icons">keyboard_arrow_right</i> Teams </a></li>
        </ul>				
	</li>

	<li class="nav-item <?php if( \Request::segment(1)=='players'  ) echo 'open' ?> ">
		<a class="nav-link" href="#">
			<i class="material-icons">person</i><span class="icon-text">Players</span>
		</a>
     	<ul>
          <li><a href="{{ url('/players') }}"><i class="material-icons">keyboard_arrow_right</i> Players </a></li>
        </ul>				
	</li>

	<li class="nav-item <?php if( \Request::segment(1)=='customers' OR \Request::segment(1)=='users' ) echo 'open' ?> ">
		<a class="nav-link" href="#">
			<i class="material-icons">lock</i><span class="icon-text">Accounts</span>
		</a>
     	<ul>
          <li><a href="{{ url('/customers') }}"><i class="material-icons">keyboard_arrow_right</i> Customers</a> </li>
          <li><a href="{{ url('/users') }}"><i class="material-icons">keyboard_arrow_right</i> Staff</a> </li>
        </ul>				
	</li>
	

	<li class="nav-item <?php if( \Request::segment(1)=='games' ) echo 'open' ?> ">
		<a class="nav-link" href="#">
			<i class="material-icons">bookmark_border</i><span class="icon-text">Schedule</span>
		</a>
     	<ul>
          <li><a href="#"><i class="material-icons">keyboard_arrow_right</i> Games </a></li>
          <li><a href="#"><i class="material-icons">keyboard_arrow_right</i> Torurnament </a></li>
        </ul>				
	</li>		

	<li class="nav-item <?php if( \Request::segment(1)=='locations' ) echo 'open' ?>">
		<a class="nav-link" href="#">
			<i class="material-icons">map</i><span class="icon-text">Locations</span>
		</a>
     	<ul>
          <li><a href="{{ url('/locations') }}"><i class="material-icons">keyboard_arrow_right</i> Locations </a></li>
        </ul>				
	</li>	

  <li class="nav-item <?php if( \Request::segment(1)=='organizations' ) echo 'open' ?>">
    <a class="nav-link" href="#">
      <i class="material-icons">settings</i><span class="icon-text">Settings</span>
    </a>
      <ul>
          <li><a href="{{ url('/organizations') }}"><i class="material-icons">keyboard_arrow_right</i> Organization </a></li>
        </ul>       
  </li> 

</ul>
<!-- // END Menu -->
</div>
<!-- // END Sidebar -->