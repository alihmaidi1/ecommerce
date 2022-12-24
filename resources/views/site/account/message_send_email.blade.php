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
                    <a href="">{{ __("messages.Login") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<br/>
<div class="alert alert-success text-center">
    {{ __("messages.the email to change password was sended to your email") }}
</div>


@include("site.include.footer1")
@include("site.include.footer")
