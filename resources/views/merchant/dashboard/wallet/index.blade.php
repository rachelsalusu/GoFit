@extends('layouts.dashboard.main')

@section('content')
<h3>Wallet</h3>
<div>
    <div class="row wallet-box">
        <div class="col-6">
            <div>Balance</div>
            Rp. {{number_format($merchant->wallet)}}
        </div>
        <div class="col-6">
            <a href="{{route('merchant.dashboard.wallet.create')}}">
                <button type="submit" class="btn btn-primary">Withdraw</button>
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