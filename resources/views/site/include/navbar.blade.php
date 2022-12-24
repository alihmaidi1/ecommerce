
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:{{ \App\Models\setting::find(1)->phone }}">
                            <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                            {{ __("messages.Telephone:") }} {{ \App\Models\setting::find(1)->phone }}</a>
                    </li>
                    <li>
                        <a href="mailto:{{ \App\Models\setting::find(1)->email }}">
                            <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                            {{ __("messages.E-mail:") }} {{ \App\Models\setting::find(1)->email }}
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>
                        <a>{{ __("messages.My Account") }}
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="{{ route("show_order_user") }}">
                                    <i class="fas fa-box u-s-m-r-9"></i>
                                    {{ __("messages.My Order") }} </a>
                            </li>
                            <li>
                                <a href="{{ route("show_tracking_user") }}">
                                    <i class="fas fa-truck u-s-m-r-9"></i>
                                    {{ __("messages.Tracking Info") }} </a>
                            </li>
                            <li>
                                <a href="{{ route("show_cart") }}">
                                    <i class="fas fa-cog u-s-m-r-9"></i>
                                    {{ __("messages.My Cart") }}</a>
                            </li>
                            <li>
                                <a href="{{ route("show_wishlist") }}">
                                    <i class="far fa-heart u-s-m-r-9"></i>
                                    {{ __("messages.My Wishlist") }}</a>
                            </li>
                            <li>
                                <a href="{{ route("checkout") }}">
                                    <i class="far fa-check-circle u-s-m-r-9"></i>
                                    {{ __("messages.Checkout") }}</a>
                            </li>

                            @if(auth("web")->user()!="")
                            <li>
                                <a href="{{ route("user_profile") }}">
                                    <i class="fas fa-address-card u-s-m-r-9"></i>
                                    {{ __("messages.My profile") }} </a>
                            </li>

                            <li>
                                <a href="{{ route("logout_user") }}">
                                    <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                    {{ __("messages.Logout") }} </a>
                            </li>
                            
                            @endif
                            @if(auth("web")->user()=="")
                            <li>
                                <a href="{{ route("login_user") }}">
                                    <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                    {{ __("messages.Login") }} </a>
                            </li>
                            <li>
                                <a href="{{ route("register_user") }}">
                                    <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                     {{ __("messages.Signup") }}</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a>USD
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">($) USD</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a>{{ __("messages.Language") }}
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="d-flex justify-content-center p-1">
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                          
                        </ul>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="{{ route("index") }}">

                            <h3 style="font-weight: 700"><span style="color:rgb(255, 8, 8)">E</span> Commerce</h3>

                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">
                    <form method="get" action="{{ route("search_user") }}" class="form-searchbox">
                        @csrf
                        <label class="sr-only" for="search-landscape">{{ __("messages.Search") }}</label>
                        <input id="search-landscape" required name="search" type="text" class="text-field" placeholder="{{ __("messages.Search everything") }}">
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">{{ __("messages.Choose category for search") }}</label>
                                <select class="select-box" name="department" id="select-category">
                                    <option selected="selected" value="0">
                                        {{ __("messages.All") }}
                                    </option>
                                    @foreach(\App\Models\category::get() as $department)

                                        @if(LaravelLocalization::getCurrentLocale()=="ar")


                                        <option value="{{ $department->id }}">{{ $department->name_ar }}</option>


                                        @else

                                        <option value="{{ $department->id }}">{{ $department->name_en }}</option>


                                        @endif


                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input name="page" type="hidden" value="1"/>

                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="{{ route("index") }}">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li class="u-d-none-lg">
                                <a href="{{ route("show_wishlist") }}">
                                    <i class="far fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                
                                <a id="mini-cart-trigger">
                                    <i class="ion ion-md-basket"></i>
                                    <span id="count_cart_side" class="item-counter">
                                    @if(auth("web")->user()!="")    
                                        {{ count(\App\models\cart::where("user_id",auth('web')->user()->id)->get()) }}
                                    @else
