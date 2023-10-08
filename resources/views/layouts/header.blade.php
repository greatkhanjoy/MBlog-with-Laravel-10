<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/uicons-regular-rounded.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon_baxo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper.bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

    
    <title>@yield('title') - {{config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  </head>
  <body>
    <div class="loader-wrapper">
      <div class="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <div class="switch-theme-mode">
      <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
      </label>
    </div>
    <div class="navbar-area header-three" id="navbar">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" style="width: 140px; height:auto" href="{{route('home')}}">
            <img class="logo-light" src="{{asset('assets/img/logo.png')}}" alt="logo">
            <img class="logo-dark" src="{{asset('assets/img/logo-white.png')}}" alt="logo">
          </a>
          <button type="button" class="search-btn d-lg-none" data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="flaticon-loupe"></i>
          </button>
          <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
            <span class="burger-menu">
              <span class="top-bar"></span>
              <span class="middle-bar"></span>
              <span class="bottom-bar"></span>
            </span>
          </a>
          <div class="collapse navbar-collapse">
          @include('components.main-menu')
            <div class="others-option d-flex align-items-center">
              <div class="option-item">
                <button type="button" class="search-btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <i class="flaticon-loupe"></i>
                </button>
              </div>
              @auth
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <div class="d-flex align-items-center gap-2">
                    <img src="{{asset(Auth()->user()->image)}}" style="width:40px; height:40px; border-radius:50%" />
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link"> {{ Auth::user()->name }} </a>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      @if (Auth()->user()->role === 'admin')
                      <a href="{{route('admin.dashboard')}}" class="nav-link"> Dashboard </a>
                      @elseif (Auth()->user()->role === 'editor')
                      <a href="{{route('editor.dashboard')}}" class="nav-link"> Dashboard </a>
                      @else
                      <a href="{{route('dashboard')}}" class="nav-link"> Dashboard </a>
                      @endif
                    </li>
                    <li class="nav-item">
                      <a href="{{route('profile.edit')}}" class="nav-link"> {{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item">
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                      <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{route('logout')}}" class="nav-link"> {{ __('Log Out') }}</a>
                    </form>
                    </li>
                  </ul>
                </li>
              </ul>
              
                @if (Auth()->user()->role === 'admin')
                <div class="option-item">
                  <a href="{{route('admin.article.create')}}" class="btn-two">Post Article</a>
                </div>
                @elseif (Auth()->user()->role === 'editor')
                <div class="option-item">
                  <a href="{{route('editor.article.create')}}" class="btn-two">Post Article</a>
                </div>
                @endif

              @else
              <div class="option-item">
                <a href="{{route('login')}}" class="btn-two">Sign In</a>
              </div>
              @endauth
            </div>
          </div>
        </nav>
      </div>
    </div>
    @include('layouts.mobile-nav')
    @include('components.search-modal')