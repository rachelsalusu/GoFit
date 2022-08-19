@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">

        <main class="form-registration">
            <h1 class="h3 mb-3 fw- text-center">Register</h1>
            <form action="{{route('merchant.merchantRegister')}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                        id="name" placeholder="Name" required value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="deskripsi">deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                        id="deskripsi" placeholder="deskripsi" required value="{{ old('deskripsi') }}">
                    @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
        </main>
    </div>
</div>

@endsection