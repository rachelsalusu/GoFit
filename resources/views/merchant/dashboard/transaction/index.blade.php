@extends('layouts.dashboard.main')

@section('content')
<div class="font-transactionpage">Transaction</div>
@foreach ($transaction as $tr)
<div class="row">
    <div class="col-9">
        <div class="font-transactionname">{{ $tr->user->name }}</div>
        <div class="font-transactionbody">{{ $tr->address }}</div>
        <div class="font-transactionbody">{{ $tr->bank_name }} - {{ $tr->bank_account_number }}</div>
        <div class="font-transactionbody">{{  $tr->created_at->format('d M Y')}}</div>
    </div>
    <div class="col-3">
        <div class="font-transactionprice">Rp. {{number_format($tr->price)}}</div>
        @if ($tr->status_id == 1)
            <div class="col-3 font-orders">
                <span class="badge status-transaction1">
                    <p class="text-mercstatus">{{ $tr->status->name }}</p> 
                </span> 
            </div>
        @elseif ($tr->status_id == 2)
        <div class="col-3 font-orders">
            <span class="badge status-transaction2">
                <p>{{ $tr->status->name }}</p> 
            </span> 
        </div>
        @else
        <div class="col-3 font-orders">
            <span class="badge status-transaction3">
                <p>{{ $tr->status->name }}</p> 
            </span> 
        </div>
        @endif
    </div>
</div>
<hr class="hr-transaction">
@endforeach
@endsection