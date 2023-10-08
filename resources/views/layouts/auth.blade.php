<!DOCTYPE html>
<html lang="zxx">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <title>Baxo - Responsive Blog HTML Template</title>
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.webp')}}">
</head>

<body>

    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <div class="login-wrap">
        <div class="login-bg">
            <a href="index.html" class="navbar-brand">
                <img class="logo-light" src="assets/img/logo-white.webp" alt="Image">
                <img class="logo-dark" src="assets/img/logo-white.webp" alt="Image">
            </a>
        </div>
        <div class="login-content">
            <a href="{{ url()->previous() }}" class="link-one"><i class="ri-arrow-left-s-line"></i>Back</a>
            @yield('content')
        </div>
    </div>


    <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
        <i class="ri-arrow-up-line"></i>
    </button>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/aos.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>



</html>