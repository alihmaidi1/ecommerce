@include("site.include.header")


@if(count(\App\Models\cart::where("user_id",auth("web")->user()->id)->get())!=0)
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
                    <a href="">{{ __("messages.cart") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>




<div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <!-- Products-List-Wrapper -->
                    <div class="table-wrapper u-s-m-b-60">
                        <table>
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;min-width:100px">{{ __("messages.Product") }}</th>
                                    <th style="vertical-align: middle;min-width:100px">{{ __("messages.Price") }}</th>
                                    <th style="vertical-align: middle;min-width:120px">{{ __("messages.color") }}</th>
                                    <th style="vertical-align: middle;min-width:120px">{{ __("messages.size") }}</th>
                                    <th style="vertical-align: middle;min-width:120px">{{ __("messages.Quantity") }}</th>
                                    <th style="vertical-align: middle;min-width:120px">{{ __("messages.Action") }}</th>
                                
                                </tr>
                            </thead>
                            <tbody id="cart_body2">
                                
                                @foreach($carts=\App\Models\cart::where("user_id",auth()->user()->id)->paginate(5) as $cart)
                                
                                <tr>
                                    <td>
                                        <div class="cart-anchor-image">
                                            <a href="{{ route("product_detail",$cart->product->id) }}">
                                                <img loading="lazy" src="{{ asset("img/upload/product/".$cart->product->photo) }}" alt="Product">

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                <h6>{{ $cart->product->title_ar }}</h6>

                                                @else

                                                <h6>{{ $cart->product->title_en }}</h6>

                                                @endif

                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="price_cart_{{ $cart->id }}" class="cart-price">
                                            $
                                            @if($cart->product->price_offer!=""&&$cart->product->end_offer_at>\Carbon\Carbon::now()->toDateString())
                                            {{ $cart->product->price_offer * $cart->quantity }}
                                            @else
                                            {{ $cart->product->price  * $cart->quantity}}
                                            @endif
                                            
                                            .00
                                        </div>
                                    </td>
                                    <td>

                                        @if(LaravelLocalization::getCurrentLocale()=="ar")


                                        {{ $cart->color->name_ar }}

                                        @else

                                        {{ $cart->color->name_en }}

                                        @endif



                                    </td>
                                    <td>

                                        @if(LaravelLocalization::getCurrentLocale()=="ar")


                                        {{ $cart->size->name_ar }}

                                        @else

                                        {{ $cart->size->name_en }}

                                        @endif



                                    </td>

                                    <td>
                                        <div class="cart-quantity">
                                            <div class="quantity">
                                                <input type="text" id="quantity_cart_{{ $cart->id }}" readonly name="quantity" class="quantity-text-field" value="{{ $cart->quantity }}">
                                                <a class="plus-a" data-max="{{ $cart->product->numbers }}">&#43;</a>
                                                <a class="minus-a" data-min="1">&#45;</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-wrapper ">
                                            <button onclick="update_cart({{ $cart->id }},{{ auth('web')->user()->id }})" class="button button-outline-secondary fas fa-sync"></button>
                                            <a  onclick="delete_cart({{ $cart->id }},{{ auth("web")->user()->id }})" class="button  button-outline-secondary fas fa-trash"></a>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br/>
                        <div id="cart_pagin_ajax" class="m-auto d-flex justify-content-center">{{ $carts->links() }}</div>
                    </div>
                    <!-- Products-List-Wrapper /- -->
                    <!-- Coupon -->
                    <!-- Coupon /- -->
                <!-- Billing -->
                <div style="width:100%" >
                    <div class="table-wrapper-2">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2">{{ __("messages.Cart Totals") }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="calc-h3 u-s-m-b-0">{{ __("messages.Subtotal") }}</div>
                                    </td>
                                    <td>
                                        <span id="subtotal_ajax" class="calc-text">${{ sum_subtotal_cart($carts) }}.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="calc-h3 u-s-m-b-8">{{ __("messages.Shipping") }}</div>
                                        <div class="calc-choice-text u-s-m-b-4">{{ __("messages.Rate System: Avilable") }}</div>
                                        <div class="calc-choice-text u-s-m-b-4">{{ __("messages.Free Shipping: Not Available") }}</div>
                                    </td>

                                    <td id="shipping_ajax">
                                    ${{ sum_shipping_cart($carts) }}.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="calc-h3 u-s-m-b-0" id="tax-heading">{{ __("messages.Tax") }}</h3>
                                        <span> {{ __("messages.(estimated for your country)") }}</span>
                                    </td>
                                    <td>
                                        <span id="tax_ajax" class="calc-text">${{ sum_tax_cart($carts) }}.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="calc-h3 u-s-m-b-0">{{ __("messages.Total") }}</h3>
                                    </td>
                                    <td>
                                        <span id="total_ajax" class="calc-text">${{ sum_cart_user($carts) }}.00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                 <br/>
                        <div style="display:flex;justify-content:center" class="coupon-continue-checkout ">
                            <div class="button-area">
                                <a href="{{ route("index") }}" class="continue">{{ __("messages.Continue Shopping") }}</a>
                                <a href="{{ route("checkout") }}" class="checkout">{{ __("messages.Proceed to Checkout") }}</a>
                            </div>
                        </div>
                     
                    </div>
                </div>
                <!-- Billing /- -->
            </div>
        </div>
    </div>
</div>
@include("site.include.footer1")

@else


    <!-- Cart-Page -->
    <div class="page-cart">
        <div class="vertical-center">
            <div class="text-center">
                <h1>Em
                    <i class="fas fa-child"></i>ty!</h1>
                <h5>Your cart is currently empty.</h5>
                <div class="redirect-link-wrapper u-s-p-t-25">
                    <a class="redirect-link" href="{{ route("index") }}">
                        <span>Return to Shop</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->



@endif



@include("site.include.footer")
