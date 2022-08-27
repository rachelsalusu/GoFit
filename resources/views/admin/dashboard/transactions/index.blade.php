@extends('layouts.admin.dashboard.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaction List</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="col-1">Name</th>
            <th class="col-1">Product</th>
            <th class="col-3">Address</th>
            <th class="col-1">Bank Name</th>
            <th class="col-1">Bank Account Number</th>
            <th class="col-2">Price</th>
            <th class="col-1">Status</th>
            <th class="col-1">Approved</th>
            <th class="col-1">Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->user->name }}</td>
                <td>{{ $dt->product->title }}</td>
                <td>{{ $dt->address }}</td>
                <td>{{ $dt->bank_name }}</td>
                <td>{{ $dt->bank_account_number }}</td>
                <td>Rp. {{number_format($dt->price)}}</td>
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
                    <a href="{{ route('admin.dashboard.transactions.accepted', $dt->id) }}">
                        <span class="badge badge-success">Accept</span>
                    </a>
                    <a href="{{ route('admin.dashboard.transactions.rejected', $dt->id) }}">
                        <span class="badge badge-danger">Reject</span>
                    </a>
                </td>
                <td>{{ $dt->created_at }}</td>
            </tr>
            @endforeach
    </tbody>
</table>
@endsection