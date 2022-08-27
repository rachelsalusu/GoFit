@extends('layouts.main')

@section('content')

<h1>tes</h1>

@if ($product->image)
<div style="width: 300px">
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->address }}" class="img-fluid">
</div>
@endif

<h1>{{$product->title}}</h1>

<p class="card-text">
    Rp. {{number_format($product->price)}}
</p>

<form action="{{route('product.transaction.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
            placeholder="address" value="{{old('address')}}">
        @error('address')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="bank_name">Bank Name</label>
        <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name"
            placeholder="bank_name" value="{{old('bank_name')}}">
        @error('bank_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="bank_account_number">Bank Account Number</label>
        <input type="text" class="form-control @error('bank_account_number') is-invalid @enderror" id="bank_account_number" name="bank_account_number"
            placeholder="bank_account_number" value="{{old('bank_account_number')}}">
        @error('bank_account_number')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-primary">Order</button>
</form>

@endsection