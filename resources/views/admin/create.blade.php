@extends('layouts.master')

@section('content')
    <div class="profile-wrap ptb-100">
        <div class="container">
            @include('admin.nav')
            @include('components.error')
            @include('components.success')
            <div class="row mb-5">
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <form id="send-verification" method="post" action="{{route('admin.article.store')}}" enctype="multipart/form-data" class="checkout-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="checkout-box-title">{{ __('Post New Aricle') }}</h3>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" value="{{old('title')}}" placeholder="Title" required="">
                                    @if($errors->has('title'))
                                        @foreach($errors->get('title') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" placeholder="Description">{{old('description')}}</textarea>
                                    @if($errors->has('description'))
                                        @foreach($errors->get('description') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt" placeholder="Excerpt">{{old('excerpt')}}</textarea>
                                    @if($errors->has('excerpt'))
                                        @foreach($errors->get('excerpt') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" >
                                        <option value="" selected>-Select Category-</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                        @foreach($errors->get('category') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" >
                                        <option selected value="published">Published</option>
                                        <option value="pending">Pending</option>
                                        <option value="rejected">Rejected</option>
                                        
                                    </select>
                                    @if($errors->has('status'))
                                        @foreach($errors->get('status') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group flex-d justify-center">
                                    <label for="thumbnail">Featured Image</label>

                                    <input type="file" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}" required="">
                                    @if($errors->has('thumbnail'))
                                        @foreach($errors->get('thumbnail') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="tags">Tags</label>
                                <div class="form-group">
                                    <select style="height: 100%" name="tags[]" id="tags" multiple >
                                        <option value="" disabled selected>-Select Tags-</option>
                                        @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tags'))
                                        @foreach($errors->get('tags') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group d-flex align-items-center gap-2 col-6">
                                        <label for="is_featured">Featured?</label>
                                        <input type="hidden" id="is_featured" name="is_featured" value="no" ng-model="isFull" checked>
                                        <input type="checkbox" id="is_featured" name="is_featured" style="widows: 20px; height:20px" value="yes" ng-model="isFull">
                                        
                                    </div>
                                    <div class="form-group d-flex align-items-center gap-2 col-6">
                                        <label for="is_trending">Trending?</label>
                                        <input type="hidden" id="is_trending" name="is_trending" value="no" ng-model="isFull" checked>
                                        <input type="checkbox" id="is_trending" name="is_trending" style="widows: 20px; height:20px" value="yes" ng-model="isFull">
                                    </div>
                                </div>
                            </div>
                            
            
                            <div class="col-lg-12 mt-4">
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn-one">Post<i class="flaticon-right-arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('#description').summernote({
          placeholder: 'Write your Description',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      </script>
    @endpush
    
@endsection


