@extends('layouts.main')

@section('content')
<div class="container-img">
    <img src="{{ asset("image/heropost.png") }}" style="width: 100%;" alt="heropost">
    <div class="overthere">GUCELL</div>
    <div class="font-hero">GUCC Car Sell</div>
    <form action="" method="get">
        <div class="input-group mb-3 searchbar" >
            <input type="search"  class="form-control rounded" placeholder="Search for cars, and merchant." name="search" value="{{ request('search') }}" aria-label="Search" aria-describedby="search-addon" />
            <button class="searchicon" style="background-color: transparent;border: none;">
                    <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            
        </div>
    </form>
</div>

<h1 class="mb-5 mt-3">Product</h1>
    @if ($products->count())
    <div class="row mt-4">
        @foreach ($products as $product)
        <div class="col-md-4 mb-5">
            <div class="card card-size">
                <div class="card-body">
                    @if ($product->image)
                    <div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                            class="img-fluid card-img-top img-border" style="width: 100%; height: 200px;object-fit:cover;">
                    </div>
                    @endif
                    <h5 class="card-title font-titlecard mt-2">{{$product->title}}</h5>
                    <img class="logo-merchant" src="{{ asset('storage/' . $product->merchant->image) }}" alt="">
                    <a class="text-dark font-merchantcard " href="{{route('merchant.show',['merchant'=>$product->merchant->name])}}">
                        <strong class="text-capitalize card-merchant">
                            {{$product->merchant->name}}
                        </strong>
                    </a>
                    <p class="card-text font-pricecard">
                        Rp. {{number_format($product->price)}}
                    </p>
                    <small class="card-text mt-3 text-muted">{{$product->created_at->diffForHumans() }}</small>
                    <p class="card-text font-excerptcard">{{$product->excerpt}}</p>
                    <a href="{{route('product.show', $product)}}" class="card-link">Read More.</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-center fs-4">No products found.</p>
    @endif

    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection