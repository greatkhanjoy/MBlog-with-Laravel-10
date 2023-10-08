<div class="row">
    <div class="col-xxl-12 col-xl-12 col-lg-12">
        <form id="send-verification" method="post" action="{{ route('profile.destroy') }}" class="checkout-form">
            @csrf
            @method('delete')
            <div class="row my-10">
                <div class="col-lg-12">
                    <h3 class="checkout-box-title">{{ __('Delete Account') }}</h3>
                    <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Current Password" required="">
                        @if($errors->updatePassword->has('password')) <p>{{$errors->updatePassword->get('password')}}</p> @endif
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn-one">Delete Account<i
                                class="flaticon-right-arrow"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

