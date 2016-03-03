@extends('layouts.auth')


@section('content')
  <!-- Page -->
  <div class="page animsition vertical-align text-center">
    <div class="page-content vertical-align-middle">
      <div class="brand">
        
        <h2 class="brand-text">SMAPP</h2>
      </div>
      <p>Sign-in</p>


@if (count($errors) > 0)
    <div class="alert alert-danger">

        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

    </div>
@endif

       <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}



            <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="">
            </div>

            <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
            </div>

            <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i> Login 
                    </button>
            </div>
        </form>



    </div>
  </div>
  <!-- End Page -->


@endsection
