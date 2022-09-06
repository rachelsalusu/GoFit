@extends('layouts.dashboard.main')

@section('content')

<form action="{{route('merchant.dashboard.wallet.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <div class="font-withdrawtitle">Wallet (Withdraw)</div>
        <label class="font-withdrawtitle2" for="bank_name">Bank Name</label>
        <input type="text" class="form-control box-withdraw @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name"
            placeholder="" value="{{old('bank_name')}}">
        @error('bank_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        
        <label class="font-withdrawtitle2" for="">Bank Account Number</label>
        <input type="text" class="form-control box-withdraw @error('bank_account_number') is-invalid @enderror" id="bank_account_number" name="bank_account_number"
            placeholder="" value="{{old('bank_account_number')}}">
        @error('bank_account_number')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        
        <label class="font-withdrawtitle2" for="price">Withdraw Amount</label>
        <input type="text" class="form-control box-withdraw @error('price') is-invalid @enderror" id="price" name="price"
            placeholder="Rp." value="{{old('price')}}">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection