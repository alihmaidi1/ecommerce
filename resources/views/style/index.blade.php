@include("style.layout.header")
@include("style.layout.navbar")
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->



{{-- @include("style.layout.carousel") --}}





<div class="promo-area " style="background: rgb(75, 75, 75)">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fas fa-sync-alt"></i>
                                        <p>{{ __("messages.30 Days return") }}</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>{{ __("messages.Cheap shipping") }}</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                    <p>{{ __("messages.Secure payments") }}</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>{{ __("messages.New products") }}</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

<div  style="background:rgb(0, 52, 129)" class="text-center w-100 ">
    <div >
        <div class="row">
      
            <ul class="nav justify-content-around rounded" style="font-weight:900;color:#fff">
                <li class=" p-1 nav-item btn "><a class="nav-link" style="font-weight:700 ;color:#fff" href="{{ route("show_style_user") }}">{{ __("messages.Home") }}</a></li>
                <li class=" p-1 nav-item"><a class="nav-link btn " style="font-weight:700 ;color:#fff" href="{{ route("show_order") }}">{{ __("messages.My Ordering") }}</a></li>
                <li class=" p-1 nav-item"><a class="nav-link btn " style="font-weight:700 ;color:#fff" href="{{ route("show_wishlist") }}">{{ __("messages.Wishlist") }}</a></li>
                <li class=" p-1 nav-item"><a class="nav-link btn " style="font-weight:700 ;color:#fff" href="{{ route("contact") }}">{{ __("messages.Contact") }}</a></li>
                <li class=" p-1 nav-item">
                    <a  class="nav-link btn  " style="position: relative;font-weight:700;color:#fff" href="{{ route("show_card") }}">{{ __("messages.Cart") }} - <span class="cart-amunt">
                        
                        
                        ${{ sum_price_cart(auth('web')->user()->id)+sum_shipping_cart(auth('web')->user()->id)+sum_tax_cart(auth("web")->user()->id)}}</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">{{ count(\App\Models\cart::where("user_id",auth('web')->user()->id)->get()) }}
                        
                        
                        </span></a>
                </li>
                
              </ul>

              
        </div>
    </div>
</div> <!-- End mainmenu area -->


<div class="maincontent-area " style="background:rgb(243, 240, 240);">
    <div class="container  ">
        <div class="row  ">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title  text-white rounded  text-center" style="background: rgb(0, 14, 9);cursor: pointer;">{{ __("messages.Latest Products") }}</h2>
                   
                   
                   
                   
                    <div class="product-carousel " >
                        
                        
@foreach($pagin1=\App\Models\product::orderBy("created_at","desc")->where("numbers",">",0)->paginate(5) as $product)
<div >
    <div class="product-o product-o--hover-on product-o--radius">
        <div class="product-o__wrap">

            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="">

                <img class="aspect__img" src="{{ asset('img/upload/product/'.$product->photo) }}" alt=""></a>
            <div class="product-o__action-wrap">
                <ul class="product-o__action-list">
                    <li>

                        <a href="{{ route("add_cart",[$product->id,auth('web')->user()->id]) }}" data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                    <li>

                        <a href="{{ route("add_heart",[$product->id,auth('web')->user()->id]) }}" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                    </ul>
            </div>
        </div>

        <span class="product-o__category">

            <a href="{{ route("show_product_detail",$product->id) }}">{{ $product->title }}</a></span>

        <span class="product-o__name">

            <a href=""></a></span>
        <div class="product-o__rating gl-rating-style">
            @for($i = 0; $i < $product->rating; $i++)
                <i class="fa fa-star"></i>
            @endfor
            @for($i = $product->rating; $i < 5; $i++)
                <i class="far fa-star"></i>
            @endfor
            <span class="product-o__review">({{ count(\App\Models\number_stars::where("product_id",$product->id)->where("user_id",auth('web')->user()->id)->get()) }}){{ __("messages.reveiw") }}</span></div>

            @if(!empty($product->price_offer)&&date("Y-m-d")>=$product->start_offer_at &&date("Y-m-d")<=$product->end_at)

            <span class="product-o__price">${{ $product->price_offer }}



                <span class="product-o__discount">${{ $product->price }}</span></span>
            @else
            <span class="product-o__price">${{ $product->price }}</span>

            @endif

    </div>
</div>

