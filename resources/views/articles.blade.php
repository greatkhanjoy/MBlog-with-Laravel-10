@extends('layouts.master')

@section('title', 'Articles')
@section('description', 'All Articles')
@section('keywords', 'sharing, sharing text, text, sharing photo, photo,')

@section('content')
<div class="editor-news-three pt-100 pb-75">
    <div class="container">
      <div class="row justify-content-left">
        @foreach ($articles as $article)            
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="news-card-thirteen">
            <div class="news-card-img">
              <img src="{{asset($article->thumbnail)}}" alt="Iamge">
              <a href="{{route('article.category', $article->category->slug)}}" class="news-cat">{{$article->category->name}}</a>
            </div>
            <div class="news-card-info">
              <h3>
                <a href="{{route('article.show', ['slug' => $article->slug, 'category' => $article->category->slug])}}">{{$article->title}}</a>
              </h3>
              <ul class="news-metainfo list-style">
                <li>
                  <i class="fi fi-rr-calendar-minus"></i>
                  <a href="#">{{$article->created_at->format('M d, Y')}}</a>
                </li>
                <li>
                  <i class="fi fi-rr-eye"></i>{{$article->views}} Views
                </li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
        {{$articles->links('components.pagination')}}
      </div>
    </div>
  </div>
@endsection