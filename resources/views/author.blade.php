@extends('layouts.master')


@section('title', $user->name)
@section('description', 'Author Articles')
@section('keywords', 'sharing, sharing text, text, sharing photo, photo,')

@section('content')
    @include('components.breadcrumb', ['item' => $user])
    <div class="author-wrap">
        <div class="container">
            <div class="author-box">
                <div class="author-img">
                    <img src="{{asset($user->image)}}" alt="{{$user->name}}">
                </div>
                <div class="author-info">
                    <h4>{{$user->name}}</h4>
                    <p>{{$user->bio}}</p>
                    <div class="author-profile">
                        <ul class="social-profile list-style">
                            <li><a href="{{$user->facebook}}" target="_blank"><i class="ri-facebook-fill"></i></a></li>
                            <li><a href="{{$user->twitter}}" target="_blank"><i class="ri-twitter-fill"></i></a></li>
                            <li><a href="{{$user->instagram}}" target="_blank"><i class="ri-instagram-line"></i></a>
                            </li>
                            <li><a href="{{$user->linkedin}}" target="_blank"><i class="ri-linkedin-fill"></i></a>
                            </li>
                        </ul>
                        <div class="author-stat">
                            <span>{{$articles->count()}} Articles</span>
                            <span>{{$user->getTotalCommentCount()}} Comments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popular-news-three pb-100 mt-4">
        <div class="container">
        <div class="row gx-5">
            <div class="col-lg-8">
            <div class="section-title-two mb-40">
                <div class="row align-items-center">
                <div class="col-md-7">
                    <h2>Articles</h2>
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
                    <div class="news-card-info pt-4">
                        <h3>
                        <a href="{{route('article.show', ['category' => $article->category->slug, 'slug' => $article->slug])}}">{{$article->title}}</a>
                        </h3>
                        <p>{{$article->excerpt}}</p>
                        <ul class="news-metainfo list-style">
                        <li class="author">
                            <span class="author-img">
                            <img src="{{asset($article->user->image)}}" alt="{{$article->user->name}}">
                            </span>
                            <a href="{{route('article.author', $article->user->username)}}">{{$article->user->name}}</a>
                        </li>
                        <li>
                            <i class="fi fi-rr-calendar-minus"></i>
                            <a href="javascript:void(0)">{{$article->created_at->format('M d, Y')}}</a>
                        </li>
                        <li>
                            <i class="fi fi-rr-clock-three"></i>{{$article->views}} Views
                        </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                {{$articles->links('components.pagination')}}
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

@endsection
