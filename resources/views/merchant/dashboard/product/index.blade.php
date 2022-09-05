@extends('layouts.dashboard.main')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-end mb-3">
    <a href="{{route('merchant.dashboard.product.create')}}" class="btn btn-createproduct">Add Product</a>
</div>
<form action="" method="get">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

@foreach ($products as $product)
<div class="border-product mb-3">
    <div class="row">
        <div class="col-4">
            <img class="product-img" src="{{ asset('storage/' . $product->image) }}" alt="" >
        </div>
        <div class="col-8">
            <div class="font-titleproduct">{{ $product->title }}</div>
            <div class="font-priceproduct">Rp. {{ number_format($product->price) }}</div>
            <hr class="hr-product">
            <a href="{{route('merchant.dashboard.product.edit', compact('product'))}}"
                        class="btn btn-updateproduct ">Edit</a>
            <button type="button" class="btn btn-deleteproduct" data-bs-toggle="modal"
                        data-bs-target="#deleteModal{{$product->id}}">
                        Delete
            </button>
            {{-- Modal Delete --}}
            <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1"
                aria-labelledby="deleteModal{{$product->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalTitle{{$product->id}}">Delete product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            Are You Sure want to delete product with title <strong>{{ $product->title }}</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            
                            <form action="{{route('merchant.dashboard.product.destroy', compact('product'))}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach
    <div class="mt-3">
        {{ $products->links() }}
    </div>

@endsection