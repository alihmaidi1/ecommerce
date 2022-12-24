@include("site.include.header")
@include("site.include.navbar")

<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>{{ __("messages.Shop") }}</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.Shop") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>




<form method="POST" action="{{ route("filter_product") }}">
<div class="page-shop u-s-p-t-80">
    <div class="container">
        <!-- Shop-Intro -->
        <div class="shop-intro">
            <ul class="bread-crumb">
                <li class="has-separator">
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>

                <li class="is-marked">
                    <a href="">{{ __("messages.Tops") }}</a>
                </li>
            </ul>
        </div>
        <!-- Shop-Intro /- -->
        <div class="row">
            <!-- Shop-Left-Side-Bar-Wrapper -->
            <div class="col-lg-3 col-md-3 col-sm-12">
                    @csrf
                <!-- Fetch-Categories-from-Root-Category  -->
                <div class="fetch-categories">
                    <h3 class="title-name">{{ __("messages.Browse Categories") }}</h3>
                    <h3 class="fetch-mark-category">
                        <a href="">{{ __("messages.Tops") }}
                            <span class="total-fetch-items">({{ count(\App\models\category::get()) }})</span>
                        </a>
                    </h3>
                    <!-- Level 3 -->
                    <ul>
                        <div class="associate-wrapper">
                            <div class="d-none">
                                <input type="checkbox" checked name="department_id[]" value="0" class="check-box " id="department_filter-0">
                                <label class="label-text" for="department_filter-0">
                                    <span class="total-fetch-items">()</span>
                                </label>
                            </div>      

                        @foreach(\App\Models\category::get() as $department)
                        <div>
                            <input type="checkbox" name="department_id[]" value="{{ $department->id }}" class="check-box" id="department_filter-{{ $loop->iteration }}">
                            @if(LaravelLocalization::getCurrentLocale()=="ar")

                            <label class="label-text" for="department_filter-{{ $loop->iteration }}">{{ $department->name_ar }}
                                <span class="total-fetch-items">({{ count(\App\Models\product::where("numbers",">=",1)->where("department_id",$department->id)->get()) }})</span>
                            </label>
                            @else

                            <label class="label-text" for="department_filter-{{ $loop->iteration }}">{{ $department->name_en }}
                                <span class="total-fetch-items">({{ count(\App\Models\product::where("numbers",">=",1)->where("department_id",$department->id)->get()) }})</span>
                            </label>

                            @endif


                        </div>
                       
                        @endforeach
                    </div>

                    </ul>
                    <!-- //end Level 3 -->
                </div>
                <!-- Fetch-Categories-from-Root-Category  /- -->
                <!-- Filters -->
                <!-- Filter-Size -->
                <div class="facet-filter-associates">
                    <h3 class="title-name">{{ __("messages.Size") }}</h3>
                        <div class="associate-wrapper">
                            <div class="d-none">
                                <input type="checkbox" checked name="size_id[]" value="0" class="check-box " id="size_filter-0">
                                <label class="label-text" for="size_filter-0">
                                    <span class="total-fetch-items">()</span>
                                </label>
                            </div>      
                            

                            @foreach(\App\Models\size::get() as $size)
                            <input type="checkbox" name="size_id[]" value="{{ $size->id }}" class="check-box" id="size_filter-{{ $loop->iteration }}">
                           
                            @if(LaravelLocalization::getCurrentLocale()=="ar")

                            <label class="label-text" for="size_filter-{{ $loop->iteration }}">{{ $size->name_ar }}
                                <span class="total-fetch-items">({{ count(\App\Models\size_product::where("size_id",$size->id)->get()) }})</span>
                            </label>
                           
                            @else

                            <label class="label-text" for="size_filter-{{ $loop->iteration }}">{{ $size->name_en }}
                                <span class="total-fetch-items">({{ count(\App\Models\size_product::where("size_id",$size->id)->get()) }})</span>
                            </label>
                           
                            @endif
                           
                            @endforeach
                        </div>
                </div>
                <!-- Filter-Size -->
                <!-- Filter-Color -->
                <div cla    ss="facet-filter-associates">
                    <h3 class="title-name">{{ __("messages.Color") }}</h3>
                        <div class="associate-wrapper">
                            <div class="d-none">
                                <input type="checkbox" checked name="color_id[]" value="0" class="check-box " id="color_filter-0">
                                <label class="label-text" for="color_filter-0">
                                    <span class="total-fetch-items">()</span>
                                </label>
                            </div>      
                            
                            @foreach(\App\Models\color::get() as $color)
                            <div>
                            <input type="checkbox" name="color_id[]" value="{{ $color->id }}" class="check-box" id="color_filter-{{ $loop->iteration }}">
                            @if(LaravelLocalization::getCurrentLocale()=="ar")

                            <label class="label-text" for="color_filter-{{ $loop->iteration }}">{{ $color->name_ar }}
                                <span class="total-fetch-items">({{ count(\App\Models\color_product::where("color_id",$color->id)->get()) }})</span>
                            </label>
                            @else

                            <label class="label-text" for="color_filter-{{ $loop->iteration }}">{{ $color->name_en }}
                                <span class="total-fetch-items">({{ count(\App\Models\color_product::where("color_id",$color->id)->get()) }})</span>
                            </label>
                            @endif


                            </div>
                            @endforeach
                        </div>
                </div>
                <!-- Filter-Color /- -->
                <!-- Filter-Price -->
                <div class="facet-filter-by-shipping">
                    <h3 class="title-name">{{ __("messages.Shipping") }}</h3>
                        <input type="checkbox" name="shipping" value="0" class="check-box" id="cb-free-ship">
                        <label class="label-text" for="cb-free-ship">{{ __("messages.Free Shipping") }}</label>
                </div>
                <div class="facet-filter-by-price">

                        <!-- Range-Manipulator /- -->
                        <br/>
                        <button type="submit" class="button w-100 button-primary">{{ __("messages.Filter") }}</button>
                </div>
                <!-- Filter-Price /- -->
                <!-- Filter-Free-Shipping -->

                <!-- Filter-Free-Shipping /- -->
                <!-- Filter-Rating -->
                <div class="facet-filter-by-rating">
                    <h3 class="title-name">{{ __("messages.Rating") }}</h3>
                    <div class="facet-form">
                        <!-- 5 Stars -->
                        <div class="facet-link">
                            <div class="item-stars">
                                <div class='star'>
                                    <span style='width:76px'></span>
                                </div>
                            </div>
                            <span class="total-fetch-items">({{ count(\App\Models\product::where("rating",5)->get()) }})</span>
                        </div>
                        <!-- 5 Stars /- -->
                        <!-- 4 & Up Stars -->
                        <div class="facet-link">
                            <div class="item-stars">
                                <div class='star'>
                                    <span style='width:60px'></span>
                                </div>
                            </div>
                            <span class="total-fetch-items">{{ __("messages.& Up") }} ({{ count(\App\Models\product::where("rating",">=",4)->get()) }})</span>
                        </div>
                        <!-- 4 & Up Stars /- -->
                        <!-- 3 & Up Stars -->
                        <div class="facet-link">
                            <div class="item-stars">
                                <div class='star'>
                                    <span style='width:45px'></span>
                                </div>
                            </div>
                            <span class="total-fetch-items">{{ __("messages.& Up") }} ({{ count(\App\Models\product::where("rating",">=",3)->get()) }})</span>
                        </div>
                        <!-- 3 & Up Stars /- -->
                        <!-- 2 & Up Stars -->
                        <div class="facet-link">
                            <div class="item-stars">
                                <div class='star'>
                                    <span style='width:30px'></span>
                                </div>
                            </div>
                            <span class="total-fetch-items">{{ __("messages.& Up") }} ({{ count(\App\Models\product::where("rating",">=",2)->get()) }})</span>
                        </div>
                        <!-- 2 & Up Stars /- -->
                        <!-- 1 & Up Stars -->
                        <div class="facet-link">
                            <div class="item-stars">
                                <div class='star'>
                                    <span style='width:15px'></span>
                                </div>
                            </div>
                            <span class="total-fetch-items">{{ __("messages.& Up") }} ({{ count(\App\Models\product::where("rating",">=",1)->get()) }})</span>
                        </div>
                        <!-- 1 & Up Stars /- -->
                    </div>
                </div>
                <!-- Filter-Rating -->
                <!-- Filters /- -->
            </div>
            <!-- Shop-Left-Side-Bar-Wrapper /- -->
            <!-- Shop-Right-Wrapper -->
            <div class="col-lg-9 col-md-9 col-sm-12">
                <!-- Page-Bar -->
                <div class="page-bar clearfix">
                    <div class="shop-settings">

                        <a id="grid-anchor">
                            <i class="fas fa-th"></i>
                        </a>
                    </div>
                    <!-- Toolbar Sorter 1  -->
                    <div class="toolbar-sorter ">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="sort-by">{{ __("messages.Sort By") }}</label>
                            <select name="order_by" class="select-box" id="sort-by">
                                <option selected="selected" value="0">{{ __("messages.Sort By: Best Selling") }}</option>
                                <option value="1">{{ __("messages.Sort By: Latest") }}</option>
                                <option value="2">{{ __("messages.Sort By: Lowest Price") }}</option>
                                <option value="3">{{ __("messages.Sort By: Highest Price") }}</option>
                                <option value="4">{{ __("messages.Sort By: Best Rating") }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- //end Toolbar Sorter 1  -->
                    <!-- Toolbar Sorter 2  -->
                    <div class="toolbar-sorter-2">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="show-records">{{ ("messages.Show Records Per Page") }}</label>
                            <select name="pagin" class="select-box" id="show-records">
                                <option selected="selected" value="8">{{ __("messages.Show: 8") }}</option>
                                <option value="16">{{ __("messages.Show: 16") }}</option>
                                <option value="28">{{ __("messages.Show: 28") }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- //end Toolbar Sorter 2  -->
                </div>
                <!-- Page-Bar /- -->
                <!-- Row-of-Product-Container -->
                <div class="row product-container  grid-style">
                    
                    @foreach($products as $product)
                    <div class="product-item col-lg-4  col-md-6 col-sm-6">
                        <div class="item w-100">
                            <div class="image-container">
                                <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                                    <img loading= style="height: 220px" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
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
                                    <div class="item-description">

                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                        <p>{{ $product->content_ar }}</p>

                                        @else

                                        <p>{{ $product->content_en }}</p>


                                        @endif

                                    </div>
                                    <div class="item-stars">

                                        @for($i = 0; $i < $product->rating; $i++)
                                            <i class="fa fa-star" style="color:orange"></i>
                                        @endfor

                                        @for($i = $product->rating; $i < 5; $i++)
                                            <i class="fa fa-star" style="color:rgb(228, 226, 222)"></i>
                                        @endfor

                                        <span>({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>
                                    </div>
                                </div>
                                <div class="price-template">
                                    <div class="item-new-price">
                                        $
                                        @if($product->price_offer!=""&& $product->end_offer_at> \Carbon\Carbon::now()->toDateString())

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

                        </div>
                    </div>
                    
                    @endforeach



                </div>
                <!-- Row-of-Product-Container /- -->
            </div>
            <!-- Shop-Right-Wrapper /- -->
        </div>
    </div>
</div>
</form>
<!-- Shop-Page /- -->



@include("site.include.footer1")
@include("site.include.footer")
