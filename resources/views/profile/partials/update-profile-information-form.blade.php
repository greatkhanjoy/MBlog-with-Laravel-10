<div class="row mb-5">
    <div class="col-xxl-12 col-xl-12 col-lg-12">
        <form id="send-verification" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="checkout-form">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="checkout-box-title">{{ __('Profile Information') }}</h3>
                    <p>{{ __("Update your account's profile information and email address.") }}</p>
                </div>
                <div class="col-lg-12 mb-4">
                    <div class="mx-auto overflow-hidden d-flex justify-content-center" style="width: 120px; height:120px">
                        <img id="image_preview" src="{{asset($user->image)}}" alt="user-image" class="rounded-circle"  />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group d-flex align-items-center gap-3">
                        <label for="image" class="btn-four">
                            Select Profile Photo
                        </label>
                        <button type="button" id="reset_button" class="btn-two">reset</button>
                        <input type="file" class="w-100 visually-hidden" placeholder="photo" name="image" id="image" >
                        @if($errors->has('image')) <p>{{$errors->get('image')}}</p> @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="name" id="name" value="{{old('name', $user->name)}}" placeholder="Name" required="">
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="email" name="email" id="email" value="{{old('email', $user->email)}}" placeholder="Email" required="">
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="username" id="username" value="{{old('username', $user->username)}}" placeholder="Username" required="">
                        @if($errors->has('username'))
                            @foreach($errors->get('username') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea name="bio" id="bio" placeholder="Bio">{{old('bio', $user->bio)}}</textarea>
                        @if($errors->has('bio'))
                            @foreach($errors->get('bio') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="twitter" id="twitter" value="{{old('twitter', $user->twitter)}}" placeholder="Twitter url">
                        @if($errors->has('twitter'))
                            @foreach($errors->get('twitter') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="facebook" id="facebook" value="{{old('facebook', $user->facebook)}}" placeholder="Facebook url">
                        @if($errors->has('facebook'))
                            @foreach($errors->get('facebook') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="instagram" id="instagram" value="{{old('instagram', $user->instagram)}}" placeholder="Instagram url">
                        @if($errors->has('instagram'))
                            @foreach($errors->get('instagram') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="linkedin" id="linkedin" value="{{old('linkedin', $user->linkedin)}}" placeholder="Linkedin url">
                        @if($errors->has('linkedin'))
                            @foreach($errors->get('linkedin') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                

                <div class="col-lg-12 mt-4">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn-one">Save Information<i class="flaticon-right-arrow"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image').on('change', function() {
                var file = $(this).prop('files')[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#image_preview').attr('src', '{{asset($user->image)}}');
                }
            });

            $('#reset_button').on('click', function() {
            $('#image_preview').attr('src', '{{asset($user->image)}}');
        });
        });
    </script>
    @endpush