0
                                    @endif
                                    </span>

                                    <span id="sum_cart_side1" class="item-price">$
                                    @if(auth("web")->user()!="")    
                                        
                                        {{ sum_cart_user(\App\Models\cart::where("user_id",auth("web")->user()->id)->get()) }}.00
                                    @else
                                        $0.00
                                    @endif
                                    
                                    </span>
                                </a>
                            </li>
                          </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">

              <a class="item-quick-look " style="position: relative;top:10px" data-toggle="modal" href="#search_models">
              </a>
        </div>
        <div class="fixed-responsive-wrapper">
            <a href="{{ route("show_wishlist") }}">
                <i class="far fa-heart"></i>
                
                @if(auth("web")->user()!="")
                <span id="count_wishlist" class="fixed-item-counter">{{ count(\App\Models\wishlist::where("user_id",auth("web")->user()->id)->get()) }}</span>

                @else
                <span class="fixed-item-counter">0</span>

                @endif
            </a>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->
    <!-- Mini Cart -->
    @if(!empty(auth('web')->user()))
    <div class="mini-cart-wrapper">
        <div class="mini-cart">
            <div class="mini-cart-header">
                {{ __("messages.YOUR CART") }}
                <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
            </div>
            <ul id="side_cart" class="mini-cart-list">
               @foreach(\App\Models\cart::where("user_id",auth("web")->user()->id)->get() as $cart)
                <li  class="clearfix">
                    <a href="">
                        <img loading="lazy" style="width: 70px;height:70px" src="{{ asset("img/upload/product/".$cart->product->photo) }}" alt="Product">

                        @if(LaravelLocalization::getCurrentLocale()=="ar")


                        <span class="mini-item-name">{{ $cart->product->title_ar }}x {{ $cart->quantity }}</span>
                        <div class="mini-item-name">{{ $cart->product->department->name_ar }}</div>

                        @else

                        <span class="mini-item-name">{{ $cart->product->title_en }} x {{ $cart->quantity }}</span>
                        <div class="mini-item-name">{{ $cart->product->department->name_en }}</div>


                        @endif


                        @if($cart->product->price_offer!=""&&$cart->product->end_offer_at>\Carbon\Carbon::now()->toDateString())

                        <span id="price_cart_side_{{ $cart->id }}" class="mini-item-price">${{ $cart->product->price_offer }}</span>
                        @else

                        <span id="price_cart_side_{{ $cart->id }}" class="mini-item-price">${{ $cart->product->price }}</span>

                        @endif

                    </a>
                </li>
                @endforeach
               
            </ul>
            <div class="mini-shop-total clearfix">
                <span class="mini-total-heading float-left">{{ __("messages.Total:") }}</span>
                <span id="sum_side_cart" class="mini-total-price float-right">${{ sum_cart_user(\App\Models\cart::where("user_id",auth("web")->user()->id)->get()) }}.00</span>
            </div>
            <div class="mini-action-anchors">
                <a href="{{ route("show_cart") }}" class="cart-anchor">{{ __("messages.View Cart") }}</a>
                <a href="{{ route("checkout") }}" class="checkout-anchor">{{ __("messages.Checkout") }}</a>
            </div>
        </div>
    </div>
    @endif
    <!-- Mini Cart /- -->
    <!-- Bottom-Header -->
    <div id="all_category" class="full-layer-bottom-header ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 ">
                    <div class="v-menu v-close">
                        <span class="v-title">
                            <i class="ion ion-md-menu"></i>
                            {{ __("messages.All Categories") }}
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <nav >
                            <div class="v-wrapper  ">
                                <ul class="v-list animated fadeIn">
                                @foreach($pagin_department=\App\Models\category::get() as $department)
                                    <li class="text-center">
                                        <a href="{{ route("show_single_department",$department->id) }}">

                                            @if(LaravelLocalization::getCurrentLocale()=="ar")
                                            {{ $department->name_ar }}


                                            @else
                                            {{ $department->name_en }}

                                            @endif

                                        </a>
                                    </li>
                                    @endforeach
                                  </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="{{ route("new_product_user") }}">{{ __("messages.New Arrivals") }}
                                <span class="superscript-label-new">{{ __("messages.NEW") }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route("hot_product_user") }}">{{ __("messages.Exclusive Deals") }}
                                <span class="superscript-label-hot">{{ __("messages.HOT") }}</span>
                            </a>
                        </li>
                        <li>
                            <a  href="{{ route("bestrating_product_user") }}">{{ __("messages.Best Rating") }}
                           
                            </a>
                        </li>
                                                <li>
                            <a href="{{ route("discount_product_user") }}">{{ __("messages.Super Sale") }}
                                <span class="superscript-label-discount">{{ __("messages.discount") }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br/>
    <div  style="display: none" id="messages_ajax1" class="text-center alert alert-success " ></div>
    <div  style="display: none" id="messages_ajax2" class="text-center alert alert-danger  " ></div>

    @if(Session("success")!="")
    <br/>
    <div class="text-center alert alert-success">{{ Session("success") }}</div>
    <br/>
    @elseif(Session("error")!="")
    <br/>
    <div class="text-center alert alert-danger">{{ Session("error") }}</div>
    <br/>
    @endif
    <!-- Bottom-Header /- -->
</header>
