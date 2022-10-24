@extends('layouts.main')

@section('content')
<div class="container-img" style="padding-left: 0px">
    <img src="{{ asset("image/sport.jpg") }}" style="width: 100%;padding: 0px" alt="sport">
    <div class="overthere">
        <img src="{{ asset("image/logoo.png") }}" style='width: 25%;' alt="logo">
    </div>
    <div class="font-hero">Memulai di mana saja dengan kami</div>
    <form action="" method="get">
        <div class="input-group mb-3 searchbar" >
            <input type="search"  class="form-control rounded" placeholder="Search for trainers" name="search" value="{{ request('search') }}" aria-label="Search" aria-describedby="search-addon" />
            <button class="searchicon" style="background-color: transparent;border: none;">
                    <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </form>
</div>
@endsection
@section('contentbody')
<h1 class="mb-5 mt-3">Trainer</h1>
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
                    @else
                        <img src="{{ asset("image/blank-image.png") }}" 
                            class="img-fluid card-img-top img-border" style="width: 100%; height: 200px;object-fit:cover;" alt="" >
                    @endif
                    <h5 class="card-title font-titlecard mt-2">{{$product->title}}</h5>
                    <div class="row">
                        <div class="col-2">
                            @if ($product->merchant->image)
                                <img class="logo-merchant" src="{{ asset('storage/' . $product->merchant->image) }}" alt="">
                            @else
                                <i class="fa-solid fa-circle-user logo-merchant" style="font-size: 22px;margin-left: 20px;margin-top:3px"></i>
                            @endif
                        </div>
                        <div class="col-10" style="padding-left: 1px">
                            <a class="text-dark font-merchantcard " href="{{route('merchant.show',['merchant'=>$product->merchant->name])}}">
                                <strong class="text-capitalize card-merchant" >
                                    {{$product->merchant->name}}
                                </strong>
                            </a>
                        </div>
                    </div>
                    
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
    <p class="text-center fs-4">No trainers found.</p>
    @endif

    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection