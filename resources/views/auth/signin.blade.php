@extends('layouts.app')
@section('content')
@if(session('password'))
<div class="alert alert-danger">{{session('password')}}</div>
    @endif
    @if(session('password_changed'))
    <div class="alert alert-danger">{{session('password_changed')}}</div>
        @endif
        @if(session('password_changed_not'))
    <div class="alert alert-danger">{{session('password_changed_not')}}</div>
        @endif
    <form   class="text-center form-signin" method="post" action="{{route('user.signin')}}">
   @csrf
    <div class="form-group">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>

        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
    </div>

    <div class="form-group">
        <a href="{{route('reset.password.email')}}">Forgot your password?</a>
    </div>

<a class="btn btn-block btn-social btn-facebook" href="{{route('login.facebook')}}">
        <span class="fa fa-facebook"></span> Sign in with Facebook
      </a>
    <p class="mt-5 mb-3 text-muted">&copy; 2020-2022</p>
</form>

@endsection
