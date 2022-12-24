@include("site.include.header")


<!-- app -->
<div id="app">

    @include("site.include.navbar")
    
    @include("site.include.slider")
    <!-- Banner-Layer -->
    <div class="banner-layer">
        <div class="container">
            <div class="image-banner">
                <a href="" class="mx-auto banner-hover effect-dark-opacity">
                    <img loading="lazy" style="height:350px;width:100%" class="img-fluid" src="{{ asset('site2/images/site2/5.jpg') }}" alt="Winter Season Banner">
                </a>
            </div>
        </div>
    </div>
    <!-- Banner-Layer /- -->
    <!-- Men-Clothing -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3">{{ __("messages.SPECIAL PRODUCTS") }}</h3>
                <ul class="nav tab-nav-style-1-a justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#men-latest-products">{{ __("messages.Latest Products") }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">{{ __("messages.Best Selling") }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#men-top-rating-products">{{ __("messages.Top Rating") }}</a>
                    </li>

                </ul>
            </div>
            
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="men-latest-products">
                            <div class="slider-fouc m-auto">
                                <div class="products-slider owl-carousel m-auto" data-item="4">
                                    @foreach(\App\Models\product::where("numbers",">=",1)->orderBy("id","DESC")->paginate(8) as $product)
                                    
                                
                                    <div class="item m-auto">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                                <img loading="lazy" style="height:200px;width:230px" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">                                                
                                                @if(auth("web")->user()!="")

                                                
                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @else

                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @endif                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">

                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                    <li class="has-separator">

                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")


                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>


                                                        @else

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>


                                                        @endif


                                                    </li>        
                                                    @endfor

                                                </ul>
                                                <h6 class="item-title">

                                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_ar }}</a>

                                                    @else


                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_en }}</a>


                                                    @endif

                                                </h6>
                                                <div class="item-stars">
                                                    <div   title="0 out of 5 - based on 0 Reviews">
                                                        @for($i = 0; $i < $product->rating; $i++)
                                                            <i class="fa fa-star" style="color:orange"></i>
                                                        @endfor
                                                        @for($i = $product->rating; $i < 5; $i++)
                                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                                        @endfor
                                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $
                                                    
                                                    @if($product->price_offer!=null && Carbon\Carbon::now()->toDateString()<$product->end_offer_at)
                                                    {{ $product->price_offer }}

                                                    @else
                                                    {{ $product->price }}

                                                    @endif
                                                    
                                                    
                                                    .00
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $product->price }}.00
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag new">
                                            <span>{{ __("messages.NEW") }}</span>
                                        </div>
                                    </div>
                                @endforeach

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="men-best-selling-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">
                                    @foreach(\App\Models\product::where("numbers",">=",1)->orderBy("number_selled")->paginate(8) as $product)
                                    <div class="item m-auto">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                                <img loading="lazy" style="height:200px;width:230px" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">

                                                @if(auth("web")->user()!="")

                                                
                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @else

                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @endif

                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">

                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                    <li class="has-separator">

                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>

                                                        @else

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>

                                                        @endif

                                                    </li>        
                                                    @endfor

                                                </ul>
                                                <h6 class="item-title">
            
                                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_ar }}</a>

                                                    @else

                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_en }}</a>

                                                    @endif

                                                </h6>
                                                <div class="item-stars">
                                                    <div   title="0 out of 5 - based on 0 Reviews">
                                                        @for($i = 0; $i < $product->rating; $i++)
                                                            <i class="fa fa-star" style="color:orange"></i>
                                                        @endfor
                                                        @for($i = $product->rating; $i < 5; $i++)
                                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                                        @endfor
                                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $
                                                    @if($product->price_offer!=null && $product->price_offer>Carbon\Carbon::now()->toDateString())

                                                    {{ $product->price_offer }}

                                                    @else

                                                    {{ $product->price }}


                                                    @endif
                                                    
                                                    
                                                    .00
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $product->price }}.00
                                                </div>
                                            </div>
                                        </div>
                                        <div style="background:rgb(73, 223, 95)" class="tag new">
                                            <span>{{ __("messages.BEST") }}</span>
                                        </div>
                                    </div>
                                @endforeach

                                    
                                </div>

                            </div>   
                        </div>
                        <div class="tab-pane fade" id="men-top-rating-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">
                                    @foreach($top_rating=\App\Models\product::where("numbers",">=",1)->where("rating",">=",4)->orderBy("number_selled")->paginate(8) as $product)
                                    <div class="item m-auto">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                                <img loading="lazy" style="height:200px;width:230px" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                
                                                @if(auth("web")->user()!="")

                                                
                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @else

                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @endif
                                            
                                            
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">

                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                    <li class="has-separator">

                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>


                                                        @else

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>


                                                        @endif


                                                    </li>        
                                                    @endfor

                                                </ul>
                                                <h6 class="item-title">

                                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_ar }}</a>

                                                    @else


                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_en }}</a>

                                                    @endif


                                                </h6>
                                                <div class="item-stars">
                                                    <div   title="0 out of 5 - based on 0 Reviews">
                                                        @for($i = 0; $i < $product->rating; $i++)
                                                            <i class="fa fa-star" style="color:orange"></i>
                                                        @endfor
                                                        @for($i = $product->rating; $i < 5; $i++)
                                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                                        @endfor
                                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $
                                                    
                                                    @if($product->price_offer!=null && $product->price_offer>\Carbon\Carbon::now()->toDateString())

                                                    {{ $product->price_offer }}

                                                    @else

                                                    {{ $product->price }}

                                                    @endif
                                                    
                                                    
                                                    .00
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $product->price }}.00
                                                </div>
                                            </div>
                                        </div>
                                        <div style="background:rgb(236, 250, 36)" class="tag new">
                                            <span>{{ __("messages.Rating") }}</span>
                                        </div>
                                    </div>
                                @endforeach

                                

                                </div>
                                @if(count($top_rating)==0)
                                    
                                <div class="product-not-found">
                                    <div class="not-found">
                                        <h2>{{ __("messages.SORRY!") }}</h2>
                                        <h6>{{ __("messages.There is not any product in specific catalogue.") }}</h6>
                                    </div>
                                </div>
                                
                                    @endif
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Men-Clothing-Timing-Section -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <span class="sec-maker-span-text">{{ __("messages.Some Offers") }}</span>
                <h3 class="sec-maker-h3 u-s-m-b-22">{{ __("messages.Hot Product") }}</h3>
                <span class="sec-maker-span-text">{{ __("messages.Ends in") }}</span>
                <!-- Timing-Box -->
                {{-- offer in 5 days --}}
                <!-- Timing-Box /- -->
            </div>
                {{--end offer in 5 days --}}

            <!-- Carousel -->
            <div class="slider-fouc">
                <div class="products-slider owl-carousel" data-item="4">
                    @foreach($top_rating=\App\Models\product::where("numbers",">=",1)->where("price_offer","!=",null)->where("end_offer_at",">",\Carbon\Carbon::now()->toDateString())->orderBy("number_selled")->paginate(8) as $product)
                    <div class="item m-auto">
                        <div class="image-container">
                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                <img loading="lazy" style="height:200px;width:230px" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                            </a>
                            <div class="item-action-behaviors">
                               
                                @if(auth("web")->user()!="")

                                                
                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                @else

                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                @endif


                               </div>
                        </div>
                        <div class="item-content">
                            <div class="what-product-is">
                                <ul class="bread-crumb">

                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                    <li class="has-separator">

                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>

                                        @else

                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>

                                        @endif


                                    </li>        
                                    @endfor

                                </ul>
                                <h6 class="item-title">

                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_ar }}</a>


                                    @else

                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_en }}</a>

                                    @endif

                                </h6>
                                <div class="item-stars">
                                    <div   title="0 out of 5 - based on 0 Reviews">
                                        @for($i = 0; $i < $product->rating; $i++)
                                            <i class="fa fa-star" style="color:orange"></i>
                                        @endfor
                                        @for($i = $product->rating; $i < 5; $i++)
                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                        @endfor
                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>

                                    </div>
                                </div>
                            </div>
                            <div class="price-template">
                                <div class="item-new-price">
                                    $
                                    @if($product->price_offer!=null && $product->price_offer>\Carbon\Carbon::now()->toDateString())

                                    {{ $product->price_offer }}

                                    @else

                                    {{ $product->price }}

                                    @endif
                                    
                                    
                                    .00
                                </div>
                                <div class="item-old-price">
                                    ${{ $product->price }}.00
                                </div>
                            </div>
                        </div>
                        <div style="background:rgb(251, 139, 214)" class="tag new">
                            <span>{{ __("messages.Offers") }}</span>
                        </div>
                        <div class="section-timing-wrapper dynamic">
                            <span class="fictitious-seconds" style="display:none;">{{ strtotime($product->end_offer_at)-time() }}</span>
                            <div class="section-box-wrapper box-days">
                                <div class="section-box">
                                    <span class="section-key">120</span>
                                    <span class="section-value">{{ __("messages.Days") }}</span>
                                </div>
                            </div>
                            <div class="section-box-wrapper box-hrs">
                                <div class="section-box">
                                    <span class="section-key">54</span>
                                    <span class="section-value">{{ __("messages.HRS") }}</span>
                                </div>
                            </div>
                            <div class="section-box-wrapper box-mins">
                                <div class="section-box">
                                    <span class="section-key">3</span>
                                    <span class="section-value">{{ __("messages.MINS") }}</span>
                                </div>
                            </div>
                            <div class="section-box-wrapper box-secs">
                                <div class="section-box">
                                    <span class="section-key">32</span>
                                    <span class="section-value">{{ __("messages.SEC") }}</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endforeach

                
                </div>
            </div>
            <!-- Carousel /- -->
        </div>
    </section>
    <!-- Men-Clothing-Timing-Section /- -->
    <!-- Banner-Image & View-more -->
    <div class="banner-image-view-more">
        <div class="container">
            <div class="image-banner u-s-m-y-40">
                <a href="" class="mx-auto banner-hover effect-dark-opacity">
                    <img loading="lazy" style="height:400px;width:100%" class="img-fluid" src="{{ asset("site2/images/site2/11.jpg") }}" alt="Banner Image">
                </a>
            </div>

        </div>
    </div>
    <!-- Banner-Image & View-more /- -->
    <!-- Men-Clothing /- -->
    <!-- Women-Clothing -->
    <!-- Toys-Hobbies-&-Robots -->
    <!-- Toys-Hobbies-&-Robots /- -->
    <!-- Mobiles-&-Tablets -->
    <!-- Consumer-Electronics -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3">{{ __("messages.Consumer Electronics") }}</h3>
                <span class="sec-maker-span-text u-s-m-b-8 d-block">{{ __("messages.Select products in specific category") }}</span>
            </div>
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="consumer-latest-products">
                            <div class="row align-items-center">
                                <div class="col-lg-1 col-md-12">
                                    <ul class="nav tab-nav-style-2-a">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#laptops" title="Laptops">
                                                <i class="ion ion-md-laptop"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#pc-and-accessories" title="PC & Accessories">
                                                <i class="ion ion-ios-settings"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tv" title="TV's">
                                                <i class="ion ion-md-tv"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#cam-corder" title="Camera & Camcorders">
                                                <i class="ion ion-md-camera"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#audio-amplifiers" title="Audio & Amplifiers">
                                                <i class="ion ion-md-microphone"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-11 col-md-12">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="laptops">
                                            <div class="slider-fouc">
                                                <div class="specific-category-slider owl-carousel" data-item="4">
                                                   
                                                    @foreach($laptop_found=\App\Models\product::where("numbers",">=",1)->where("department_id",find_id_Category("laptop"))->orderBy("number_selled")->paginate(8) as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                                <img loading="lazy" style="height:200px;width:100%" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                
                                                @if(auth("web")->user()!="")

                                                
                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @else

                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @endif
                                            
                                            
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">

                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                    <li class="has-separator">

                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>

                                                        @else

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>

                                                        @endif

                                                    </li>        
                                                    @endfor

                                                </ul>
                                                <h6 class="item-title">

                                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_ar }}</a>

                                                    @else

                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_en }}</a>

                                                    @endif

                                                </h6>
                                                <div class="item-stars">
                                                    <div   title="0 out of 5 - based on 0 Reviews">
                                                        @for($i = 0; $i < $product->rating; $i++)
                                                            <i class="fa fa-star" style="color:orange"></i>
                                                        @endfor
                                                        @for($i = $product->rating; $i < 5; $i++)
                                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                                        @endfor
                                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $
                                                    @if($product->price_offer!=null &&$product->end_offer_at>\Carbon\Carbon::now()->toDateString())

                                                    {{ $product->price_offer }}

                                                    @else

                                                    {{ $product->price }}

                                                    @endif
                                                    
                                                    
                                                    
                                                    .00
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $product->price }}.00
                                                </div>
                                            </div>
                                        </div>
                                        <div style="background:rgb(236, 250, 36)" class="tag new">
                                            <span>{{ __("messages.Rating") }}</span>
                                        </div>
                                        
                                    </div>
                                @endforeach

                                


                                                </div>
                                            </div>
                                            @if(count($laptop_found)==0)
                                            <div class="product-not-found">
                                                <div class="not-found">
                                                    <h2>{{ __("messages.SORRY!") }}</h2>
                                                    <h6>{{ __("messages.There is not any product in specific catalogue.") }}</h6>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="pc-and-accessories">
                                            <div class="slider-fouc">
                                                <div class="specific-category-slider owl-carousel" data-item="4">
                                                    @foreach($pc_found=\App\Models\product::where("numbers",">=",1)->where("department_id",find_id_Category("pc"))->orderBy("number_selled")->paginate(8) as $product)
                                                    <div class="item">
                                                        <div class="image-container">
                                                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                                                <img loading="lazy" style="height:200px;width:100%" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                                            </a>
                                                            <div class="item-action-behaviors">
                                                               
                                                                @if(auth("web")->user()!="")

                                                
                                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                
                                                                @else
                
                                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                
                                                                @endif
                                                            
                                                            </div>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="what-product-is">
                                                                <ul class="bread-crumb">
                
                                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                                    <li class="has-separator">

                                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>


                                                                        @else

                                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>


                                                                        @endif

                                                                    </li>        
                                                                    @endfor
                
                                                                </ul>
                                                                <h6 class="item-title">

                                                                    @if(LaravelLocalization::getCurrentLocale()=="ar")


                                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_ar }}</a>

                                                                    @else

                                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_en }}</a>

                                                                    @endif

                                                                </h6>
                                                                <div class="item-stars">
                                                                    <div   title="0 out of 5 - based on 0 Reviews">
                                                                        @for($i = 0; $i < $product->rating; $i++)
                                                                            <i class="fa fa-star" style="color:orange"></i>
                                                                        @endfor
                                                                        @for($i = $product->rating; $i < 5; $i++)
                                                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                                                        @endfor
                                                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>
                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-template">
                                                                <div class="item-new-price">
                                                                    $
                                                                    
                                                                    @if($product->price_offer!=null&& $product->end_offer_at > \Carbon\Carbon::now()->toDateString())


                                                                    {{ $product->price_offer }}

                                                                    @else

                                                                    {{ $product->price }}

                                                                    @endif
                                                                    
                                                                    .00
                                                                </div>
                                                                <div class="item-old-price">
                                                                    ${{ $product->price }}.00
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="background:rgb(236, 250, 36)" class="tag new">
                                                            <span>{{ __("messages.Rating") }}</span>
                                                        </div>
                                                        
                                                    </div>
                                                @endforeach
                
                                                
                                                </div>
                                            </div>
                                            <!-- Product Not Found -->
                                            @if(count($pc_found)==0)
                                            
                                            <div class="product-not-found">
                                                <div class="not-found">
                                                    <h2>{{ __("messages.SORRY!") }}</h2>
                                                    <h6>{{ __("messages.There is not any product in specific catalogue.") }}</h6>
                                                </div>
                                            </div>
                                            @endif
                                            <!-- Product Not Found /- -->
                                        </div>
                                        <div class="tab-pane fade" id="tv">
                                            <div class="slider-fouc">
                                                <div class="specific-category-slider owl-carousel" data-item="4">
                                                    
                                                    @foreach($tv_found=\App\Models\product::where("numbers",">=",1)->where("department_id",find_id_Category("tv"))->orderBy("number_selled")->paginate(8) as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                                <img loading="lazy" style="height:200px;width:100%" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                               
                                                @if(auth("web")->user()!="")

                                                
                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @else

                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>

                                                @endif
                                            
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">

                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                    <li class="has-separator">
                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>


                                                        @else

                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>

                                                        @endif

                                                    </li>        
                                                    @endfor

                                                </ul>
                                                <h6 class="item-title">

                                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_ar }}</a>

                                                    @else


                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_en }}</a>

                                                    @endif

                                                </h6>
                                                <div class="item-stars">
                                                    <div   title="0 out of 5 - based on 0 Reviews">
                                                        @for($i = 0; $i < $product->rating; $i++)
                                                            <i class="fa fa-star" style="color:orange"></i>
                                                        @endfor
                                                        @for($i = $product->rating; $i < 5; $i++)
                                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                                        @endfor
                                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $
                                                    @if($product->price_offer!=null&& $product->end_offer_at>\Carbon\Carbon::now()->toDateString())

                                                    {{ $product->price_offer }}

                                                    @else

                                                    {{ $product->price }}

                                                    @endif
                                                    
                                                    .00
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $product->price }}.00
                                                </div>
                                            </div>
                                        </div>
                                        <div style="background:rgb(236, 250, 36)" class="tag new">
                                            <span>{{ __("messages.Rating") }}</span>
                                        </div>
                                        
                                    </div>
                                @endforeach


                                                </div>
                                            </div>
                                            @if(count($tv_found)==0)
                                            <div class="product-not-found">
                                                <div class="not-found">
                                                    <h2>{{ __("messages.SORRY!") }}</h2>
                                                    <h6>{{ __("messages.There is not any product in specific catalogue.") }}</h6>
                                                </div>
                                            </div>
                                            @endif

                                        </div>



                                       
                                        <div class="tab-pane fade" id="cam-corder">
                                            <!-- Product Not Found -->


                                            <div class="slider-fouc">
                                                <div class="specific-category-slider owl-carousel" data-item="4">
                                           
                                                    @foreach($camera_found=\App\Models\product::where("numbers",">=",1)->where("department_id",find_id_Category("camera"))->orderBy("number_selled")->paginate(8) as $product)
                                                    <div class="item">
                                                        <div class="image-container">
                                                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                                                <img loading="lazy" style="height:200px;width:100%" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                                            </a>
                                                            <div class="item-action-behaviors">

                                                              
                                                                @if(auth("web")->user()!="")

                                                
                                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                
                                                                @else
                
                                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                
                                                                @endif
                                                            
                                                            </div>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="what-product-is">
                                                                <ul class="bread-crumb">
                
                                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                                    <li class="has-separator">

                                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>

                                                                        @else

                                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>

                                                                        @endif


                                                                    </li>        
                                                                    @endfor
                
                                                                </ul>
                                                                <h6 class="item-title">
                                                                    <a href="{{ route("product_detail",$product->id) }}">{{ $product->title }}</a>
                                                                </h6>
                                                                <div class="item-stars">
                                                                    <div   title="0 out of 5 - based on 0 Reviews">
                                                                        @for($i = 0; $i < $product->rating; $i++)
                                                                            <i class="fa fa-star" style="color:orange"></i>
                                                                        @endfor
                                                                        @for($i = $product->rating; $i < 5; $i++)
                                                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                                                        @endfor
                                                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>
                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-template">
                                                                <div class="item-new-price">
                                                                    $
                                                                    @if($product->price_offer!=null && $product->end_offer_at> \Carbon\Carbon::now()->toDateString())

                                                                    @else


                                                                    @endif
                                                                    
                                                                    .00
                                                                </div>
                                                                <div class="item-old-price">
                                                                    ${{ $product->price }}.00
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="background:rgb(236, 250, 36)" class="tag new">
                                                            <span>{{ __("messages.Rating") }}</span>
                                                        </div>
                                                        
                                                    </div>
                                                @endforeach
                
                


                                                </div>
                                            </div>


                                            @if(count($camera_found)==0)

                                            <div class="product-not-found">
                                                <div class="not-found">
                                                    <h2>{{ __("messages.SORRY!") }}</h2>
                                                    <h6>{{ __("messages.There is not any product in specific catalogue.") }}</h6>
                                                </div>
                                            </div>
                                            @endif
                                            <!-- Product Not Found /- -->
                                        </div>
                                        <div class="tab-pane fade" id="audio-amplifiers">
                                            <!-- Product Not Found -->


                                            <div class="slider-fouc">
                                                <div class="specific-category-slider owl-carousel" data-item="4">
                                           
                                                    @foreach($audio_found=\App\Models\product::where("numbers",">=",1)->where("department_id",find_id_Category("audio"))->orderBy("number_selled")->paginate(8) as $product)
                                                    <div class="item">
                                                        <div class="image-container">
                                                            <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                                                <img loading="lazy" style="height:200px;width:100%" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                                            </a>
                                                            <div class="item-action-behaviors">

                                                                @if(auth("web")->user()!="")

                                                
                                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                                <a href="javascript:void(0)" onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" class="item-addwishlist" >Add to Wishlist</a>
                                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                
                                                                @else
                
                                                                <a class="item-quick-look" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                                                                <a  href="{{ route("login_user") }}" class="item-addwishlist" >Add to Wishlist</a>
                                                                <a class="item-addCart" href="{{ route("product_detail",$product->id) }}" >Add to Cart</a>
                
                                                                @endif


                                                            </div>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="what-product-is">
                                                                <ul class="bread-crumb">
                
                                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                                    <li class="has-separator">

                                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>

                                                                        @else

                                                                        <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>

                                                                        @endif

                                                                    </li>        
                                                                    @endfor
                
                                                                </ul>
                                                                <h6 class="item-title">


                                                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                                        <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_ar }}</a>

                                                                        @else
                                                                        <a href="{{ route("product_detail",$product->id) }}">{{ $product->title_en }}</a>

                                                                        @endif

                                                                </h6>
                                                                <div class="item-stars">
                                                                    <div   title="0 out of 5 - based on 0 Reviews">
                                                                        @for($i = 0; $i < $product->rating; $i++)
                                                                            <i class="fa fa-star" style="color:orange"></i>
                                                                        @endfor
                                                                        @for($i = $product->rating; $i < 5; $i++)
                                                                            <i class="fa fa-star" style="color:rgba(195, 194, 194, 0.589)"></i>
                                                                        @endfor
                                                                    <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>
                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-template">
                                                                <div class="item-new-price">
                                                                    $
                                                                    @if($product->price_offer!=null&& $product->end_offer_at> \Carbon\Carbon::now()->toDateString())

                                                                    {{ $product->price_offer }}

                                                                    @else

                                                                    {{ $product->price }}

                                                                    @endif
                                                                    
                                                                    
                                                                    
                                                                    .00
                                                                </div>
                                                                <div class="item-old-price">
                                                                    ${{ $product->price }}.00
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="background:rgb(236, 250, 36)" class="tag new">
                                                            <span>{{ __("messages.Rating") }}</span>
                                                        </div>
                                                        
                                                    </div>
                                                @endforeach
                
                


                                                </div>
                                            </div>
                                            
                                            @if(count($audio_found)==0)
                                            <div class="product-not-found">
                                                <div class="not-found">
                                                    <h2>{{ __("messages.SORRY!") }}</h2>
                                                    <h6>{{ __("messages.There is not any product in specific catalogue.") }}</h6>
                                                </div>
                                            </div>
                                            @endif
                                            <!-- Product Not Found /- -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- Consumer-Electronics /- -->
    <!-- Books-&-Audible -->
    <!-- Books-&-Audible /- -->
    <!-- Continue-Link -->
    <div class="continue-link-wrapper u-s-p-b-80">
        <a class="continue-link" href="" title="View all products on site">
            <i class="ion ion-ios-more"></i>
        </a>
    </div>
    <!-- Continue-Link /- -->
    <!-- Brand-Slider -->
    <div class="brand-slider u-s-p-b-80">
        <div class="container">
            <div class="brand-slider-content owl-carousel" data-item="5">
                <div class="brand-pic">
                    <a href="#">
                        <img loading="lazy" src="{{ asset("site2/images/site2/7.jpg") }}" alt="Brand Logo 1">
                    </a>
                </div>
                <div class="brand-pic">
                    <a href="#">
                        <img loading="lazy" src="{{ asset("site2/images/site2/2.jpg") }}" alt="Brand Logo 2">
                    </a>
                </div>
                <div class="brand-pic">
                    <a href="#">
                        <img loading="lazy" src="{{ asset("site2/images/site2/9.jpg") }}" alt="Brand Logo 3">
                    </a>
                </div>
                <div class="brand-pic">
                    <a href="#">
                        <img loading="lazy" src="{{ asset("site2/images/site2/10.jpg") }}" alt="Brand Logo 5">
                    </a>
                </div>
                <div class="brand-pic">
                    <a href="#">
                        <img loading="lazy" src="{{ asset("site2/images/site2/11.jpg") }}" alt="Brand Logo 6">
                    </a>
                </div>
                <div class="brand-pic">
                    <a href="#">
                        <img loading="lazy" src="{{ asset("site2/images/site2/6.jpg") }}" alt="Brand Logo 7">
                    </a>
                </div>
                <div class="brand-pic">
                    <a href="#">
                        <img loading="lazy" src="{{ asset("site2/images/site2/5.jpg") }}" alt="Brand Logo 7">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand-Slider /- -->
    @include('site.include.box_info')
    @include("site.include.footer1")
    <!-- Dummy Selectbox -->
    <div class="select-dummy-wrapper">
        <select id="compute-select">
            <option id="compute-option">All</option>
        </select>
    </div>
   
@include("site.include.footer") 