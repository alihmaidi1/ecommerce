@include("style.layout.header")
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app ">

        @include('style.layout.navbar')

        <!--====== App Content ======-->
        <div class="app-content " style="background:rgb(250, 248, 248)">

            <br/>

            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60" style="margin:0 auto;">

                <!--====== Section Content ======-->
                <div class="section__content " >
                    <div class="dash">
                        <div class="container">
                            <div class="row" >
                                
                                <div class="col-12 " >
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white bg-light" style="border:1px solid rgba(0, 0, 0, 0.281)">
                                        <div class="dash__pad-2" style="background:rgba(86, 130, 141, 0.61);border-radius:13px">
                                            <h1 class="dash__h1 u-s-m-b-14 text-center">{{ __("messages.Edit Profile") }}</h1>

                                            <span class="dash__text u-s-m-b-30 text-center " style="color:#000">{{ __("messages.please enter the new information") }}</span>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="dash-edit-p" method="POST" action="{{ route("save_user_edit_style") }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $id }}"/>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" style="color: #000" for="reg-fname">{{ __("messages.Name") }}</label>

                                                                <input value="{{ auth('web')->user()->name }}" class=" @error('name')is-invalid @enderror input-text input-text--primary-style" name="name" type="text" id="reg-fname" placeholder="{{ __("messages.Enter Name") }}">
                                                                @error('name')
                                                                <span style="color:red;font-size:11px" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            </div>


                                                          


    
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" style="color: #000" for="reg-lname">{{ __("messages.new  password") }}</label>

                                                                <input name="password" class=" @error('password')is-invalid @enderror input-text input-text--primary-style" type="password" id="reg-lname" placeholder="{{ __("messages.Enter Password") }}">
                                                                @error('password')
                                                                <span style="color:red;font-size:11px" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            </div>
                                                                
                                                            </div>
                                                    
                                                        </div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="reg-lname" style="color: #000">{{ __("messages.Confirm new  password") }}</label>

                                                            <input name="confirm_password" style="width:100%" class=" @error('confirm_password')is-invalid @enderror input-text input-text--primary-style" type="password" id="reg-lname" placeholder="{{ __("messages.Enter Password") }}">
                                                            @error('confirm_password')
                                                            <span style="color:red;font-size:11px" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror


                                                        </div>
                                                        
                                                        </div>

                                                        <div class="w-100 d-flex justify-content-center"><button  class="btn btn-outline-primary d-flex justify-content-center" type="submit">{{ __("messages.SAVE") }}</button></div>
                                                    <br/>
                                                    </form>
                                                </div>
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

        <!--====== Main Footer ======-->
        
        <!--====== Modal Section ======-->


        <!--====== Unsubscribe or Subscribe Newsletter ======-->
        
        <!--====== Unsubscribe or Subscribe Newsletter ======-->
        <!--====== End - Modal Section ======-->
    </div>
    <!--====== End - Main App ======-->
    @section('js')
    <script src={{ asset("site/js1/map-init.js") }}></script> 
    
    <!--====== Vendor Js ======-->
    <script src="{{ asset("site/js1/vendor.js") }}"></script>
    
    <!--====== jQuery Shopnav plugin ======-->
    <script src="{{ asset("site/js1/jquery.shopnav.js") }}"></script>
    
    <!--====== App ======-->
    <script src="{{ asset('site/js1/app.js') }}"></script>
    
    @endsection 

    @include("style.layout.footer1")
@include('style.layout.footer')