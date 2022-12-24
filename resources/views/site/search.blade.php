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
                    <a href="">{{ __("messages.About") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="page-deal u-s-p-t-80">
    <div class="container">
        <div class="deal-page-wrapper">
            <h1 class="deal-heading">{{ __("messages.Search Result") }}</h1>
            <h6 class="deal-has-total-items">{{ count($products) }} {{ __("messages.Items") }}</h6>
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
            <form method="POST" action="{{ route("paginate_order") }}">
            <!-- Toolbar Sorter 1  -->
            @csrf
            <div class="toolbar-sorter">
                <div class="select-box-wrapper">
                    <label class="sr-only" for="sort-by">{{ __("messages.Sort By") }}</label>
                    <select onchange="send_request()" name="order_by" class="select-box" id="sort-by">
                        <option
                        @isset($order)
                        @if($order==0)
                        selected="selected"
                        @endif
                        @endisset
                         value="0">{{ __("messages.Sort By: Best Selling") }}</option>
                        <option 
                        @isset($order)
                        @if($order==1)
                        selected="selected"
                        @endif
                        @endisset
                        
                        
                        value="1">{{ __("messages.Sort By: Lowest Price") }}</option>
                        <option 
                        @isset($order)
                        @if($order==2)
                        selected="selected"
                        @endif
                        @endisset
                        
                        
                        value="2">{{ __("messages.Sort By: Highest Price") }}</option>
                        <option
                        @isset($order)
                        @if($order==3)
                        selected="selected"
                        @endif
                        @endisset
                        
                        value="3">{{ __("messages.Sort By: Best Rating") }}</option>
                        <option
                        @isset($order)
                        @if($order==4)
                        selected="selected"
                        @endif
                        @endisset
                        
                        value="4">{{ __("meesages.Sort By: Lasted") }}</option>
                    </select>
                </div>
            </div>
            <!-- //end Toolbar Sorter 1  -->
            <!-- Toolbar Sorter 2  -->
            <div class="toolbar-sorter-2">
                <div class="select-box-wrapper">
                    <label class="sr-only" for="show-records">{{ __("messages.Show Records Per Page") }}</label>
                    <select  onchange="send_request()" name="pagin"  class="select-box" id="show-records">
                        <option 
                        @isset($pagin)
                        @if($pagin==8)
                        selected="selected"
                        @endif
                      
                        @endisset
                        
                        
                        value="8">{{ __("messages.Show: 8") }}</option>
                        <option 
                        @isset($pagin)
                        @if($pagin==16)
                        selected="selected"
                        @endif
                        @endisset
                        
                        value="16"
                        >{{ __("messages.Show: 16") }}</option>
                        <option
                        @isset($pagin)
                        @if($pagin==32)
                        selected="selected"
                        @endif
                        @endisset
                        

                        value="28">{{ __("messages.Show: 28") }}</option>
                    </select>
                </div>
            </div>
            <input type="hidden" id="product_arr" name="products" value="{{  implode(",",product_to_array_id($products))  }}"/>
            <!-- //end Toolbar Sorter 2  -->
            <button type="submit" class="d-none" id="click"></button>
            </form>
        </div>
        <!-- Page-Bar /- -->
        <!-- Row-of-Product-Container -->
        <div id="inner" class="row product-container grid-style">
            
            @foreach($products as $product)

            <div class="product-item col-lg-3 col-md-6 col-sm-6">
                <div class="item">
                    <div class="image-container">
                        <a class="item-img-wrapper-link" href="{{ route("product_detail",$product->id) }}">
                            <img loading="lazy" class="img-fluid" style="width:250px;height:200px" src="{{ asset("img/upload/product/".$product->photo) }}" alt="Product">
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

                                @if(LaravelLocalization::getCurrentLocale()=="ar    ")

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
                                  <i class="fa fa-star" style="color:rgb(238, 236, 232)"></i>  
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

                                ${{ $product->price }}.00


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
        <!-- Row-of-Product-Container /- -->
        <!-- Shop-Pagination -->
        <!-- Shop-Pagination /- -->
    </div>
</div>
<div id="change_page" class="d-flex justify-content-center m-auto">{{ $products->links() }}</div>





@include("site.include.footer1")

<script>
function  send_request(){

let click1= document.getElementById("click");
click1.click();

}

</script>
@include("site.include.footer")


