@extends('layouts.master')

@section('content')
    <div class="profile-wrap ptb-100">
        <div class="container">
            @include('admin.nav')
            @include('components.error')
            @include('components.success')
            <div class="row mb-5">
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <form id="send-verification" method="post" action="{{route('admin.category.store')}}" enctype="multipart/form-data" class="checkout-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="checkout-box-title">{{ __('New Category') }}</h3>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Categoty name" required="">
                                    @if($errors->has('name'))
                                        @foreach($errors->get('name') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            
            
                            <div class="col-lg-12 mt-4">
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn-one">Add Category<i class="flaticon-right-arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    
@endsection


