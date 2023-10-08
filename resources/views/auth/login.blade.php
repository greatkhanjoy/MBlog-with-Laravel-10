@extends('layouts.auth')

@section('content')
<div class="login-form">
    <h3>Welcome Back</h3>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input type="email" name="email" value="{{old('email')}}" placeholder="Email Address">
            <p>@if($errors->has('email'))<p  class="text-danger">{{ $errors->first('email') }}</p>@endif</p>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password">
            <p>@if($errors->has('password'))<p  class="text-danger">{{ $errors->first('password') }}</p>@endif</p>
        </div>
        <div class="row">
            <div class="col-6 text-end">
                <a href="{{route('password.request')}}">Forgot Password?</a>
            </div>
        </div>
        <button type="submit" class="btn-two w-100 d-block">Login</button>
        <p class="login-text">Don't have an account?<a href="{{route('register')}}">Sign Up</a></p>
    </form>
</div>
@endsection
