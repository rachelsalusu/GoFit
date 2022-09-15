@extends('layouts.main')

@section('content')

<h2 style="text-align: center; font-family: poppins">My Profile</h2>
<form action="{{route('account.update')}}" method="post">
    @csrf
    <div class="" style="width: 500px; margin-left: auto; margin-right: auto">
        <div class="form-floating mb-3">
            <label class="font-account" for="name">Name</label>
            <input type="text" name="name" class="form-control form-account @error('name') is-invalid @enderror"
                id="name" placeholder="Name" value="{{ $user->name }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <label class="font-account" for="username">Username</label>
            <input type="text" name="username" class="form-control form-account @error('username') is-invalid @enderror"
                id="username" placeholder="Username" value="{{ $user->username }}">
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <p class="font-account2">This will be how your name will be displayed in the account section and in reviews</p>
        </div>
        <div class="form-floating mb-3">
            <label class="font-account" for="email">Email address</label>
            <input type="email" name="email" class="form-control form-account @error('email') is-invalid @enderror"
                id="email" placeholder="name@example.com" value="{{ $user->email }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <label class="font-account" for="password">Password</label>
            <input type="password" name="password" class="form-control form-account @error('password') is-invalid @enderror"
                id="password" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <label class="font-account" for="password">Password Confirmation</label>
            <input type="password" name="password_confirmation"
                class="form-control form-account @error('password_confirmation') is-invalid @enderror" id="password"
                placeholder="Password Confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <button class="w-100 btn btn-account mt-3" type="submit">Update</button>
    </div>
</form>
@endsection