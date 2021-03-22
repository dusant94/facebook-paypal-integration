@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center" style="margin-top: 5px">
    {{$products->links()}}

   </div>
<div class="container" style="overflow: auto">
     @foreach ($products as $product)
   <form method="post" action="{{route('add.to.chart',$product->id)}}">
    @csrf
    <div  class="card mb-4 shadow-sm  " style="width: 18% ;float: left;margin: 10px;">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">{{$product->name}}</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">{{$product->price}} <small class="text-muted"> $</small></h1>
        <button type="submit" {{$product->users->contains(Sentinel::getUser()) ? 'disabled' : ''}} class="btn btn-lg btn-block btn-outline-primary"   >Add to Cart</button>
        </div>
    </div>
</form>
    @endforeach

</div>
@endsection
