@extends('layouts.dashboard.main')

@section('content')
<a href="{{route('merchant.dashboard.wallet.create')}}">
    <button type="submit" class="btn btn-primary">Create</button>
</a>

    Rp. {{number_format($merchant->wallet)}}

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