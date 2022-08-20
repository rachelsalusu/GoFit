@extends('layouts.main')

@section('content')
<h1 class="mb-5 mt-3">Product</h1>


<form action="" method="get">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

    @if ($products->count())
    <div class="row mt-4">
        @foreach ($products as $product)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    @if ($product->image)
                    <div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                            class="img-fluid card-img-top">
                    </div>
                    @endif
                    <h5 class="card-title">{{$product->title}}</h5>
                    <a class="text-dark" href="{{route('product.index',['user'=>$product->user->username])}}">
                        <strong class="text-capitalize">
                            {{$product->user->name}}
                        </strong>
                    </a>
                    <p class="card-text">
                        Rp. {{number_format($product->price)}}
                    </p>
                    <small class="card-text mt-3 text-muted">{{$product->created_at->diffForHumans() }}</small>
                    <p class="card-text">{{$product->excerpt}}</p>
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