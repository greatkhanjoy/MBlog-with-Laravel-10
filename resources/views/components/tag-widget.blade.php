@php
   $tags = App\Models\Tag::paginate(10);
@endphp

<div class="sidebar-widget">
    <h3 class="sidebar-widget-title">Popular Tags</h3>
    <ul class="tag-list list-style">
      @foreach ($tags as $tag )
      <li><a class="text-uppercase" href="{{route('article.tag', $tag->slug)}}">{{$tag->name}}</a></li>
      @endforeach
    </ul>
 </div>