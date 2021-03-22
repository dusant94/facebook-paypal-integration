@extends('layouts.app')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">





    </head>
    <body>
        @if ($message = Session::get('success'))
            <div class="w3-panel w3-green w3-display-container">
                <span onclick="this.parentElement.style.display='none'"
                        class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                <p>{!! $message !!}</p>
            </div>
            <?php Session::forget('success');?>
            @endif

            @if ($message = Session::get('error'))
            <div class="w3-panel w3-red w3-display-container">
                <span onclick="this.parentElement.style.display='none'"
                        class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                <p>{!! $message !!}</p>
            </div>
            <?php Session::forget('error');?>
            @endif
        <div class="box">
            <form   method="post" id="payment-form"
              action="{{route('paypal',Sentinel::getUser()->id)}}">
              @csrf

              <button class="w3-btn  " style="margin:10px;color: blue;background-color: #ffcc00;border-radius: 12px;width: 200px">Pay with PayPal</button>
            </form>

        </div>
        {{-- <div class="container" style="overflow: auto">
            <div class="container text-center">
                @foreach ($products as $product)
               <form method="post" action="{{route('delete.from.chart',$product->id)}}">
                @csrf
                <div  class="card mb-4 shadow-sm  " style="width: 18% ;float: left;margin: 10px;">

                    <div class="card-header">
                      <h4 class="my-0 font-weight-normal">{{$product->name}}</h4>
                    </div>
                    <div class="card-body">
                      <h1 class="card-title pricing-card-title">{{$product->price}} <small class="text-muted">  $</small></h1>

                    <button type="submit" class="btn btn-lg btn-block btn-outline-primary"   >Delete from chart</button>
                    </div>

                </div>
            </form>
                @endforeach
            </div>
            </div> --}}

<div class="container" style="overflow: auto" id="app">

<orderr :id="{{Sentinel::getUser()->id}}" :token ="{{ json_encode($user->api_token)}}"
    ></orderr>
    {{-- <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens> --}}
</div>

<div class="container"  style="margin-top: 10%" id="paypalbutton">
    <paypal></paypal>
</div>
    </html>
@endsection
