@include("style.layout.header")

<body class="config">


    <!--====== Main App ======-->
    <div id="app">

        @include("style.layout.navbar")
        <!--====== Main Header ======-->
        

        <!--====== App Content ======-->
        <div class="app-content" style="background:rgba(240, 250, 248, 0.507)" >

            <!--====== Section 1 ======-->
            
            <br/>

            <!--====== Section 3 ======-->
            <div class="u-s-p-b-60" style="padding:0px ">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 u-s-m-b-30 ">
                                <div class="contact-o u-h-100 rounded">
                                    <div class="contact-o__wrap">
                                        <div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>

                                        <span class="contact-o__info-text-1">{{ __("messages.LET'S HAVE A CALL") }}</span>


                                        <span class="contact-o__info-text-2">{{ \App\Models\setting::find(1)->phone }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="contact-o u-h-100 rounded">
                                    <div class="contact-o__wrap">
                                        <div class="contact-o__icon"><i class="fas fa-map-marker-alt"></i></div>

                                        <span class="contact-o__info-text-1">{{ __("messages.OUR LOCATION") }}</span>

                                        <span class="contact-o__info-text-2">{{ \App\Models\setting::find(1)->address }}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="contact-o u-h-100 rounded">
                                    <div class="contact-o__wrap">
                                        <div class="contact-o__icon"><i class="far fa-clock"></i></div>

                                        <span class="contact-o__info-text-1">{{ __("messages.WORK TIME") }}</span>

                                        <span class="contact-o__info-text-2">{{ \App\Models\setting::find(1)->time_work }}</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->


            <!--====== Section 4 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="contact-area u-h-100  p-4 rounded " style="background:rgb(255, 255, 255)">
                                    <div class="contact-area__heading">
                                        <h2  style="color:rgb(0, 0, 0);background:rgba(255, 255, 255, 0)">{{ __("messages.Get In Touch") }}</h2>
                                    </div>
                                    @if(Session('error'))
                                    <div class="alert alert-danger">{{ Session("error") }}</div>
                                    @endif
                                    
                                    @if(Session('success'))
                                    <div class="alert alert-success">{{ Session("success") }}</div>
                                    @endif
                                    <form class="contact-f" method="post" action="{{ route("suggest") }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 u-h-100">
                                                <div class="u-s-m-b-30">

                                                    <label for="c-name"></label>

                                                    <input name="name" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-name" placeholder="{{ __("messages.Name (Required)") }}" required>
                                                    @error('name')
                                                    <span style="color:red;font-size:11px" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                </div>
                                                <div class="u-s-m-b-30">

                                                    <label for="c-email"></label>

                                                    <input name="email" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-email" placeholder="{{ __("messages.Email (Required)") }}" required>
                                                    @error('email')
                                                    <span style="color:red;font-size:11px" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror


                                                </div>
                                                <div class="u-s-m-b-30">

                                                    <label for="c-subject"></label>

                                                    <input name="subject" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-subject" placeholder="{{ __("messages.Subject (Required)") }}" required>
                                                    @error('subject')
                                                    <span style="color:red;font-size:11px" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 u-h-100">
                                                <div class="u-s-m-b-30">

                                                    <label for="c-message"></label><textarea name="content" class="text-area text-area--border-radius text-area--primary-style" id="c-message" placeholder="{{ __("messages.Compose a Message (Required)") }}" required></textarea>
                                                    @error('content')
                                                    <span style="color:red;font-size:11px" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                </div>
                                            </div>
                                            <div class="col-lg-12">

                                                <button class="btn btn--e-brand-b-2" type="submit">{{ __("messages.Send Message") }}</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 4 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
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


    @include('style.layout.footer1')
    <!--====== Google Map Init ======-->
@include('style.layout.footer')

