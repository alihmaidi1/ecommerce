@include("style.layout.header")

<body class="config">
    <!--====== Main App ======-->
    <div id="app" style="background:rgb(82, 106, 112)">

        @include("style.layout.navbar")

        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-90 " style="padding: 0px;margin-top:10px">
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap w-100" style="background: rgb(63, 63, 63)">
                                <ul class="breadcrumb__list w-100">
                                    <li class="has-separator" style="color:white;text-decoration:none">

                                        <a  style="color:white;text-decoration:none" href="{{ route("show_style_user") }}">{{ __("messages.Home") }}</a></li>
                                    <li class="is-marked">

                                        <a style="color:white;text-decoration:none" href="{{ route("show_style_user") }}">{{ __("messages.Category") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-3 bg-light rounded p-2 col-md-12">
                            <div class="shop-w-master">
                                <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                                    <span>{{ __("messages.FILTERS") }}</span></h1>
                                <div class="shop-w-master__sidebar sidebar--bg-snow">
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">{{ __("messages.CATEGORY") }}</h1>

                                            </div>
                                            <div class="shop-w__wrap  collapse show" id="s-category">
                                                <ul class="shop-w__category-list gl-scroll">
                                                    @foreach(\App\Models\category::where("parent",null)->get() as $department)
                                                    <li class="has-list">

                                                        <a href="{{ route("department_items",$department->id) }}">{{ $department->name }}</a>

                                                        <span class="category-list__text u-s-m-l-6">({{ count($department->department_children) }})</span>

                                                        <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                                        <ul>
                                                            @foreach($department->department_children as $children)

                                                            <li class="has-list">

                                                                <a href="{{ route('department_items',$children->id) }}">{{ $children->name }}</a>

                                                                <span class="js-shop-category-span "></span>
                                                                
                                                            </li>

                                                            @endforeach
                                                                                                                    </ul>
                                                    </li>
                                                    
                                                    @endforeach
                                                
                                                </ul>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="u-s-m-b-30 ">
                                        <div class="shop-w">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">{{ __("messages.RATING") }}</h1>

                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-rating">
                                                <ul class="shop-w__list gl-scroll">
                                                    
                                                    <li>
                                                        <div class="rating__check">

                                                            <input name="checkbox_value" type="checkbox" class="checkbox_value" value="5">
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                                        </div>

                                                        <span class="shop-w__total-text">({{ count(\App\Models\product::where("rating",5)->get()) }}) {{ __("messages.review") }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input name="checkbox_value" checked  type="checkbox" value="4" class="checkbox_value">
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                                <span>& {{ __("messages.Up") }}</span></div>
                                                        </div>

                                                        <span class="shop-w__total-text">({{ count(\App\Models\product::where("rating",4)->get()) }}) {{ __("messages.review") }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox" name="checkbox_value" value="3" class="checkbox_value">
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                                <span>& {{ __("messages.Up") }}</span></div>
                                                        </div>

                                                        <span class="shop-w__total-text">({{ count(\App\Models\product::where("rating",3)->get()) }}) {{ __("messages.review") }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox" name="checkbox_value" value="2" class="checkbox_value">
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                                <span>& {{ __("messages.Up") }}</span></div>
                                                        </div>

                                                        <span class="shop-w__total-text">({{ count(\App\Models\product::where("rating",2)->get()) }}) {{ __("messages.review") }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox" name="checkbox_value" value="1" class="checkbox_value">
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                                <span>& {{ __("messages.Up") }}</span></div>
                                                        </div>
                                                    
                                                        <span class="shop-w__total-text">({{ count(\App\Models\product::where("rating",1)->get()) }}) {{ __("messages.review") }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9  col-md-12">
                            <div class="shop-p">
                                <div class="shop-p__toolbar u-s-m-b-30 ">
                                    <div class="shop-p__meta-wrap u-s-m-b-60 bg-light ">

                                        <span class="shop-p__meta-text-1">{{ __("messages.FOUND RESULTS") }}</span>
                                        <div class="shop-p__meta-text-2">

                                                                                </div>
             
                                <div class="shop-p__collection">
                                    <div class="row is-grid-active bg-light">
                                        @foreach($pagin1=\App\Models\product::where("department_id",$id)->paginate(3) as $product)

                                        <div class="col-lg-4 col-md-6  col-sm-6">
                                            <div class="product-m ">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block">

                                                        <img class="aspect__img" src="{{ asset("img/upload/product/".$product->photo) }}" alt=""></a>
                                                    <div class="product-m__quick-look">

                                                        <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                                    <div class="product-m__add-cart">

                                                        <a href="{{ route("add_cart",[$product->id,auth('web')->user()->id]) }}" class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart">Add to Cart</a></div>
                                                </div>
                                                <div class="product-m__content  bg-light">
                                                    <div class="product-m__category">

                                                        <a href="shop-side-version-2.html">{{ $product->department->name }}</a></div>
                                                    <div class="product-m__name">

                                                        <a href="product-detail.html">{{ $product->title }}</a></div>
                                                    <div class="product-m__rating gl-rating-style">

                                                        @for($i = 0; $i < $product->rating; $i++)
                                                        <i class="fas fa-star"></i>
                                                        @endfor
                                                        
                                                        @for($i = $product->rating; $i <5 ; $i++)
                                                        <i class="far fa-star"></i>
                                                        @endfor


                                                        <span class="product-m__review">({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }}) {{ __("messages.review") }}</span></div>
                                                    <div class="product-m__price">
                                                    
                                                        @if($product->price_offer!=null&& date("Y-m-d")>=$product->start_offer_at&&date("Y-m-d")<=$product->end_offer_at)
                                                        <span>${{ $product->price }} </span> 
                                                        <del style="color: rgb(207, 4, 4);display:inline-block;padding-left:10px">${{ $product->price_offer }}</del>
                                                    @else
                                                    <span>${{ $product->price }} </span> 

                                                    @endif
                                                    
                                                    </div>
                                                    
                                                    
                                                    
                                                        <div class="product-m__hover bg-light">
                        
                                                        <div class="product-m__wishlist bg-light">

                                                            <a class="far fa-heart " style="@if(count(\App\Models\wishlist::where("user_id",auth('web')->user()->id)->where("product_id",$product->id)->get())!=0)color:orange @endif" href="{{ route("add_heart",[$product->id,auth('web')->user()->id]) }}" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                        

                                    </div>
                                </div>
                                <div style="display: flex;justify-content:center;width:100%">{{ $pagin1->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        <!--====== Modal Section ======-->


        
        <!--====== End - Add to Cart Modal ======-->
        <!--====== End - Modal Section ======-->
    </div>
    <!--====== End - Main App ======-->
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
  @include("style.layout.footer")