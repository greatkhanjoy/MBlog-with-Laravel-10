@extends('layouts.master')

@section('content')
    <div class="profile-wrap ptb-100">
        <div class="container">
            @include('admin.nav')
            @include('components.error')
            @include('components.success')
            <div class="row mb-5">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article )    
                        <tr>
                          <th scope="row">{{$article->id}}</th>
                          <td>{{$article->title}}</td>
                          <td><img  style="max-height: 50px" src="{{asset($article->thumbnail)}}" alt="thumbnail" /></td>
                          <td>{{$article->category->name}}</td>
                          <td class="text-capitalize">{{$article->status}}</td>
                          <td class="d-flex gap-2">
                              <a href="{{route('admin.article.edit', $article->id)}}" class="btn-one" >Edit </a>
                            <form action="{{route('admin.article.destroy', $article->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button href="" class="btn-two" >Delete </button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$articles->links('components.pagination')}}
            </div>
        </div>
    </div>
@endsection