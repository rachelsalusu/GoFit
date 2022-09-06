@extends('layouts.dashboard.main')

@section('content')
<h3>Wallet</h3>
<div>
    <div class="row wallet-box">
        <div class="col-8 ">
            <div class="font-walletbalance">Balance</div>
            <p class="font-walletprice">Rp. {{number_format($merchant->wallet)}}</p> 
        </div>
        <div class="col-4">
            <div class="font-walletmywallet">My wallet</div>
            <a href="{{route('merchant.dashboard.wallet.create')}}">
                <button type="submit" class="btn btn-walletwithdraw"><p class="font-walletwithdraw">Withdraw</p></button>
            </a>        
        </div>
    </div>    
</div>

<table>
    <thead>
        <th class="col-3">Date</th>
        <th class="col-3">Bank</th>
        <th class="col-3">Account Number</th>
        <th class="col-3">Withdraw Amount</th>
    </thead>
    <tbody>
        @foreach ($transfers as $transfer)
        <tr>
            <td>{{ $transfer->created_at->format('d M Y') }}</td>
            <td>{{ $transfer->bank_name }}</td>
            <td>{{ $transfer->bank_account_number }}</td>
            <td>Rp. {{ number_format($transfer->price) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@endsection