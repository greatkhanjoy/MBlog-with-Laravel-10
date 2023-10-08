@php
    $recentPosts = App\Models\Article::whereStatus('published')->with('category')->latest()->paginate(5);
@endphp

<div class="sidebar-widget">
    <h3 class="sidebar-widget-title">Recent Posts</h3>
    <div class="pp-post-wrap">
      @foreach ($recentPosts as $post)
      <div class="news-card-one">
         <div class="news-card-img">
            <img src="{{asset($post->thumbnail)}}" alt="{{$post->title}}">
         </div>
         <div class="news-card-info">
            <h3><a href="{{route('article.show', ['category' => $post->category->slug, 'slug' => $post->slug])}}">{{$post->title}}</a></h3>
            <ul class="news-metainfo list-style">
               <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">{{$post->created_at->format('M d, Y')}}</a></li>
            </ul>
         </div>
      </div>
      @endforeach

    </div>
 </div>