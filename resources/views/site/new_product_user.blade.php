@include("site.include.header")
@include("site.include.navbar")
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>{{ __("messages.About") }}</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.My New Product") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>



<div class="page-deal u-s-p-t-80">
    <div class="container">
        <div class="deal-page-wrapper">
            <h1 class="deal-heading">{{ __("messages.See Product") }}</h1>
            <h6 class="deal-has-total-items">{{ count(\App\Models\product::where("numbers",">=",1)->get()) }} {{ __("messages.Items") }}</h6>
        </div>
        <!-- Page-Bar -->
        <div class="page-bar clearfix">
            <div class="shop-settings">
                <a id="list-anchor">
                    <i class="fas fa-th-list"></i>
                </a>
                <a id="grid-anchor" class="active">
                    <i class="fas fa-th"></i>
                </a>
            </div>
            <!-- Toolbar Sorter 1  -->
            <div class="toolbar-sorter">
                <div class="select-box-wrapper">
                    <label class="sr-only" for="sort-by">{{ __("messages.Sort By") }}</label>
                    <select id="sort_by_new_product" onchange="sort_new_order()" name="order_by" class="select-box" >
                        <option value="0">{{ __("messages.Sort By: Best Selling") }}</option>
                        <option value="1">{{ __("messages.Sort By: Lowest Price") }}</option>
                        <option value="2">{{ __("messages.Sort By: Highest Price") }}</option>
                        <option value="3">{{ __("messages.Sort By: Best Rating") }}</option>
                        <option value="4">{{ __("messages.Sort By: Lasted") }}</option>
                    </select>
                </div>
            </div>
            <!-- //end Toolbar Sorter 1  -->
            <!-- Toolbar Sorter 2  -->
            <div class="toolbar-sorter-2">
                <div class="select-box-wrapper">
                    <label class="sr-only" for="show-records">{{ __("messages.Show Records Per Page") }}</label>
                    <select id="show_new_product23" onchange="sort_new_order()" name="pagin" class="select-box" >
                        <option value="8">{{ __("messages.Show: 8") }}</option>
                        <option value="16">{{ __("messages.Show: 16") }}</option>
                        <option value="28">{{ __("messages.Show: 28") }}</option>
                    </select>
                </div>
            </div>
            <!-- //end Toolbar Sorter 2  -->
        </div>
        <!-- Page-Bar /- -->
        <!-- Row-of-Product-Container -->
        <div id="product_loop" class="row product-container grid-style">
            
            @foreach($products as $product)
                
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
                <div class="item w-100">
                    <div class="image-container">
                        <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                            <img loading="lazy" style="height:200px" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
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
                               @for($i = $product->department; $i != null; $i=$i->department_parent)
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
                            <div class="item-description">
                                @if(LaravelLocalization::getCurrentLocale()=="ar")

                                <p>{{ $product->content_ar }}</p>
                                @else

                                <p>{{ $product->content_en }}</p>


                                @endif

                            </div>
                            <div class="item-stars">
                                @for($i = 0; $i < $product->rating; $i++)
                                    <i class="fa fa-star" style="color: orange"></i>
                                @endfor
                                @for($i = $product->rating; $i < 5; $i++)
                                    <i class="fa fa-star" style="color: rgb(228, 226, 222)"></i>
                                @endfor
                                <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>
                            </div>
                        </div>
                        <div class="price-template">
                            <div class="item-new-price">
                                $
                                
                                @if($product->price_offer!=""&&$product->end_offer_at> \Carbon\Carbon::now()->toDateString())
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
            </div>
            





            @endforeach

        </div>
        <div id="pagin_link_new_product" class="d-flex justify-content-center m-auto">{{ $products->links() }}</div>
        <!-- Row-of-Product-Container /- -->
        
    </div>
</div>





@include("site.include.footer1")

@include("site.include.footer")
