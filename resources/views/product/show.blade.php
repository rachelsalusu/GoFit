@extends('layouts.product.main')

@section('content')
<div class="flex-container mt-5">
    <div class="flex-left" style="max-width: 500px">
        <div>
            @if ($product->image)
            <div>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid img-product">
            </div>
            @else
                <img src="{{ asset("image/blank-image.png") }}" class="img-fluid img-product" alt="" >
            @endif
            <div class="btn-merchant">
                <a href="{{route('merchant.show',['merchant'=>$product->merchant->name])}}" style="">
                    @if ($product->merchant->image)
                    <img class="logo-merchantshow" src="{{ asset('storage/' . $product->merchant->image) }}" alt="">
                    @else
                    <i class="fa-solid fa-circle-user logo-merchantshow" style="font-size: 45px;margin-top:7px;color:black"></i>
                    @endif
                    <p class="text-capitalize font-merchantshow">
                       {{$product->merchant->name}}
                    </p>
                </a>
            </div>
            <h4 class="font-titleshow">Product Detail</h4>
            <div class="font-bodyshow">{!! $product->body !!}</div>
            {{-- <a href="/product">Back to products</a> --}}
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