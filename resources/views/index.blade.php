@extends('layouts.main')

@section('content')

@if ($products->count())
<div class="container">
    <div class="row mt-4">
        @foreach ($products as $product)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    @if ($product->image)
                    <div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid">
                    </div>
                    @endif
                    <h5 class="card-title">{{$product->title}}</h5>
                    <small class="card-text pb-2">Dibuat oleh
                        <a class="text-dark" href="{{route('product.index',['merchant'=>$product->merchant->name])}}">
                            <strong class="text-capitalize">
                                {{$product->merchant->name}}
                            </strong>
                        </a>
                    </small>
                    <p class="card-text">
                        Rp. {{number_format($product->price)}}
                    </p>
                    <p class="card-text mb-1">{{$product->excerpt}}</p>
                    <a href="{{route('product.show', $product)}}" class="card-link">Read More</a>
                    <div class="mt-2">
                        <small class="card-subtitle text-muted">{{$product->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-center fs-4">No post found.</p>
@endif

@endsection