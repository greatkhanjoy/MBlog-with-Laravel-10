@php
    $categories = App\Models\Category::get();
@endphp

<div class="responsive-navbar offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
    <div class="offcanvas-header">
      <a href="index.html" class="logo d-inline-block">
        <img class="logo-light" src="{{asset('assets/img/logo.png')}}" alt="logo">
        <img class="logo-dark" src="{{asset('assets/img/logo-white.png')}}" alt="logo">
      </a>
      <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
        <i class="ri-close-line"></i>
      </button>
    </div>
    <div class="offcanvas-body">
      <div class="accordion" id="navbarAccordion">
        <div class="accordion-item">
          <a href="{{route('home')}}" class="tex- collapsed"><strong> Home </strong></a>
          
        </div>
        <div class="accordion-item">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapbaxour" aria-expanded="false" aria-controls="collapbaxour"> Categories </button>
          <div id="collapbaxour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
            <div class="accordion-body">
              <div class="accordion" id="navbarAccordion45">
                @foreach ($categories as $category )
                <div class="accordion-item">
                  <a class="accordion-link" href="{{route('article.category', $category->slug)}}"> {{$category->name}} </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        
      </div>
      @auth        
      <div class="offcanvas-contact-info">
        <h4>{{Auth()->user()->name}}</h4>
        <ul class="contact-info list-style">
          
          <li>
            <i class="ri-arrow-right-line"></i>
            @if (Auth()->user()->role === 'admin')
            <a href="{{route('admin.dashboard')}}" class="nav-link"> Dashboard </a>
            @elseif (Auth()->user()->role === 'editor')
            <a href="{{route('editor.dashboard')}}" class="nav-link"> Dashboard </a>
            @endif
            <a href="{{route('dashboard')}}" class="nav-link"> Dashboard </a>
          </li>
          <li>
            <i class="ri-arrow-right-line"></i>
            <a href="{{route('profile.edit')}}" class="nav-link"> {{ __('Profile') }}</a>
          </li>
          <li>
            <i class="ri-logout-circle-line"></i>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
            <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{route('logout')}}" class="nav-link"> {{ __('Log Out') }}</a>
          </form>
          </li>

        </ul>
      </div>
      @else
      <div class="others-option d-flex d-lg-none align-items-center">
        <div class="option-item">
          <a href="{{route('login')}}" class="btn-two">Sign In</a>
        </div>
      </div>
      @endauth
    </div>
  </div>