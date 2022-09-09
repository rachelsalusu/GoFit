@extends('layouts.product.main')

@section('content')
<div class="flex-container mt-5">
    <div class="flex-left" style="max-width: 500px">
        <div>
            @if ($product->image)
            <div>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid img-product">
            </div>
            @endif
            <div class="btn-merchant">
                <a href="{{route('product.index',['merchant'=>$product->merchant->name])}}" style="">
                    <img class="logo-merchantshow" src="{{ asset('storage/' . $product->merchant->image) }}" alt="">
                    <p class="text-capitalize font-merchantshow">
                       {{$product->merchant->name}}
                    </p>
                </a>
            </div>
            <h4 class="font-titleshow">Product Detail</h4>
            <div class="font-bodyshow">{!! $product->body !!}</div>
            <a href="/product">Back to products</a>
        </div>
    </div>
    <div class="flex-right">
 
        <h1 class="font-titleshow">{{$product->title}}</h1>
        <div class="font-priceshow">
            Rp. {{number_format($product->price)}}
        </div>
        
        <a class="font-order" href="{{route('product.order',$product)}}">
            <button class="btn-order">Order Now</button>
        </a>
        
        <div class="font-bodyshow" style="margin-bottom: -10px">Created at:</div>
        <div>
            {{$product->created_at->format('d M Y')}}
        </div>
    </div>

</div>

@endsection