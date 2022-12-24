@include("site.include.header")
@include("site.include.navbar")
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>About</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.New Password") }} </a>
                </li>
            </ul>
        </div>
    </div>
</div>


<br/>

<div class="col-12">
    <div class="login-wrapper">
        <h2 class="account-h2 u-s-m-b-20 text-center">{{ __("messages.New Password") }}</h2>
        <h6 class="account-h6 u-s-m-b-30 text-center">{{ __("messages.Welcome back! Change Password to your account.") }}</h6>
        <form method="POST" action="{{ route("post_change") }}">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}"/>
            <div class="u-s-m-b-30">
                <label for="user-name-email">{{ __("messages.New Password") }}
                    <span class="astk">*</span>
                </label>
                <input type="password" name="password" id="user-name-email" class="text-field @error('password') is-invalid @enderror" placeholder="{{ __("messages.New Password") }}">
                @error('password')
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

           
            </div>
            <div class="u-s-m-b-30">
                <label for="login-password">{{ __("messages.Confirm Password") }}
                    <span class="astk">*</span>
                </label>
                <input type="password" name="confirm_password" id="login-password" class="text-field @error('confirm_password') is-invalid @enderror" placeholder="{{ __("messages.Confirm Password") }}">
                @error('confirm_password')
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="m-b-45">
                <button class="button button-outline-secondary w-100">{{ __("messages.Change") }}</button>
            </div>
        </form>
    </div>
</div>
<!-- Login /- -->




@include("site.include.footer1")
@include("site.include.footer")
