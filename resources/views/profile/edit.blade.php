@extends('layouts.master')

@section('content')
    <div class="profile-wrap ptb-100">
        <div class="container">
            @include('components.error')
            @include('components.success')
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
            @include('profile.partials.delete-user-form')

        </div>
    </div>
    
@endsection
