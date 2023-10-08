@extends('layouts.master')

@section('content')
    <div class="profile-wrap ptb-100">
        <div class="container">
            @include('admin.nav')
            @include('components.error')
            @include('components.success')
            <div class="row mb-5 flex-d gap-4">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$articles->count()}}</h5>
                      <p class="card-text">Total Articles</p>
                    </div>
                  </div>
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$articles->where('status', 'published')->count()}}</h5>
                      <p class="card-text">Published</p>
                    </div>
                  </div>
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$articles->where('status', 'pending')->count()}}</h5>
                      <p class="card-text">Pending</p>
                    </div>
                  </div>
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$articles->where('status', 'rejected')->count()}}</h5>
                      <p class="card-text">Rejected</p>
                    </div>
                  </div>
            </div>

            <div class="row mb-5">
              <h5>Pending Posts awaiting to be approved</h5>
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Author</th>
                      <th scope="col">Thumbnail</th>
                      <th scope="col">Category</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($pendings as $article )    
                      <tr>
                        <th scope="row">{{$article->id}}</th>
                        <td>{{$article->title}}</td>
                        <td>{{$article->user->name}}</td>
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
                {{$pendings->links('components.pagination')}}
          </div>
        </div>
    </div>
@endsection