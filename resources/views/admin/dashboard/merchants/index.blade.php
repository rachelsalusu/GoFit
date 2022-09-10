@extends('layouts.admin.dashboard.main')

@section('content')
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Merchants</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="col-3">Name</th>
            <th class="col-3">Status</th>
            <th class="col-3">Approved</th>
            <th class="col-3">Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->name }}</td>
                @if($dt->status_id == 1)
                <td>
                    <span class="badge badge-warning">
                        {{ $dt->status->name }}
                    </span>
                </td>
                @elseif ($dt->status_id == 2)
                <td>
                    <span class="badge badge-success">
                        {{ $dt->status->name }}
                    </span>
                </td>
                @else
                <td>
                    <span class="badge badge-danger">
                        {{ $dt->status->name }}
                    </span>
                </td>
                @endif
                <td>
                    <a href="{{ route('admin.dashboard.merchants.accepted', $dt->id) }}">
                        <span class="badge badge-success">Accept</span>
                    </a>
                    <a href="{{ route('admin.dashboard.merchants.rejected', $dt->id) }}">
                        <span class="badge badge-danger">Reject</span>
                    </a>
                </td>
                <td>{{ $dt->created_at }}</td>
            </tr>
            @endforeach
    </tbody>
</table> --}}
<div class="row mt-5">
    <div class="col-3 title-admmerc">
        Name
    </div>
    <div class="col-3 title-admmerc">
        Status
    </div>
    <div class="col-4 title-admmerc">
        Approve
    </div>
    <div class="col-2 title-admmerc">
        Created at
    </div>
</div>

@foreach ($data as $dt)
<div class="row mt-3">
    <div class="col-3" style="font-family: poppins; font-size: 18px">
        {{ $dt->name }}
    </div>
    <div class="col-3">
        @if($dt->status_id == 1)
            <span class="badge admin-mercstatus1">
                <p class="mt-2">{{ $dt->status->name }}</p>
            </span>
        @elseif ($dt->status_id == 2)
            <span class="badge admin-mercstatus2">
                <p class="mt-2">{{ $dt->status->name }}</p>
            </span>
        @else
            <span class="badge admin-mercstatus3">
                <p class="mt-2">{{ $dt->status->name }}</p>
            </span>
        @endif
    </div>
    <div class="col-4">
        <a style="text-decoration: none" href="{{ route('admin.dashboard.merchants.accepted', $dt->id) }}">
            <span class="btn btn-approve" style="">Accept</span>
        </a>
        <a href="{{ route('admin.dashboard.merchants.rejected', $dt->id) }}">
            <span class="btn btn-reject" style="">Reject</span>
        </a>
    </div>
    <div class="col-2" style="font-family: poppins; font-size: 18px">
        {{ $dt->created_at->format('d-M-Y') }}
    </div>
</div>
@endforeach
@endsection