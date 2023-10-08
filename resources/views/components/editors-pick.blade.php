<div class="editor-news-three pt-100 pb-75">
    <div class="container">
      <div class="section-title-two mb-40">
        <div class="row align-items-center">
          <div class="col-md-7">
            <h2>Editor's pick</h2>
          </div>
          <div class="col-md-5 text-md-end">
            <a href="{{route('articles')}}" class="link-three">View All News <span>
                <img src="{{asset('assets/img/icons/arrow-right.svg')}}" alt="Iamge">
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row justify-content-left">
        @foreach ($editorsPick->take(6) as $article)          
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="news-card-thirteen">
            <div class="news-card-img">
              <img src="{{asset($article->thumbnail)}}" alt="{{$article->title}}">
              <a href="{{route('article.category', $article->category->slug)}}" class="news-cat">{{$article->category->name}}</a>
            </div>
            <div class="news-card-info">
              <h3>
                <a href="{{route('article.show', ['slug' => $article->slug, 'category' => $article->category->slug])}}">{{$article->title}}</a>
              </h3>
              <ul class="news-metainfo list-style">
                <li>
                  <i class="fi fi-rr-calendar-minus"></i>
                  <a href="news-by-date.html">{{$article->created_at->format('M d, Y')}}</a>
                </li>
                <li>
                  <i class="fi fi-rr-clock-three"></i>{{$article->views}} Views
                </li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>