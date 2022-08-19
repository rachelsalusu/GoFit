@extends('layouts.admin.dashboard.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
                @else 
                <td>
                    <span class="badge badge-success">
                        {{ $dt->status->name }}
                    </span>
                </td>
                @endif
                <td>
                    <a href="{{ route('admin.dashboard.merchants.approved', $dt->id) }}">
                        <span class="badge badge-success">Accept</span>
                    </a>
                </td>
                <td>{{ $dt->created_at }}</td>
            </tr>
            @endforeach
    </tbody>
</table>
@endsection