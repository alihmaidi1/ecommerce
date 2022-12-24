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
                    <a href="">{{ __("messages.Login") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>





<!-- Login -->
<br/>
<div class="col-12">
    <div class="login-wrapper">
        <h2 class="account-h2 u-s-m-b-20 text-center">{{ __("messages.Login") }}</h2>
        <h6 class="account-h6 u-s-m-b-30 text-center">{{ __("messages.Welcome back! Sign in to your account.") }}</h6>
        <form method="POST"  action="{{ route("post_login") }}">
            @csrf
            <div class="u-s-m-b-30">
                <label for="user-name-email"> {{ __("messages.E-mail") }}
                    <span class="astk">*</span>
                </label>
                <input type="text" name="email" value="{{ old("email") }}" id="user-name-email" class="text-field @error('email')is-invalid @enderror" placeholder="{{ __("messages.Email") }}">

                @error('email')
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="u-s-m-b-30">
                <label for="login-password">{{ __("messages.Password") }}
                    <span class="astk">*</span>
                </label>
                <input type="text" value="{{ old("password") }}" name="password" id="login-password" class="text-field @error('password') is-invalid @enderror" placeholder="{{ __("messages.Password") }}">

                @error('password')
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



            </div>
            <div class="group-inline u-s-m-b-30">
                <div class="group-1">
                    <input type="checkbox" class="check-box" id="remember-me-token">
                    <label class="label-text" for="remember-me-token">{{ __("messages.Remember me") }}</label>
                </div>
                <div class="group-2 text-right">
                    <div class="page-anchor">
                        <a href="{{ route("forget_password") }}">
                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>{{ __("messages.Lost your password?") }}</a>
                    </div>
                </div>
            </div>
            <div class="m-b-45">
                <button class="button button-outline-secondary w-100">{{ __("messages.Login") }}</button>
            <br/>
            <br/>


            </div>
        </form>
    </div>
</div>
<!-- Login /- -->


@include("site.include.footer1")
@include("site.include.footer")
