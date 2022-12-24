@include("style.layout.header")
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app " style="background: rgba(245, 248, 248, 0.61)">
        <div class="app-content " >
            @include('style.layout.navbar')

            <!--====== Section 1 ======-->
<br/>
<br/>
            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60 " style="padding-bottom:0px">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 ">

                                    <!--====== Dashboard Features ======-->

                                    <div class="rounded dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                        <div class="dash__pad-1">
                                            <ul class="dash__w-list">
                                                <li>
                                                    <div class="dash__w-wrap" style="padding:0px">

                                                        <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                        <span class="dash__w-text">{{ count(\App\Models\order::where("status","cancel")->get()) }}</span>

                                                        <span class="dash__w-name">{{ __("messages.Orders failed") }}</span></div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap" >

                                                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                        <span class="dash__w-text">{{ count(\App\Models\order::where("status","success")->get()) }}</span>

                                                        <span class="dash__w-name">{{ __("messages.order success") }}</span></div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap" >

                                                        <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                        <span class="dash__w-text">{{ count(\App\Models\wishlist::where("user_id",auth('web')->user()->id)->get()) }}</span>

                                                        <span class="dash__w-name">{{ __("messages.My  wishlist") }}</span></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">{{ __("messages.My Profile") }}</h1>

                                            <span class="dash__text u-s-m-b-30">{{ __("messages.Look all your info, you could customize your profile.") }}</span>
                                            <div class="row">
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">{{ __("messages.Full Name") }}</h2>

                                                    <span class="dash__text">{{ auth('web')->user()->name }}</span>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">{{ __("messages.Login by") }}</h2>

                                                    <span class="dash__text">{{ auth('web')->user()->level }}</span>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">{{ __("messages.E-mail") }}</h2>

                                                    <span class="dash__text">{{ auth('web')->user()->email }}</span>
                                                    <div class="dash__link dash__link--secondary">

                                                        </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="dash__link dash__link--secondary u-s-m-b-30">

                                                    <div class="u-s-m-b-16">

                                                        <a class="text-decoration-none dash__custom-link btn--e-transparent-brand-b-2" href="/edit_user/{{ auth('web')->user()->id }}">{{ __("messages.Edit Profile") }}</a></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
<br/>        
        @include("style.layout.footer1")

        @section('js')
        <script src={{ asset("site/js1/map-init.js") }}></script> 
        
        <!--====== Vendor Js ======-->
        <script src="{{ asset("site/js1/vendor.js") }}"></script>
        
        <!--====== jQuery Shopnav plugin ======-->
        <script src="{{ asset("site/js1/jquery.shopnav.js") }}"></script>
        
        <!--====== App ======-->
        <script src="{{ asset('site/js1/app.js') }}"></script>
        
        @endsection        <!--====== End - Main App ======-->

        @include("style.layout.footer")