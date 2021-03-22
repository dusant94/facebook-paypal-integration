@extends('layouts.app')
@section('content')

<h1>User Profile of: {{$user->first_name}} {{ $user->last_name}}</h1>
<div class="row" style="margin-left: 5px">

<div class="col-sm-6">
    <div class="card " style="float: right ">
        <form method="post"  action="{{route('refresh.token')}}">
            @csrf
            <button   class="btn btn-secondary" >Refresh Token</button>
            </form>
    </div>

<form   method="post" action="{{route('user.edit',$user->id)}}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-4">
    @if(Sentinel::getUser()->avatar)
    <img class="img-profile rounded-circle" style="max-width:50%; height:200px" src="{{route('profile.picture')}} ">
    @else
    <img class="img-profile rounded-circle" style="max-width:50%; height:200px" src="{{url('/images/blank-profile-picture-973460_640.png')}}">
@endif
</div>
<div class="form group">
    <input type="file" name="avatar" >
</div>
<div class="form-group">
    <label for="first_name">First Name</label>
<input type="text"
 name="first_name"
  class="form-control  "
   id="first_name"
   value="@if($user->first_name){{$user->first_name}}
   @endif">



</div>
<div class="form-group">
<label for="last_name">Last Name</label>
<input type="text"
name="last_name"
class="form-control  "
id="last_name"
value="@if($user->last_name){{$user->last_name}}
@endif ">



</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text"
name="email"
class="form-control"
id="email"
value="@if($user->email){{$user->email}}
@endif" >



</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password"
name="password"
class="form-control"
id="password"

>



</div>
<div class="form-group">
<label for="new-password">New Password</label>
<input type="password"
name="new_password"
class="form-control"
id="new_password"
>



</div>
<div class="form-group">
    <label for="password-confirmation">New Password Confirm</label>
    <input type="password"
    name="password_confirmation"
    class="form-control"
    id="password_confirmation"
    >



    </div>


<button type="submit" class="btn btn-primary">Submit</button>

</form>



</div>
</div>



@endsection
