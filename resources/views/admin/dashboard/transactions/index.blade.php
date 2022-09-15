@extends('layouts.admin.dashboard.main')

@section('content')
<div class="font-transactionpage">Transaction</div>
@foreach ($data as $dt)
<div class="row box-border">
    <div class="col-8 p-4">
        <div class="font-transactionname" style="font-weight: 700">{{ $dt->product->title }}</div>
        <div class="font-transactionname" style="font-size: 15px;font-weight: 0">{{ $dt->user->name }}</div>
        <div class="font-transactionbody">{{ $dt->address }}</div>
        <div class="font-transactionbody">{{ $dt->bank_name }} - {{ $dt->bank_account_number }}</div>
        <div class="font-transactionbody">{{  $dt->created_at->format('d M Y')}}</div>
        @if ($dt->status_id == 1)
            <div class="">
                <span class="badge admin-mercstatus1">
                    <p class="text-mercstatus">{{ $dt->status->name }}</p> 
                </span> 
            </div>
        @elseif ($dt->status_id == 2)
        <div class="">
            <span class="badge admin-mercstatus2">
                <p class="text-mercstatus">{{ $dt->status->name }}</p> 
            </span> 
        </div>
        @else
        <div class="">
            <span class="badge admin-mercstatus3">
                <p class="text-mercstatus">{{ $dt->status->name }}</p> 
            </span> 
        </div>
        @endif
    </div>
    <div class="col-4 mt-4">
        <div class="font-transactionprice" style="text-align: right; margin-right: 20px">Rp. {{number_format($dt->price)}}</div>
        <td>
            <a href="{{ route('admin.dashboard.transactions.accepted', $dt->id) }}">
                <span class="btn btn-approve">Accept</span>
            </a>
            <a href="{{ route('admin.dashboard.transactions.rejected', $dt->id) }}">
                <span class="btn btn-reject">Reject</span>
            </a>
        </td>
    </div>
</div>
@endforeach
@endsection