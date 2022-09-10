@extends('layouts.product.main')

@section('content')
@auth
<div class="flex-container mt-5">
    <div class="flex-left" style="max-width: 500px">
        <div class="card card-size" style="width: 450px">
            <div class="card-body">
                @if ($product->image)
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->address }}" class="img-fluid card-img-top img-border">
                </div>
                @endif
                <h1 class="card-title font-titlecard" style="margin-bottom: 3px; margin-top: 10px">{{$product->title}}</h1>
                <p class="card-text font-pricecard">
                    Rp. {{number_format($product->price)}}
                </p>
            </div>
        </div>
    </div>
    <div class="flex-right">
        <h2 class="" style="font-family: Poppins">Payment</h2>
        <form action="{{route('product.transaction.store')}}" method="POST">
            @csrf
            
            <div class="form-group font-ordertitle">
                <label for="address">Shipping Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    placeholder="Shipping Address" value="{{old('address')}}">
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group font-ordertitle">
                <label for="bank_name">Bank Name</label>
                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name"
                    placeholder="Bank Name" value="{{old('bank_name')}}">
                @error('bank_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group font-ordertitle">
                <label for="bank_account_number">Bank Account Number</label>
                <input type="text" class="form-control @error('bank_account_number') is-invalid @enderror" id="bank_account_number" name="bank_account_number"
                    placeholder="Bank Account Number" value="{{old('bank_account_number')}}">
                @error('bank_account_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-order" style="width: 580px;">Check Out</button>
        </form>
    </div>
</div>
@endauth
@endsection