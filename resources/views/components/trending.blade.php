@php
  $trendings = App\Models\Article::whereStatus('published')->where('is_trending', true)->with(['category'])->orderBy('id', 'desc')->get();
@endphp

<div class="container">
    <div class="trending-box-two">
      <span>Trending</span>
      <div class="trending-slider-two swiper">
        <div class="swiper-wrapper">
          @foreach ($trendings as $trending)
          <div class="swiper-slide news-card-one">
            <div class="news-card-img">
              <img src="{{asset($trending->thumbnail)}}" style="width: 100%; height:100%" class="w-full h-full object-cover" alt="Image">
            </div>
            <div class="news-card-info">
              <a href="{{route('article.category', $trending->category->slug)}}" class="news-cat">{{$trending->category->name}}</a>
              <h3>
                <a href="{{route('article.show', ['slug' => $trending->slug, 'category' => $trending->category->slug])}}">{{$trending->title}}</a>
              </h3>
              <ul class="news-metainfo list-style">
                <li>
                  <i class="fi fi-rr-calendar-minus"></i>
                  <a href="/" onclick="event.preventDefault();">{{$trending->created_at->format('M d, Y')}}</a>
                </li>
                <li>
                  <i class="fi fi-rr-clock-three"></i>1{{$trending->views}} Views
                </li>
              </ul>
            </div>
          </div>
          @endforeach

        </div>
        <div class="trending-btn">
          <div class="trending-btn-prev">
            <img src="assets/img/icons/left-short-arrow.svg" alt="Image">
          </div>
          <div class="trending-btn-next">
            <img src="assets/img/icons/right-short-arrow.svg" alt="Image">
          </div>
        </div>
      </div>
    </div>
  </div>