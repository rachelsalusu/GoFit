@extends('layouts.main')

@section('content')
@auth
<h1>tesssssssss</h1>
<div class="container">

    <div class="d-flex justify-content-left mt-2">
        @if(auth()->user()->merchant)
        <div> Merchant Status : 
            @if($data->status_id == 1)
                <span class="badge badge-warning">
                    {{ $data->status->name }}
                </span>
                <div>
                    Wait for admin to accepted the request
                </div>
            @elseif($data->status_id == 2)
                <span class="badge badge-success">
                    {{ $data->status->name }}
                </span>
                <div>
                    <a href="{{ route('merchant.dashboard.index') }}">Dashboard</a>
                </div>
            @else
                <span class="badge badge-danger">
                    {{ $data->status->name }}
                </span>
            @endif
        </div>
        @else
        <small>Not registered? <a href="{{ route('merchant.register') }}">Register Here</a></small>
        @endif
    </div>
</div>
@endauth
@endsection