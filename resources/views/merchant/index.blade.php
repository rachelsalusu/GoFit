@extends('layouts.main')

@section('content')
@auth
<h1>tesssssssss</h1>
<div class="container">

    <div class=" justify-content-left mt-2">
        @if(auth()->user()->merchant)
        
            @if($data->status_id == 1)
            <div>
                Merchant Status :
                <span class="badge badge-warning">
                    {{ $data->status->name }}
                </span>
            </div>
                <div>
                    Wait for admin to accepted the request
                </div>
            @elseif($data->status_id == 2)
            <div class="mb-4">
                Merchant Status :
                <span class="badge badge-success">
                    {{ $data->status->name }}
                </span>
            </div>
                <div class="col-md-6 mb-4" style="width: 10%;">
                    <img class="rounded-circle z-depth-2 img-fluid" alt="" src="{{ asset('storage/' . $data->image) }}"
                    data-holder-rendered="true">
                </div>
                <div>
                    <strong>Description</strong> <br>
                    {{ $data->deskripsi }}
                </div>                            
                <div>
                    <a href="{{ route('merchant.dashboard.index') }}">Dashboard</a>
                </div>
            @else
            <div>
                Merchant Status :
                <span class="badge badge-danger">
                    {{ $data->status->name }}
                </span>
            </div>
            @endif
        
        @else
        <small>Not registered? <a href="{{ route('merchant.register') }}">Register Here</a></small>
        @endif
    </div>
</div>
@endauth
@endsection