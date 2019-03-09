@extends('layouts.app')

@section('content')

@section('content')
<p class="login-box-msg">Sign in to start your session</p>

<form method="post" action="{{ url('/login') }}">
    {!! csrf_field() !!}

    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif

    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="text-center">
              <a class="d-block small mt-3" href="{{ route('register') }}">Register an Account</a><br>
                @if (Route::has('password.request'))
                    <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
                @endif              
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>

@endsection
