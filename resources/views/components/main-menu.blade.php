@php
    $categories = App\Models\Category::get();
@endphp
<ul class="navbar-nav mx-auto">
    <li class="nav-item">
      <a href="{{route('home')}}" class=" nav-link active"> Home </a>
    </li>
    <li class="nav-item">
      <a href="javascript:void(0)" class="dropdown-toggle nav-link"> Categories </a>
      <ul class="dropdown-menu">
        @foreach ($categories as $category )
        <li class="nav-item">
          <a href="{{route('article.category', $category->slug)}}" class="nav-link"> {{$category->name}} </a>
        </li>
        @endforeach
      </ul>
    </li>
    
  </ul>