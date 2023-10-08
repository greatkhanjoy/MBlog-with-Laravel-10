

@php
  $i = 0;
  $l = 0;
@endphp
<div class="selected-news-three pb-100 mt-5">
    <div class="container">
      <div class="section-title-two mb-40">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2>Selected posts</h2>
          </div>
          <div class="col-md-6 text-md-end">
            <ul class="nav nav-tabs news-tablist-three" role="tablist">
              @foreach ($categories as $category )
              <li class="nav-item">
                <button class="nav-link @if($l === 0) active @endif" data-bs-toggle="tab" data-bs-target="#{{$category->slug}}" type="button" role="tab">{{$category->name}} <i class="flaticon-arrow-right"></i>
                </button>
              </li>
              @php
              $l++;
            @endphp
              @endforeach
              
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-content selected-news-content">
        
        @foreach ($categories as $category)
        <div class="tab-pane fade @if($i === 0) active show @endif" id="{{$category->slug}}" role="tabpanel">
          <div class="row justify-content-left">
            @foreach ($category->articles->take(8) as $article)
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
              <div class="news-card-thirteen">
                <div class="news-card-img">
                  <img src="{{asset($article->thumbnail)}}" alt="$article->title">
                  <a href="{{route('article.category', $category->slug)}}" class="news-cat">{{$category->name}}</a>
                </div>
                <div class="news-card-info">
                  <h3>
                    <a href="{{route('article.show', ['category' => $category->slug, 'slug' => $article->slug])}}">{{$article->title}}</a>
                  </h3>
                  <ul class="news-metainfo list-style">
                    <li>
                      <i class="fi fi-rr-calendar-minus"></i>
                      <a href="#">{{$article->created_at->format('M d,Y')}}</a>
                    </li>
                    <li>
                      <i class="fi fi-rr-clock-three"></i>{{$article->views}} Views
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            @php
              $i++;
            @endphp
            @endforeach

          </div>
        </div>
        @endforeach
      </div>
      <a href="{{route('articles')}}" class="btn-three d-block w-100">View All Articles <i class="flaticon-arrow-right"></i>
      </a>
    </div>
  </div>