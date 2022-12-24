@include('style.layout.header')
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app" >

    @include("style.layout.navbar")        

        <!--====== App Content ======-->
        <div style="background:rgb(21, 55, 58)" class="app-content ">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60 " style="padding: 0px;padding-top:10px">

                <!--====== Section Content ======-->
                <div class="section__content ">
                    <div class="container ">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap w-100 " style="background: rgb(46, 46, 46)">
                                <ul class="breadcrumb__list w-100" style="color:white;text-decoration:none">
                                    <li class="has-separator">

                                        <a  style="color:white;text-decoration:none" href="{{ route('show_style_user') }}">{{ __("messages.Home") }}</a></li>
                                    <li class="is-marked">

                                        <a style="color:white;text-decoration:none" href="{{ route("show_style_user") }}">{{ __("messages.My Account") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60  " style="margin-top: 0px;padding:0px">

                <!--====== Section Content ======-->
                <div class="section__content ">
                    <div class="dash">
                        <div class="container ">
                            <div class="row">
                                <div class="col-lg-3 col-md-12  rounded" style="" >

                                    <!--====== Dashboard Features ======-->
                                    <div class="dash__box dash__box--bg-white rounded dash__box--shadow u-s-m-b-30">
                                        
                                    </div>
                                    <div class="rounded bg-light dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                        <div class="dash__pad-1">
                                            <ul class="dash__w-list">
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                        <span class="dash__w-text">{{ count(\App\Models\order::where('status','cancel')->get()) }}</span>

                                                        <span class="dash__w-name">{{ __("messages.Orders Success") }}</span></div>
                                                <br/>
                                                    </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                        <span class="dash__w-text">{{ count(\App\Models\order::where("status","success")->get()) }}</span>

                                                        <span class="dash__w-name">{{ __("messages.Cancel Orders") }}</span></div>
                                                <br/>
                                                    </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                        <span class="dash__w-text">{{ count(\App\Models\wishlist::where("user_id",auth('web')->user()->id)->get()) }}</span>

                                                        <span class="dash__w-name">{{ __("messages.Wishlist") }}</span></div>
                                               <br/>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12  ">
                                    <div class="bg-light dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14 text-center">{{ __("messages.My Orders") }}</h1>

                                            <span class="dash__text u-s-m-b-30 text-center">{{ __("messages.Here you can see all products that have been delivered.") }}</span>
                                            <div class="m-order__list">

                                                    @foreach($order1=\App\Models\order::paginate(2) as $order)
                                                    <div class="m-order__get " style="padding: 0px" >

                                                        <div class="rounded " style="padding: 15px;background:rgb(73, 73, 73);margin:0px">
                                                            <div class="dash-l-r">
                                                                <div>
                                                                    <div class="manage-o__text-2" style="color:white">{{ __("messages.Order") }} #{{ $order->id }}</div>
                                                                    <div class="manage-o__text u-c-silver">{{ __("messages.Placed on") }} {{ $order->created_at }}</div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    <div class="manage-o__description d-flex justify-content-between " style="padding: 15px;background:rgb(211, 225, 226)" >
                                                        
                                                        <div class="description__container " >
                                                            
                                                            
                                                            <div class="description__img-wrap">

                                                                <img style="width:90px;height:90px" src="{{ asset("img/upload/product/".$order->product->photo) }}" alt=""></div>
                                                                <div class="description-title">{{ $order->product->title }}</div>
                                                            </div>
                                                        <div class="description__info-wrap">
                                                            <div>

                                                                @if($order->status=='processing')
                                                                <div style="width:auto" class="manage-o__badge badge--processing ">{{ __("messages.Processing") }}  </div>
                                                                @endif

                                                                @if($order->status=='cancel')
                                                                <div style="width:auto;color:red;background:rgba(255, 209, 209, 0.726)" class="manage-o__badge badge--processing" >{{ __("messages.Cancel") }}  </div>
                                                                @endif
                                                                
                                                                @if($order->status=='success')
                                                                <div class="manage-o__badge badge--processing " style="background:rgba(189, 230, 189, 0.692);color:green;width:auto ">{{ __("messages.Success") }}  </div>
                                                                @endif

                                                            </div>
                                                            <div>

                                                                <span class="manage-o__text-2 u-c-silver">{{ __("messages.Quantity:") }}

                                                                    <span class="manage-o__text-2 u-c-secondary">{{ $order->quantity }}</span></span></div>
                                                            <div>

                                                                <span class="manage-o__text-2 u-c-silver">{{ __("messages.Total:") }}

                                                                    <span class="manage-o__text-2 u-c-secondary">${{ $order->total }}</span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    @endforeach

                                                <div style="display: flex;justify-content:center">{{ $order1->links() }}</div>









                                                    
                                                
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
            </div>
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
