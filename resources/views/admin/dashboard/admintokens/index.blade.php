@extends('layouts.admin.dashboard.main')

@section('content')

<form action="{{ route('admin.dashboard.admintokens.generate') }}" method="POST">
    @csrf
        <button type="submit" class="btn btn-primary">Generate</button>
</form>
        @foreach ($admin_tokens as $admintoken)
        <option value="{{$admintoken->id}}">{{$admintoken->token}}</option>
            <form action="{{ route('admin.dashboard.admintokens.destroy', $admintoken) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endforeach 

@endsection