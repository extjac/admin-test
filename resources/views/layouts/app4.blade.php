<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>




  <nav class="navbar navbar-dark bg-inverse navbar-full  ">
    <a class="navbar-brand" href="#">Navbar</a>
    <ul class="nav navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
             Store <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/registrations') }}"> Events/Registrations </a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ url('/products/categories') }}"> Categories </a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ url('/orders') }}"> Orders </a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ url('/payments') }}"> Payments </a></li>                       
          </ul>
      </li>      
    </ul>
    <form class="form-inline pull-xs-right">
      <input class="form-control" type="text" placeholder="Search" />
      <button class="btn btn-info-outline" type="submit">Search</button>
    </form>
  </nav>




    <h1>Hello, world!</h1>


    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>