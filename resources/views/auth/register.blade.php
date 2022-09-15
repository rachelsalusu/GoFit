@extends('layouts.auth.main')

@section('content')
<div class="d-flex justify-content-center mt-0">
    <img src="{{ asset("image/logo.png") }}" style='width: 10%;' alt="logo">
</div>
<div class="d-flex justify-content-center">
    <div>
        <img src="{{ asset("image/register.png") }}" style="object-fit: contain;width: 100%; height: 100%; " alt="">
    </div> 
    <div class="col-lg-5">

        <main class="form-registration">
            <h1 class=" mb-1 fw- text-center">Register</h1>
            <form action="{{route('auth.userRegister')}}" method="post" class="d-block">
                @csrf
                <div class="mb-3 form-size">
                    <label class="font-auth" for="name">Name</label>
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                            id="name" placeholder="Name" required value="{{ old('name') }}">
                        @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 form-size">
                    <label class="font-auth" for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        id="username" placeholder="Username" required value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 form-size">
                    <label class="font-auth" for="email">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 form-size">
                    <label class="font-auth" for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 form-size">
                    <label class="font-auth" for="password">Password Confirmation</label>
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" id="password"
                        placeholder="Password Confirmation" required>
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 form-size">
                    <label class="font-auth" for="token">Token (Optional)</label>
                    <input type="text" name="token" class="form-control @error('token') is-invalid @enderror"
                        id="token" placeholder="token" value="{{ old('token') }}">
                    @error('token')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-submit font-submit mt-3" type="submit">Register</button>
            </form>
            <div class="d-flex justify-content-center font-auth mt-2 mb-5">
                <small>Already registered? <a href="/login" style="color: #FB9224">Login here</a></small>
            </div>
        </main>
    </div>
</div>

@endsection