@extends('layouts.app')
@section('content')


<form   class="text-center form-signin" method="post" action="{{route('reset.password.send')}}">
    @csrf

   <h1 class="h3 mb-3 font-weight-normal">Enter your email</h1>
   <label for="inputEmail2" class="sr-only">Email address</label>
   <input type="email" name="email2" id="inputEmail2" class="form-control" placeholder="Email address" required autofocus>

<button class="btn btn-lg btn-primary btn-block" type="submit">Send request</button>
</form>
@endsection
