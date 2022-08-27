@extends('layouts.dashboard.main')

@section('content')

<form action="{{route('merchant.dashboard.wallet.store')}}" method="POST">
    @csrf
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
        
        <label for="">Bank Account Number</label>
        <input type="text" class="form-control @error('bank_account_number') is-invalid @enderror" id="bank_account_number" name="bank_account_number"
            placeholder="bank_account_number" value="{{old('bank_account_number')}}">
        @error('bank_account_number')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        
        <label for="price">Withdraw Amount</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
            placeholder="price" value="{{old('price')}}">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection