@include("site.include.header")
@include("site.include.navbar")

<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>{{ __("messages.Detail") }}</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.Detail") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="page-detail u-s-p-t-80">
    <div class="container">
        <!-- Product-Detail -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Product-zoom-area -->
                <div class="zoom-area">
                    <img loading="lazy" id="zoom-pro" loading="lazy" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" data-zoom-image="{{ asset("img/upload/product/".$product->photo) }}" alt="Zoom Image">
                    <div id="gallery" class="u-s-m-t-10">
                        @foreach(\App\Models\img::where("product_id",$product->id)->get() as $img)
                        <a class="@if($loop->iteration==1) active @endif" data-image="{{  asset("img/upload/product/".$img->name)}}" data-zoom-image="{{ asset("img/upload/product/".$img->name) }}">
                            <img loading="lazy" style="height: 100%" src="{{ asset("img/upload/product/".$img->name) }}" alt="Product">
                        </a>
                        @endforeach
                        
                    </div>
                </div>
                <!-- Product-zoom-area /- -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Product-details -->
                <form method="post" action="{{ route("add_cart") }}">
                @csrf
                @if(auth("web")->user()!="")
                <input type="hidden" name="user_id" value="{{ auth("web")->user()->id }}"/>
                @endif
                <input type="hidden" value="{{ $product->id }}" name="product_id" />
                <div class="all-information-wrapper">
                    <div class="section-1-title-breadcrumb-rating">
                        <div class="product-title">
                            <h1>
                                @if(LaravelLocalization::getCurrentLocale()=="ar")

                                <a href="">{{ $product->title_ar }}</a>
                                
                                @else

                                <a href="">{{ $product->title_en }}</a>

                                @endif
                            </h1>
                        </div>
                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                            </li>
                            @for($i = \App\Models\category::find($product->department->id); $i !=null; $i=$i->department_parent)
                            <li class="has-separator">
                                @if(LaravelLocalization::getCurrentLocale()=="ar")

                                <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_ar }}</a>
                                
                                @else

                                <a href="{{ route("show_single_department",$i->id) }}">{{ $i->name_en }}</a>

                                @endif
                            </li>
                                
                            @endfor
                        </ul>
                        <div class="product-rating">
                            <div id="title_review_count" title="4 out of 5 - based on 23 Reviews">
                                @for($i = 0; $i < $product->rating; $i++)
                                    <i class="fa fa-star" style="color:orange"></i>
                                @endfor
                                @for($i = $product->rating; $i < 5; $i++)
                                    <i class="fa fa-star" style="color: rgb(194, 187, 180)"></i>
                                @endfor
                            <span id="sum_review1">({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }})</span>

                            </div>
                        </div>
                    </div>
                    <div class="section-2-short-description u-s-p-y-14">
                        <h6 class="information-heading u-s-m-b-8">Description:</h6>
                        <p>

                            @if(LaravelLocalization::getCurrentLocale()=="ar")

                            {{ $product->content_ar }}


                            @else

                            {{ $product->content_en }}

                            @endif

                        </p>
                    </div>
                    <div class="section-3-price-original-discount u-s-p-y-14">
                        <div class="price">
                            <h4>$ 
                                
                                @if($product->price_offer!=null && $product->end_offer_at> \Carbon\Carbon::now()->toDateString())

                                {{ $product->price_offer }}

                                @else

                                {{ $product->price }}


                                @endif

                                
                                .00</h4>
                        </div>
                        <div class="original-price">
                            <span>{{ __("messages.Original Price:") }}</span>
                            <span>${{ $product->price }}.00</span>
                        </div>
                        <div class="discount-price">
                            <span>{{ __("messages.Shipping:") }}</span>
                            <span>${{ $product->shipping }}.00</span>
                        </div>
                        <div class="total-save">
                            <span>{{ __("messages.tax:") }}</span>
                            <span>${{ $product->tax }}.00</span>
                        </div>
                    </div>
                    <div class="section-4-sku-information u-s-p-y-14">
                        <h6 class="information-heading u-s-m-b-8">{{ __("messages.Sku Information:") }}</h6>
                        <div class="availability">
                            <span>{{ __("messages.Availability:") }}</span>
                            <span>{{ __("messages.In Stock") }}</span>
                        </div>
                        <div class="left">
                            <span>{{ __("messages.Only:") }}</span>
                            <span>{{ $product->numbers }} {{ __("messages.left") }}</span>
                        </div>
                    </div>
                    <div class="section-5-product-variants u-s-p-y-14">
                        <h6 class="information-heading u-s-m-b-8">{{ __("messages.Product Variants:") }}</h6>
                        <div class="color u-s-m-b-11">
                            <span>{{ __("messages.Available Color:") }}</span>
                            <div class="color-variant select-box-wrapper">
                                <select name="color_id" class="select-box product-color">
                                    @foreach($product->color as $color_product)

                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                    <option value="{{ $color_product->id }}">{{ $color_product->name_ar }}</option>
                                    @else
                                    <option value="{{ $color_product->id }}">{{ $color_product->name_en }}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="sizes u-s-m-b-11">
                            <span>{{ __("messages.Available Size:") }}</span>
                            <div class="size-variant select-box-wrapper">
                                <select name="size_id" class="select-box product-size">
                                    @foreach($product->sizes as $size)

                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                    <option value="{{ $size->id }}">{{ $size->name_ar }}</option>

                                    @else

                                    <option value="{{ $size->id }}">{{ $size->name_en }}</option>

                                    @endif


                                    @endforeach
                                 
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                            <div class="quantity-wrapper u-s-m-b-22">
                                <span>{{ __("messages.Quantity:") }}</span>
                                <div class="quantity">
                                    <input type="text" name="quantity" readonly class="quantity-text-field"  value="1">
                                    <a class="plus-a" data-max="{{ $product->numbers }}">&#43;</a>
                                    <a class="minus-a" data-min="1">&#45;</a>
                                </div>
                            </div>
                            <div>

                                @if(auth("web")->user()!="")

                                <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                <a onclick="add_wishlist_ajax({{ $product->id }},{{ auth("web")->user()->id }})" href="javascript:void(0)" class="button button-outline-secondary far fa-heart u-s-m-l-6"></a>
                                @else

                                <a href="{{ route("login_user") }}" class="button button-outline-secondary" >Add to cart</a>
                                <a href="{{ route("login_user") }}" class="button button-outline-secondary far fa-heart u-s-m-l-6"></a>
                                @endif
                                
                            </div>
                    </div>
                </div>
                </form>
                <!-- Product-details /- -->
            </div>
        </div>
        <br/>
        <hr/>
        <!-- Product-Detail /- -->
        <div class="tab-pane " id="review">
            <div class="review-whole-container">
                <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                    <div class="col-lg-6 col-md-6">
                        <div class="total-score-wrapper">
                            <h6 class="review-h6">{{ __("messages.Average Rating") }}</h6>
                            <div class="circle-wrapper">
                                <h1 id="avg_review1">{{ round(avg_star(\App\Models\number_stars::where("product_id",$product->id)->get()),2)  }}</h1>
                            </div>
                            <h6  class="review-h6">{{ __("messages.Based on") }} <span id="sum_review3">{{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }}</span> {{ __("messages.Reviews") }}</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="total-star-meter">
                            <div class="star-wrapper">
                                <span>{{ __("messages.5 Stars") }}</span>
                                <div class="star">
                                    <span style='width:100%'></span>
                                </div>
                                <span id="star_5">({{ count(\App\Models\number_stars::where("product_id",$product->id)->where("rating",5)->get()) }})</span>
                            </div>
                            <div class="star-wrapper">
                                <span>{{ __("messages.4 Stars") }}</span>
                                <div class="star">
                                    <span style='width:80%'></span>
                                </div>
                                <span id="star_4">({{ count(\App\Models\number_stars::where("product_id",$product->id)->where("rating",4)->get()) }})</span>
                            </div>
                            <div class="star-wrapper">
                                <span>{{ __("messages.3 Stars") }}</span>
                                <div class="star">
                                    <span style='width:60%'></span>
                                </div>
                                <span id="star_3">({{ count(\App\Models\number_stars::where("product_id",$product->id)->where("rating",3)->get()) }})</span>
                            </div>
                            <div class="star-wrapper">
                                <span>{{ __("messages.2 Stars") }}</span>
                                <div class="star">
                                    <span style='width:40%'></span>
                                </div>
                                <span id="star_2">({{ count(\App\Models\number_stars::where("product_id",$product->id)->where("rating",2)->get()) }})</span>
                            </div>
                            <div class="star-wrapper">
                                <span>{{ __("messages.1 Star") }}</span>
                                <div class="star">
                                    <span style='width:20%'></span>
                                </div>
                                <span id="star_1">({{ count(\App\Models\number_stars::where("product_id",$product->id)->where("rating",1)->get()) }})</span>
                            </div>
                        </div>
                    </div>
                </div>
                    <input value="{{ $product->id }}" id="product_id" type="hidden"  name="product_id"/>
                <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                    <div class="col-lg-12">
                        <div class="your-rating-wrapper">
                            <h6 class="review-h6">{{ __("messages.Your Review is matter.") }}</h6>
                            <h6 class="review-h6">{{ __("messages.Have you used this product before?") }}</h6>
                            <div class="star-wrapper u-s-m-b-8">
                                <div class="star">
                                    <span id="your-stars" style='width:0'></span>
                                </div>
                                <label for="rate_value"></label>
                                <input id="rate_value"  type="text" name="rating" class=" text-field" placeholder="0.0">
                                <span id="star-comment"></span>
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong id="message_rate_value"></strong>
                                </span>
                            </div>
                            
                                <label for="your_name">{{ __("messages.Name") }}
                                    <span class="astk"> *</span>
                                </label>
                                <input id="your_name" name="name" type="text"  class=" text-field" placeholder="{{ __("messages.Your Name") }}">
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong id="message_your_name"></strong>
                                </span>
                                <br/>
                
                                <label for="your_email">{{ __("messages.Email") }}
                                    <span class="astk"> *</span>
                                </label>
                                <input id="your_email" name="email"  type="text" class=" text-field" placeholder="{{ __("messages.Your Email") }}">
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong id="message_your_email"></strong>
                                </span>
                                <br/>
                                <label for="review_title">{{ __("messages.Review Title") }}
                                    <span class="astk"> *</span>
                                </label>
                                <input id="review_title" type="text"  name="title" class=" text-field" placeholder="{{ __("messages.Review Title") }}">
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong id="message_review_title"></strong>
                                </span>
                                <br/>
                                <label for="review">{{ __("messages.Review") }}
                                    <span class="astk"> *</span>
                                </label>
                                <textarea id="review12" class=" text-area u-s-m-b-8" name="review"  placeholder="{{ __("messages.Review") }}">{{ @old('review') }}</textarea>
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong id="message_review"></strong>
                                </span>
                                <br/>
                                <br/>
                                <a onclick="add_review_ajax()" class="button button-outline-secondary">{{ __("messages.Submit Review") }}</a>
                        </div>
                    </div>
                </div>
                <!-- Get-Reviews -->
                <div class="get-reviews u-s-p-b-22">
                    <!-- Review-Options -->
                    <div class="review-options u-s-m-b-16">
                        <div class="review-option-heading">
                            <h6>{{ __("messages.Reviews") }}
                                <span id="sum_review5"> ({{ count(\App\Models\number_stars::where("product_id",$product->id)->get()) }}) </span>
                            </h6>
                        </div>
                        <div class="review-option-box">

                            <div class="select-box-wrapper">
                                <input id="product_id3" type="hidden" value="{{ $product->id }}" name="product_id"/>
                                <label class="sr-only" for="review-sort">{{ __("messages.Review Sorter") }}</label>
                                <select onchange="sort_by_review()" id="select_sort" name="sort_by" class="select-box" id="review-sort">
                                    <option value="0">{{ __("messages.Sort by: Best Rating") }}</option>
                                    <option value="1">{{ __("messages.Sort by: Worst Rating") }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Review-Options /- -->
                    <!-- All-Reviews -->
                    <div id="show_review1" class="reviewers">
                        
                        @foreach($reviews as $review1)
                          
                        <div class="review-data">
                            <div class="reviewer-name-and-date">
                                <h6 class="reviewer-name">{{ $review1->name }}</h6>
                                <h6 class="review-posted-date">{{ $review1->created_at }}</h6>
                            </div>
                            <div class="reviewer-stars-title-body">
                                <div class="reviewer-stars">
                                    <div class="star">
                                        <span style="width:{{ $review1->rating*20 }}%"></span>
                                    </div>
                                    <span class="review-title">
                                    
                                        @if($review1->rating>4)
                                        {{ __("messages.! Amazing") }}                                        
                                        @elseif($review1->rating>3)

                                        {{ __("messages.! I Like it") }}
                                        @elseif($review1->rating>2)

                                        {{ __("messages.! Good") }}
                                        @elseif($review1->rating>1)
                                        {{ __("messages.! Not Bad") }}
                                        @else
                                        {{ __("messages.! Bad") }}
                                        @endif
                                    </span>
                                </div>
                                <p class="review-body">
                                    {{ $review1->title }}
                                </p>
                            </div>
                        </div>
                        


                        @endforeach
                        @empty($review1)
                        <h2 class="text-center button" style="font-weight: 800">{{ __("messages.the Product Don't Have Any Rating") }}</h2>
                            
                        @endempty
                        




                    </div>
                    <!-- All-Reviews /- -->
                    <!-- Pagination-Review -->
                    <br/>
                    <div id="pagin_review1" class="m-auto d-flex justify-content-center"> {{ $reviews->links() }}</div>
                    <!-- Pagination-Review /- -->
                </div>
                <!-- Get-Reviews /- -->
            </div>
        </div>
        <!-- Different-Product-Section -->
        <div class="detail-different-product-section u-s-p-t-80">
            <!-- Similar-Products -->
            <section class="section-maker">
                <div class="container">
                    <div class="sec-maker-header text-center">
                        <h3 class="sec-maker-h3">{{ __("messages.Similar Products") }}</h3>
                    </div>
                    <div class="slider-fouc">
                        <div class="products-slider owl-carousel" data-item="4">
                            @foreach($audio_found=\App\Models\product::where("department_id",$product->department->id)->paginate(4) as $product)
                                                    <div class="item">
                                                        <div class="image-container">
                                                            <a class="item-img-wrapper-link" href="single-product.html">
                                                                <img style="height:200px;width:300px" class="img-fluid" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
                                                            </a>
                                                            <div class="item-action-behaviors">
                                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                                </a>
                
                                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="what-product-is">
                                                                <ul class="bread-crumb">
                
                                                                    @for($i = $product->department; $i !=null; $i=$i->department_parent)
                                                                    <li class="has-separator">
                                                                        <a href="shop-v1-root-category.html">{{ $i->name }}</a>
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
                                                                    ${{ $product->price_offer }}.00
                                                                </div>
                                                                <div class="item-old-price">
                                                                    ${{ $product->price }}.00
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="background:rgb(236, 250, 36)" class="tag new">
                                                            <span>Rating</span>
                                                        </div>
                                                        
                                                    </div>
                                                @endforeach
                
                        </div>
                    </div>
                </div>
            </section>

            
            <!-- Similar-Products /- -->
            <!-- Recently-View-Products  -->
            
            <!-- Recently-View-Products /- -->
        </div>
        <!-- Different-Product-Section /- -->
    </div>
</div>







@include("site.include.footer1")
@include("site.include.footer")
