@include("site.include.header")


@if(count(\App\Models\wishlist::where("user_id",auth("web")->user()->id)->get())!=0)
@include("site.include.navbar")
<div id="body1" class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>{{ __("messages.About") }}</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.Wishlist") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="page-wishlist u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Products-List-Wrapper -->
                <div class="table-wrapper  u-s-m-b-60">
                    <table style="text-align:start" >
                        <thead >
                            <tr>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.Product") }}</th>
                                <th style="vertical-align: middle;min-width:120px" >{{ __("messages.Unit Price") }}</th>
                                <th style="vertical-align: middle;min-width:120px">{{ __("messages.Stock Status") }}</th>
                                <th style="vertical-align: middle;min-width:200px">{{ __("messages.Action") }}</th>
                            </tr>
                        </thead>
                        <tbody id="body_wishlist">
                            @foreach($wishlist2=\App\Models\wishlist::where("user_id",auth("web")->user()->id)->paginate(8) as $wishlist)
                            <tr>
                                <td>
                                    <div class="cart-anchor-image">
                                        <a href="{{ route("product_detail",$wishlist->product_id) }}">
                                            <img loading="lazy" src="{{ asset("img/upload/product/".$wishlist->product->photo) }}" alt="Product">
                                            @if(LaravelLocalization::getCurrentLocale()=="ar")

                                            <span>{{ $wishlist->product->title_ar }}</span>

                                            @else
                                            <span>{{ $wishlist->product->title_en }}</span>

                                            @endif


                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-price">
                                        $
                                        @if($wishlist->product->price_offer!=""&& $wishlist->product->end_offer_at> \Carbon\Carbon::now()->toDateString())

                                        {{ $wishlist->product->price_offer }}

                                        @else
                                        {{ $wishlist->product->price }}

                                        @endif
                                        
                                        .00
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-stock">
                                        {{ __("messages.In Stock") }}
                                    </div>
                                </td>
                                <td >
                                    <div class="action-wrapper">
                                        <a style="display: inline-block;width:130px" href="{{ route("product_detail",$wishlist->product_id) }}" class="button button-outline-secondary">{{ __("messages.Add to Cart") }}</a>
                                        <a onclick="delete_wishlist({{ $wishlist->id }},{{ auth("web")->user()->id }})" style="padding: 11px"    class="button button-outline-secondary fas  fa-trash"></a>
                                    {{-- href="{{ route("remove_wishlist",$wishlist->id) }}" --}}
                                    </div>

                                </td>
                            </tr>
                            
                            @endforeach

                        </tbody>
                    </table>
                    <br/>
                    <div id="paginate_wishlist" class="d-flex justify-content-center m-auto">{{ $wishlist2->links() }}</div>
                </div>
                <!-- Products-List-Wrapper /- -->
            </div>
        </div>
    </div>
</div>








@include("site.include.footer1")

@else


<div  class="page-cart">
    <div class="vertical-center">
        <div class="text-center">
            <h1>Em
                <i class="fas fa-child"></i>ty!</h1>
            <h5>Your Wishlist is currently empty.</h5>
            <div class="redirect-link-wrapper u-s-p-t-25">
                <a class="redirect-link" href="{{ route("index") }}">
                    <span>Return to Shop</span>
                </a>
            </div>
        </div>
    </div>
</div>


@endif




@include("site.include.footer")
