@extends('layouts.main')

@section('content')
@auth

<div class="container">
        <div class=" justify-content-left mt-2">
            @if(auth()->user()->merchant)
            
                @if($data->status_id == 1)
                <div class="row" style="max-width: 500px">
                    <div class="col">
                            <img src="{{ asset("image/merchantwait.png") }}" alt="">
                    
                        <div>
                            Merchant Status :
                            <span class="badge badge-warning">
                                {{ $data->status->name }}
                            </span>
                        </div>
                            <div>
                                Wait for admin to accepted the request
                            </div>
                    </div>
                    
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
            <div class="row">
                <div class="col-6" style="max-width: 500px">
                    <img class="merchant-status-img " src="{{ asset("image/merchantsorry.png") }}" alt="">
                </div>
                <div class="col-6 font-merchantstatus" style="">
                    <div>

                        <p>Haven’t register as a merchant? <br></p>
                        <a class="merc-regis" href="{{ route('merchant.register') }}" >Register Here</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endauth
@endsection