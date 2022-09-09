@extends('layouts.main')

@section('content')
@auth

<div class="container">
        <div class=" justify-content-left mt-2">
            @if(auth()->user()->merchant)
            
                @if($data->status_id == 1)
                <div class="row" style="">
                    <div class="col-6" style="max-width: 500px">
                        <img class="merchant-status-img " src="{{ asset("image/merchantwait.png") }}" alt="">
                    </div>
                    <div class="col-6 ml-5 font-merchantstatus">
                        <div>
                            <h3 class="mb-4">Merchant Status</h3>
                            <div class="merc-status">
                                <p style="margin-top: 11px">Status : </p> 
                                <span class="badge badge-mercstatus">
                                    <p class="text-mercstatus">{{ $data->status->name }}</p>
                                </span>
                            </div>
                            <div class="merc-statusdesc">
                                 Wait for admin to accepted the request
                            </div>    
                        </div>
                    </div>
                </div>
                @elseif($data->status_id == 2)
                <div class="row" style="">
                    <div class="col-6" style="max-width: 500px">
                        <img class="merchant-status-img " src="{{ asset("image/merchantwait.png") }}" alt="">
                    </div>
                    <div class="col-6 ml-5 font-mercstatus">
                        <div class="row">
                            <div class="col-4">
                                <img class="img-merchantprofile img-fluid" alt="" src="{{ asset('storage/' . $data->image) }}"
                        data-holder-rendered="true">
                            </div>
                            <div class="col-8">
                                <div>{{ $data->name }}</div>
                                <div class="font-merchdesk">{{ $data->deskripsi }}</div>
                                <div class="font-merclink">Go to <a style="color: #2A1A5E;" href="{{ route('merchant.dashboard.index') }}">Merchant's dashboard</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row" style="">
                    <div class="col-6" style="max-width: 500px">
                        <img class="merchant-status-img " src="{{ asset("image/merchantwait.png") }}" alt="">
                    </div>
                    <div class="col-6 ml-5 font-merchantstatus">
                        <div>
                            <h3 class="mb-4">Merchant Status</h3>
                            <div class="merc-status">
                                <p style="margin-top: 11px">Status : </p> 
                                <span class="badge badge-mercstatus3">
                                    <p class="text-mercstatus">{{ $data->status->name }}</p>
                                </span>
                            </div>
                            <div class="merc-statusdesc">
                                We’re sorry your merchant is rejected.
                            </div>    
                        </div>
                    </div>
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