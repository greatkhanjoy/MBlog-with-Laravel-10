@extends('layouts.master')

@section('title', 'Home')
@section('description', 'Laravel Blog')
@section('keywords', 'sharing, sharing text, text, sharing photo, photo,')

@section('content')
    
    @include('components.trending')

    @include('components.featured-section')

    @include('components.ad-section')
    @include('components.editors-pick')
    @include('components.newsletter-section')
    @include('components.social-section')
    {{-- @include('components.3-col-section') --}}
    @include('components.category-posts')
    @include('components.most-popular-posts')
    {{-- @include('components.latest-posts') --}}
@endsection