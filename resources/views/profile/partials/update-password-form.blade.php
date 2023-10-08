<div class="row mb-5">
    <div class="col-xxl-12 col-xl-12 col-lg-12">
        <form id="send-verification" method="post" action="{{ route('password.update') }}" class="checkout-form">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="checkout-box-title">{{ __('Update Password') }}</h3>
                    <p>{{ __("Ensure your account is using a long, random password to stay secure.") }}</p>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="password" name="current_password" id="current_password" placeholder="Current Password"  required="">
                        @if($errors->updatePassword->has('current_password')) <p>{{$errors->updatePassword->get('current_password')}}</p> @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="New Password" required="">
                        @if($errors->updatePassword->has('password')) <p>{{$errors->updatePassword->get('password')}}</p> @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"  required="">
                        @if($errors->updatePassword->has('password_confirmation')) <p>{{$errors->updatePassword->get('password_confirmation')}}</p> @endif
                    </div>
                </div>


                <div class="col-lg-12 mt-4">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn-one">Save<i
                                class="flaticon-right-arrow"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

