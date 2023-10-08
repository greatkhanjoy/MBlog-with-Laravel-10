@php
    $articles = App\Models\Article::where('status', 'published')->with(['user', 'category'])->orderBy('views', 'desc')->paginate(7);
@endphp

<div class="popular-news-three pb-100">
    <div class="container">
    <div class="row gx-5">
        <div class="col-lg-8">
        <div class="section-title-two mb-40">
            <div class="row align-items-center">
            <div class="col-md-7">
                <h2>Most Popular</h2>
            </div>
            <div class="col-md-5 text-md-end">
                <a href="{{route('articles')}}" class="link-three">View All News <span>
                    <img src="{{asset('assets/img/icons/arrow-right.svg')}}" alt="Iamge">
                </span>
                </a>
            </div>
            </div>
        </div>
        <div class="popular-news-wrap">
            @foreach ($articles as $article)                
            <div class="news-card-five">
                <div class="news-card-img">
                    <img src="{{asset($article->thumbnail)}}" alt="{{$article->title}}">
                    <a href="{{route('article.category', $article->category->slug)}}" class="news-cat">{{$article->category->name}}</a>
                </div>
                <div class="news-card-info pt-2">
                    <h3>
                    <a href="{{route('article.show', ['category' => $article->category->slug, 'slug' => $article->slug])}}">{{$article->title}}</a>
                    </h3>
                    <p>{{$article->excerpt}}</p>
                    <ul class="news-metainfo list-style">
                    <li class="author">
                        <span class="author-img">
                        <img src="{{$article->user->image}}" alt="{{$article->user->name}}">
                        </span>
                        <a href="{{route('article.author', $article->user->username)}}">{{$article->user->name}}</a>
                    </li>
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
            @endforeach
        </div>
        </div>
        <div class="col-lg-4">
        <div class="sidebar">
            @include('components.category-widget')
            @include('components.recent-post-widget')
            
        </div>
        </div>
    </div>
    </div>
</div>