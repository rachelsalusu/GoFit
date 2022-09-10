@extends('layouts.dashboard.main')

@section('content')

<h2 class="mt-3 ml-4" style="font-family: poppins;">Wallet</h2>
<div>
    <div class="row wallet-box mb-3">
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
        <th class="col-3" style="text-align: center">Date</th>
        <th class="col-3" style="text-align: center">Bank</th>
        <th class="col-3" style="text-align: center">Account Number</th>
        <th class="col-3" style="text-align: center">Withdraw Amount</th>
    </thead>
    <tbody>
        @foreach ($transfers as $transfer)
        <tr>
            <td style="text-align: center">{{ $transfer->created_at->format('d M Y') }}</td>
            <td style="text-align: center">{{ $transfer->bank_name }}</td>
            <td style="text-align: center">{{ $transfer->bank_account_number }}</td>
            <td style="text-align: center">Rp. {{ number_format($transfer->price) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@endsection