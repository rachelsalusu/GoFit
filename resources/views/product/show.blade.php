@extends('layouts.main')

@section('content')
<h1>{{$product->title}}</h1>
<div>
    Dibuat oleh
    <a href="{{route('product.index',['merchant'=>$product->merchant->name])}}">
        <strong class="text-capitalize text-dark">
            <u>{{$product->merchant->name}}</u>
        </strong>
    </a>
</div>
<div>
    Dibuat pada <strong>{{$product->created_at->format('d M Y')}}</strong>
</div>

@if ($product->image)
<div style="width: 300px">
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid">
</div>
@endif

<div>
    Rp. {{number_format($product->price)}}
</div>
<a href="{{route('product.order',$product)}}">Order Now</a>

<p class="mt-3">{!! $product->body !!}</p>

<a href="/product">Back to products</a>

@endsection