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
                    <a href="">{{ __("messages.Register") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>




<br/>
<div class="col-12">
    <div class="reg-wrapper">
        <h2 class="account-h2 u-s-m-b-20 text-center">{{ __("messages.Register") }}</h2>
        <h6 class="account-h6 u-s-m-b-30 text-center">{{ __("messages.Registering for this site allows you to access your order status and history.") }}</h6>
        <form method="POST" action="{{ route("register_post") }}">
            @csrf
            <div class="u-s-m-b-30">
                <label for="user-name">{{ __("messages.Username") }}
                    <span class="astk">*</span>
                </label>
                <input type="text" name="name" id="user-name" class="text-field @error('name') is-invalid @enderror" placeholder="{{ __("messages.Username") }}">
                @error('name')
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="u-s-m-b-30">
                <label for="email">{{ __("messages.Email") }}
                    <span class="astk">*</span>
                </label>
                <input type="text" value="{{ @old("email") }}" name="email" id="email" class="@error('email') is-invalid @enderror text-field" placeholder="{{ __("messages.Email") }}">
           
                @error('email')
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="u-s-m-b-30">
                <label for="password">{{ __("messages.Password") }}
                    <span class="astk">*</span>
                </label>
                <input type="text" name="password" value="{{ @old("password") }}" id="password" class="@error('password') is-invalid @enderror text-field" placeholder="{{ __("messages.Password") }}">
                @error('password')
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="u-s-m-b-30">
                <label for="password">{{ __("messages.Confirm Password") }}
                    <span class="astk">*</span>
                </label>
                <input type="text" value="{{ @old("confirm_password") }}" name="confirm_password" id="password" class="@error('confirm_password') is-invalid @enderror text-field" placeholder="{{ __("messages.Password") }}">
                @error('confirm_password')
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            
            </div>
            <div class="u-s-m-b-30">
                <input type="checkbox" class="check-box" id="accept">
                <label class="label-text no-color" for="accept">{{ __("messages.I’ve read and accept the") }}
                    <a href="" class="u-c-brand">{{ __("messages.terms & conditions") }}</a>
                </label>
            </div>
            <div class="u-s-m-b-45">
                <button class="button button-primary w-100">{{ __("messages.Register") }}</button>
            </div>
        </form>
    </div>
</div>
<!-- Register /- -->




@include("site.include.footer1")
@include("site.include.footer")
