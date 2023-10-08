@extends('layouts.master')

@section('content')
    <div class="profile-wrap ptb-100">
        <div class="container">
            @include('admin.nav')
            @include('components.error')
            @include('components.success')
            <div class="row mb-5">
              <div class="col-lg-12 mx-auto">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">slug</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag )    
                        <tr>
                          <th scope="row">{{$tag->id}}</th>
                          <td>{{$tag->name}}</td>
                          <td>{{$tag->slug}}</td>
                          <td class="d-flex gap-2 justify-content-end">
                              <a href="{{route('admin.tag.edit', $tag->id)}}" class="btn-one" >Edit </a>
                            <form action="{{route('admin.tag.destroy', $tag->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button href="" class="btn-two" >Delete </button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  
              </div>
              {{$tags->links('components.pagination')}}
            </div>
        </div>
    </div>
@endsection