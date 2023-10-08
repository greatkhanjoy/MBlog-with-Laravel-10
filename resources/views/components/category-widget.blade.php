@php
    $categories = App\Models\Category::with(['articles'])->get();
@endphp

<div class="sidebar-widget">
    <h3 class="sidebar-widget-title">Categories</h3>
    <ul class="category-widget list-style">
      @foreach ($categories as $category )
      <li><a href="{{route('article.category', $category->slug)}}"><img src="{{asset('assets/img/icons/arrow-right.svg')}}" alt="arrow">{{$category->name}} <span>{{$category->articles()->where('status', 'published')->count()}}</span></a></li>            
      @endforeach
    </ul>
 </div>