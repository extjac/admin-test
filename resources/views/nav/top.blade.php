<nav class="navbar navbar-fixed-top navbar-inverse">
<div class="container">
    <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            SMAPP
        </a>
    </div>
    <div class="collapse navbar-collapse" id="app-navbar-collapse">

        @if( Auth::check() )

        <ul class="nav navbar-nav">
            <li><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   Teams <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/categories') }}"> Categories/Levels </a></li>
                    <li><a href="{{ url('/teams') }}"> Teams </a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('/players') }}"> Players </a></li>
                </ul>
            </li> 
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   Accounts <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/users') }}"> Staff </a></li>
                </ul>
            </li> 
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   Store <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/events') }}"> Events/Registrations </a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('/products/categories') }}"> Categories </a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('/orders') }}"> Orders </a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('/payments') }}"> Payments </a></li>                       
                </ul>
            </li>
            <!--
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   Schedule <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/schedules') }}"> Games </a></li>
                </ul>
            </li>  
            -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   CMS <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/posts') }}"> Pages & Menus </a></li>
                    <li><a href="{{ url('/posts') }}"> News </a></li>
                    <!--
                    <li><a href="{{ url('/portal/videos') }}"> Videos </a></li>
                    <li><a href="{{ url('/portal/gallery') }}"> Gallery </a></li>
                    <li><a href="{{ url('/portal/documents') }}"> Documents </a></li>
                    -->
                </ul>
            </li>                             
            <li><a href="{{ url('/locations') }}"> Sport Centers </a></li>
            <!--
            <li><a href="{{ url('/home') }}"> Statistics </a></li>
            <li><a href="{{ url('/home') }}"> Reports </a></li>           
            <li><a href="{{ url('/settings') }}"> Settings </a></li>
            -->
        </ul>  
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   Hi {{ Auth::user()->first_name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/users/me') }}"><i class="fa fa-btn"></i>Account</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
        </ul>

        @endif

    </div>
</div>
</nav>
