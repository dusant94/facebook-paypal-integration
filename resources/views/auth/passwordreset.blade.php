@extends('layouts.app')
@section('content')

    <form method="post" class="text-center form-signin" action="{{route('reset.password.update',[$user->id,$code])}}">
        @csrf

  <h1 class="h3 mb-3 font-weight-normal">Enter your new password</h1>

  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <label for="inputPassword" class="sr-only">Password Confirm</label>
  <input type="password" name="password_confirmation" id="inputPassword" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

</form>

@endsection
