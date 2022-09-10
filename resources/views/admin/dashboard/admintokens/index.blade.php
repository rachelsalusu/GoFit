@extends('layouts.admin.dashboard.main')

@section('content')

<form action="{{ route('admin.dashboard.admintokens.generate') }}" method="POST">
    @csrf
        <button type="submit" class="btn btn-admingenerate mt-5">Generate Token</button>
</form>
        @foreach ($admin_tokens as $admintoken)
        <div class="row">
            <div class="col-7 mt-4" style="font-family: poppins; font-size: 18px">
                <option value="{{$admintoken->id}}">
                    {{$admintoken->token}}
                </option>
            </div>
            <div class="col-5">
                <form action="{{ route('admin.dashboard.admintokens.destroy', $admintoken) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-admindelete mt-3">Delete</button>
                </form>
            </div>
        </div>
        @endforeach 

@endsection