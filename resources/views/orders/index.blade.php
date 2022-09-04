@extends('layouts.main')

@section('content')
@auth
<h3 class="title-order mb-4" style="text-align: center; margin-top: 80px">Order History</h3>
<div style="margin-bottom: 300px">
    @if ($transaction->count())
        @foreach ($transaction as $tr)
        <div class="row">
            <div class="col-3 font-orders">{{ $tr->product->title }}</div>
            <div class="col-3 font-orders">{{ $tr->created_at->format('d-m-Y') }}</div>
            @if ($tr->status_id == 1)
            <div class="col-3 font-orders">
                <span class="badge status-order1">
                    <p class="text-mercstatus">{{ $tr->status->name }}</p> 
                </span> 
            </div>
            @elseif ($tr->status_id == 2)
            <div class="col-3 font-orders">
                <span class="badge status-order2">
                    <p>{{ $tr->status->name }}</p> 
                </span> 
            </div>
            @else
            <div class="col-3 font-orders">
                <span class="badge status-order3">
                    <p>{{ $tr->status->name }}</p> 
                </span> 
            </div>
            @endif
            <div class="col-3 font-orders">Rp. {{number_format($tr->price)}}</div>
        </div>
        @endforeach
    @else
    <div style="text-align: center">No orders has been made.</div>
    @endif
</div>

@endauth

@endsection