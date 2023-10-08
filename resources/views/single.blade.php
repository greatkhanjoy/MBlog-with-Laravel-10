@extends('layouts.master')

@section('title', $article->title)
@section('description', $article->description)
@section('keywords', 'sharing, sharing text, text, sharing photo, photo,')

@section('content')2-

-+<div class="news-details-wrap ptb-100">
    <div class="container">
       <div class="row gx-55 gx-5">
          <div class="col-lg-8">
             <article>
                <div class="news-img">
                   <img style="width: 100%" src="{{asset($article->thumbnail)}}" alt="{{$article->title}}">
                   <a href="{{route('article.category', $article->category->name)}}" class="news-cat">{{$article->category->name}}</a>
                </div>
                <ul class="news-metainfo list-style">
                   <li class="author">
                      <span class="author-img">
                      <img src="{{asset($article->user->image)}}" alt="{{$article->user->name}}">
                      </span>
                      <a href="{{route('article.author', $article->user->username)}}">{{$article->user->name}}</a>
                   </li>
                   <li><i class="fi fi-rr-calendar-minus"></i><a href="#">{{$article->created_at->format('M d, Y')}}</a></li>
                   <li><i class="fi fi-rr-clock-three"></i>{{$article->views}} Views</li>
                </ul>
                <div class="news-para">
                   <h1>{{$article->title}}</h1>
                   {!!$article->description!!}
                </div>
                
             </article>

             @include('layouts.comment-section')
          </div>
          <div class="col-lg-4">
             @include('layouts.single-sidebar')
          </div>
       </div>
    </div>
 </div>

@endsection