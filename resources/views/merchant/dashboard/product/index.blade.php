@extends('layouts.dashboard.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-end mb-3">
    <a href="{{route('merchant.dashboard.product.create')}}" class="btn btn-success">Create</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="col-3">Title</th>
            <th class="col-3">Price</th>
            <th class="col-3">Updated At</th>
            <th class="col-3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>
                <a href="{{ route('product.show', $product) }}">
                    {{ $product->title }}
                </a>
            </td>
            <td>
                <div>
                    {{ $product->price }}
                </div>
            </td>

            <td>{{ $product->updated_at->format('D M Y') }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{route('merchant.dashboard.product.edit', compact('product'))}}"
                        class="btn btn-primary btn-sm mr-2">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#deleteModal{{$product->id}}">
                        Delete
                    </button>
                    <!-- Modal -->
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
                                    {{-- <button type="button" class="btn btn-danger">Yes</button> --}}
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
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection