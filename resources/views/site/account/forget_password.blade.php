@include("site.include.header")
@include("site.include.navbar")
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>{{ __("messages.About") }}</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.Forget Password") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="page-lost-password u-s-p-t-80 col-12">
    <div class="container ">
        <div class="page-lostpassword">
            <h2 class="account-h2 u-s-m-b-20 text-center">{{ __("messages.Forgot Password ?") }}</h2>
            <h6 class="account-h6 u-s-m-b-30 text-center">{{ __("messages.Enter your email or username below and we will send you a link to reset your password.") }}</h6>
            <form method="POST" action="{{ route("send_email_forget") }}">
                @csrf
                <div class="col-sm-12 col-md-6 m-auto">
                    <div class="u-s-m-b-13">
                        <label for="user-name-email">{{ __("messages.Email") }}
                            <span class="astk">*</span>
                        </label>
                        <input required value="{{ old("email") }}" name="email" type="text" id="user-name-email" class="@error('email')is-invalid @enderror text-field" placeholder="{{ __("messages.Email") }}">
                        @error('email')
                        <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                            </div>
                    <div class="u-s-m-b-13 m-auto">
                        <button class="button button-outline-secondary">{{ __("messages.Get Reset Link") }}</button>
                    </div>
                    <br/>
                    <div class="page-anchor u-s-m-b-13 m-auto ">
                        <a href="{{ route("login_user") }}">
                            <i class="fas fa-long-arrow-alt-left u-s-m-r-9"></i>{{ __("messages.Back to Login") }}</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>



@include("site.include.footer1")
@include("site.include.footer")
