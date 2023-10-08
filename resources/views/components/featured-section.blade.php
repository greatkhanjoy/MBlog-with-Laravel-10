@php
  $featured = App\Models\Article::where('is_featured', true)->where('status', 'published')->with(['category', 'user'])->orderBy('id', 'desc')->limit(5)->get();
  $i = 0;
  $l = 0;
@endphp

<div class="container">
    <div class="row featured-news-three">

      @foreach ($featured as $feature)
        @if ($i === 0)
        <div class="col-xl-6">
          <div class="news-card-eleven">
            <div class="news-card-img">
              <img src="{{asset($feature->thumbnail)}}" alt="{{$feature->title}}">
            </div>
            <div class="news-card-info">
              <a href="{{route('article.category', $feature->category->slug)}}" class="news-cat">{{$feature->category->name}}</a>
              <h3>
                <a href="{{route('article.show', ['category' => $feature->category->slug, 'slug' => $feature->slug])}}">{{$feature->title}}</a>
              </h3>
              <p>{{$feature->excerpt}}</p>
              <ul class="news-metainfo list-style">
                <li class="author">
                  <span class="author-img">
                    <img style="width: 100%; height:100%" src="{{asset($feature->user->image)}}" alt="{{$feature->user->name}}">
                  </span>
                  <a href="{{route('article.author', $feature->user->username)}}">{{$feature->user->name}}</a>
                </li>
                <li>
                  <i class="fi fi-rr-calendar-minus"></i>
                  <a href="news-by-date.html">{{$feature->created_at->format('M d, Y')}}</a>
                </li>
                <li>
                  <i class="fi fi-rr-clock-three"></i>{{$feature->views}} Views
                </li>
              </ul>
            </div>
          </div>
        </div>
        @php
          $i++
        @endphp
        @endif
      @endforeach
      
      <div class="col-xl-6">
        <div class="row">
          @foreach ($featured as $feature)
          @if ($l === 0)
            @php
              $l++
            @endphp
          @else
          <div class="col-md-6">
            <div class="news-card-thirteen">
              <div class="news-card-img">
                <img src="{{asset($feature->thumbnail)}}" alt="Iamge">
                <a href="{{route('article.category', $feature->category->slug)}}" class="news-cat">{{$feature->category->name}}</a>
              </div>
              <div class="news-card-info">
                <h3>
                  <a href="{{route('article.show', ['category' => $feature->category->slug, 'slug' => $feature->slug])}}">{{$feature->title}}</a>
                </h3>
                <ul class="news-metainfo list-style">
                  <li>
                    <i class="fi fi-rr-calendar-minus"></i>
                    <span>{{$feature->created_at->format('M d, Y')}}</span>
                  </li>
                  <li>
                    <i class="fi fi-rr-clock-three"></i>{{$feature->views}} Views
                  </li>
                </ul>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>

    </div>
  </div>