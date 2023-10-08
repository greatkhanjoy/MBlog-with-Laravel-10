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
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <div class="d-flex gap-2 w-100 justify-content-end">
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn-one">Edit
                                            </a>
                                            <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button href="" class="btn-two">Delete </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                {{ $categories->links('components.pagination') }}
            </div>
        </div>
    </div>
@endsection
