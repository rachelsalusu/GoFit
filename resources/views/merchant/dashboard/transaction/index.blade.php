@extends('layouts.dashboard.main')

@section('content')
@foreach ($transaction as $tr)
<div>{{ $tr->bank_name }}</div>
@endforeach
@endsection