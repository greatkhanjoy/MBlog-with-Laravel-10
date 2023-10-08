@extends('layouts.master')

@section('title', '404 not found')
@section('description', 'Oops! Page Not Found')
@section('keywords', 'sharing, sharing text, text, sharing photo, photo,')

@section('content')

<div class="error-wrap ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="error-content">
                    <img src="{{asset('assets/img/404.webp')}}" alt="404-image">
                    <h2>Oops! Page Not Found</h2>
                    <p>The page you are looking for might have been removed had its name changed or is temporarily
                        unavailable.</p>
                    <a href="{{route('home')}}" class="btn-one">Back To Home<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection