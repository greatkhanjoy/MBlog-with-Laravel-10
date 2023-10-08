@extends('layouts.master')


@section('title', $category->name)
@section('description', $category->name)
@section('keywords', 'sharing, sharing text, text, sharing photo, photo,')

@section('content')
@include('components.breadcrumb', ['item' => $category])
 <div class="sports-wrap ptb-100">
    <div class="container">
       <div class="row gx-55 gx-5">
          <div class="col-lg-8">
             <div class="row justify-content-left">
                @foreach ($articles as $article)
                <div class="col-md-6">
                   <div class="news-card-thirteen">
                      <div class="news-card-img">
                         <img src="{{asset($article->thumbnail)}}" alt="{{$article->title}}">
                         <a href="{{route('article.category', $article->category->slug)}}" class="news-cat">{{$article->category->name}}</a>
                      </div>
                      <div class="news-card-info">
                         <h3><a href="{{route('article.show', ['category' => $article->category->slug, 'slug' => $article->slug])}}">{{$article->title}}</a></h3>
                         <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="#">{{$article->created_at->format('M d, Y')}}</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>{{$article->views}} Views</li>
                         </ul>
                      </div>
                   </div>
                </div>                    
                @endforeach
             </div>
             {{$articles->links('components.pagination')}}
          </div>
          <div class="col-lg-4">
            @include('layouts.single-sidebar')
          </div>
       </div>
    </div>
 </div>
@endsection