@endforeach




                        

                        
                    </div>
                    <br/>
                    <div style="width: 100%;display:flex;justify-content:center">{{ $pagin1->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->


<div class="product-widget-area " style="background:rgb(31, 44, 49)">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title text-white text-center">{{ __("messages.Top Sellers") }}</h2>

                    @foreach(\App\Models\product::orderBy("number_selled","desc")->where("numbers",">",0)->paginate(3) as $product)
                    <div class="single-wid-product rounded" style="border:1px solid rgba(100, 100, 100, 0.493);background:rgba(233, 229, 229, 0.911)">
                        <a href=""><img style="height:120px;width:120px" src={{ asset("img/upload/product/".$product->photo) }}  alt="" class="product-thumb"></a>
                        <h2><a href="" style="font-size: 11px;text-decoration:none;color:rgba(75, 75, 75, 0.356)">{{ $product->department->name }}</a></h2>
                        
                        <h2><a style="text-decoration:none;font-size:18px" href="{{ route("show_product_detail",$product->id) }}">{{ $product->title }}</a></h2>

                        <div class="product-wid-rating">
                            @for($i = 0; $i < $product->rating; $i++)
                            <i class="fa fa-star"></i>
                                
                            @endfor
                            @for($i = $product->rating; $i < 5; $i++)
                            <i class="far fa-star"></i>
                                
                            @endfor

                        </div>
                        <div class="product-wid-price">
                          @if(!$product->price_offer==null &&date("Y-m-d")>=$product->start_offer_at&&date("Y-m-d")>=$product->end_offer_at)
                          <ins style="color:#000">${{ $product->price_offer }}</ins> 
                          <del style="color: red;font-weight:700">${{ $product->price }}</del> 

                          @else
                          <ins style="color:#000">${{ $product->price }}</ins> 


                          @endif
                        </div>  
                             
                    </div>
                    

                    @endforeach
                    

                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title text-white text-center">{{ __("messages.The Cheappest") }}</h2>

                    @foreach(\App\Models\product::orderBy("price","desc")->where("numbers",">",0)->paginate(3) as $product)
                    <div class="single-wid-product rounded" style="border:1px solid rgba(100, 100, 100, 0.493) ;background:rgba(233, 229, 229, 0.911)">
                        <a href=""><img style="height:120px;width:120px" src={{ asset("img/upload/product/".$product->photo) }}  alt="" class="product-thumb"></a>
                        <h2><a href="" style="font-size: 11px;text-decoration:none;color:rgba(75, 75, 75, 0.356)">{{ $product->department->name }}</a></h2>
                        
                        <h2><a style="text-decoration:none;font-size:18px" href="{{ route("show_product_detail",$product->id) }}">{{ $product->title }}</a></h2>

                        <div class="product-wid-rating">
                            @for($i = 0; $i < $product->rating; $i++)
                            <i class="fa fa-star"></i>
                                
                            @endfor
                            @for($i = $product->rating; $i < 5; $i++)
                            <i class="far fa-star"></i>
                                
                            @endfor

                        </div>
                        <div class="product-wid-price">
                            
                          @if(!$product->price_offer==null &&date("Y-m-d")>=$product->start_offer_at&&date("Y-m-d")>=$product->end_offer_at)
                          <ins style="color:#000">${{ $product->price_offer }}</ins> 
                          <del style="color: red;font-weight:700">${{ $product->price }}</del> 

                          @else
                          <ins style="color:#000">${{ $product->price }}</ins> 

                          @endif
                            
                        </div>  
                             
                    </div>
                    

                    @endforeach
                    

                </div>
            </div>




            <div class="col-md-6 col-lg-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title text-white text-center">{{ __("messages.Recently Viewed") }}</h2>

                    @foreach(\App\Models\product::orderBy("created_at","desc")->where("numbers",">",0)->paginate(3) as $product)
                    <div class="single-wid-product rounded" style="border:1px solid rgba(100, 100, 100, 0.493);background:rgba(233, 229, 229, 0.911)">
                        <a href=""><img style="height:120px;width:120px" src={{ asset("img/upload/product/".$product->photo) }}  alt="" class="product-thumb"></a>
                        <h2><a href="" style="font-size: 11px;text-decoration:none;color:rgba(75, 75, 75, 0.356)">{{ $product->department->name }}</a></h2>
                        
                        <h2><a style="text-decoration:none;font-size:18px" href="{{ route("show_product_detail",$product->id) }}">{{ $product->title }}</a></h2>

                        <div class="product-wid-rating">
                            @for($i = 0; $i < $product->rating; $i++)
                            <i class="fa fa-star"></i>
                                
                            @endfor
                            @for($i = $product->rating; $i < 5; $i++)
                            <i class="far fa-star"></i>
                                
                            @endfor

                        </div>
                        <div class="product-wid-price">
                          @if(!$product->price_offer==null &&date("Y-m-d")>=$product->start_offer_at&&date("Y-m-d")>=$product->end_offer_at)

                          <ins style="color:#000">${{ $product->price_offer }}</ins> 
                          <del style="color: red;font-weight:700">${{ $product->price }}</del> 
                          @else

                          <ins style="color:#000">${{ $product->price }}</ins> 

                        @endif
                          
                        </div>  
                             
                    </div>
                    

                    @endforeach
                    

                </div>
            </div>
            
        </div>
    </div>
</div> <!-- End product widget area -->

<!-- Latest jQuery form server -->

@include("style.layout.footer1")
@include("style.layout.footer")
