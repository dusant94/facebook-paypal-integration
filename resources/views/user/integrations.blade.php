@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('redirect')}}">Authorized from server</a>

</div>
<div id="passport">
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>

@endsection
