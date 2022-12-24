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
                    <a href="">{{ __("messages.checkout") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="page-checkout u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- First-Accordion -->
                <!-- First-Accordion /- -->
                <!-- Second Accordion -->
                
                <!-- Second Accordion /- -->
                <form method="get" action="{{ route('processTransaction') }}" >
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth("web")->user()->id }}"/>
                    <input type="hidden" name="total" value="{{ sum_cart_user(\App\Models\cart::where("user_id",auth("web")->user()->id)->get()) }}"/>
                    <div class="row">
                        <!-- Billing-&-Shipping-Details -->
                        <div class="col-lg-6">
                            <h4 class="section-h4">{{ __("messages.Billing Details") }}</h4>
                            <!-- Form-Fields -->
                            <div class="group-inline u-s-m-b-13">
                                <div class="group-1 u-s-p-r-16">
                                    <label for="first-name">{{ __("messages.First Name") }}
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" value="{{ @old("first_name") }}" name="first_name" id="first-name" placeholder="{{ __("messages.First Name") }}" class="@error('first_name') is-invalid @enderror text-field">
                                    @error('first_name')
                                    <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                   
                                </div>
                                <div class="group-2">
                                    <label for="last-name">{{ __("messages.Last Name") }}
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" name="last_name" placeholder="{{ __("messages.Last Name") }}" id="last-name" value="{{ @old("last_name") }}" class=" @error('last_name') is-invalid @enderror text-field">
                                    @error('last_name')
                                    <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                                
                                </div>
                            </div>
                            <div class="u-s-m-b-13">
                                <label for="select-country">{{ __("messages.Tracking Company") }}
                                    <span class="astk">*</span>
                                </label>
                                <div class="select-box-wrapper">
                                    <select class="select-box" class="@error('track')is-invalid @enderror"  name="track" id="select-country">
                                        <option selected="selected" value="">{{ __("messages.Choose Tracking Company...") }}</option>
                                        @foreach(\App\Models\track::get() as $track)


                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                        <option value="{{ $track->id }}">{{ $track->name_ar }}</option>

                                        @else


                                        <option value="{{ $track->id }}">{{ $track->name_en }}</option>

                                        @endif

                                        @endforeach
                                    
                                    </select>
                                    @error('track')
                                    <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                                </div>
                            </div>
                            
                            
                            <div class="u-s-m-b-13">
                                <label for="select-country">{{ __("messages.Country") }}
                                    <span class="astk">*</span>
                                </label>
                                <div class="select-box-wrapper">
                                    <select class="select-box" name="country" class="@error('country') is-invalid @enderror" id="select-country">
                                        <option selected="selected" value="">{{ __("messages.Choose your country...") }}</option>
                                        @foreach(\App\Models\country::get() as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    
                                    </select>
                                    @error('country')
                                    <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                                </div>
                            </div>
                            <div class="street-address u-s-m-b-13">
                                <label for="req-st-address">{{ __("messages.Street Address") }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" value="{{ @old('address') }}" name="address" id="req-st-address" class="@error('address')is-invalid @enderror text-field" placeholder="{{ __("messages.House name and street name") }}">
                                <label class="sr-only " for="opt-st-address"></label>
                                @error('address')
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                
                            </div>
                            <div class="u-s-m-b-13">
                                <label for="select-country">{{ __("messages.City") }}
                                    <span class="astk">*</span>
                                </label>
                                <div class="select-box-wrapper">
                                    <select class="select-box" class="@error("city") is-invalid @enderror" name="city" id="select-country">
                                        <option selected="selected"  value="">{{ __("messages.Choose your City...") }}</option>
                                        @foreach(\App\Models\cities::get() as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    
                                    </select>
                                    @error('city')
                                    <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                                </div>
                            </div>
                            <div class="u-s-m-b-13">
                                <label for="postcode">{{ __("messages.State") }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" value="{{ @old("state") }}" name="state" placeholder="{{ __("messages.State") }}" id="postcode" class="@error('state') is-invalid @enderror text-field">
                                @error('state')
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                
                            </div>
                            
                            <div class="u-s-m-b-13">
                                <label for="postcode">{{ __("messages.Postcode / Zip") }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" value="{{ @old('zip') }}" name="zip" placeholder="{{ __("messages.Zip / postCode") }}" id="postcode" class="@error('zip') is-invalid @enderror text-field">
                                @error('zip')
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                
                            </div>
                            <div class="group-inline u-s-m-b-13">
                                <div class="group-1 u-s-p-r-16">
                                    <label for="email">{{ __("messages.Email address") }}
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="email" value="{{ @old('email') }}" name="email" placeholder="{{ __("messages.Email Address") }}" class="@error('email') is-invalid @enderror text-field">
                                    @error('email')
                                    <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                                </div>

                                <div class="group-2">
                                    <label for="phone">{{ __("messages.Phone") }}
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" value="{{ @old('phone') }}" name="phone" placeholder="{{ __("messages.Phone") }}" id="phone" class="@error('phone') is-invalid @enderror text-field">
                                    @error('phone')
                                    <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                                </div>
                            </div>

                            <!-- Form-Fields /- -->

                        </div>
                        <!-- Billing-&-Shipping-Details /- -->
                        <!-- Checkout -->
                        <div class="col-lg-6">
                            <h4 class="section-h4">{{ __("messages.Your Order") }}</h4>
                            <div class="order-table">
                                <table class="u-s-m-b-13">
                                    <thead>
                                        <tr>
                                            <th>{{ __("messages.Product") }}</th>
                                            <th>{{ __("messages.size") }}</th>
                                            <th>{{ __("messages.color") }}</th>

                                            <th>{{ __("messages.Total") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach(\App\Models\cart::where("user_id",auth("web")->user()->id)->get() as $cart)
                                        <tr>
                                            <td>


                                                @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                <h6 class="order-h6">{{ $cart->product->title_ar }}</h6>

                                                @else

                                                <h6 class="order-h6">{{ $cart->product->title_en }}</h6>

                                                @endif


                                                <span class="order-span-quantity">x {{ $cart->quantity }}</span>
                                            </td>
                                            <td>

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                <span class="order-span-quantity"> {{ $cart->size->name_ar }}</span>


                                                @else

                                                <span class="order-span-quantity"> {{ $cart->size->name_en }}</span>

                                                @endif

                                            </td>
                                            
                                            <td>

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")

                                                <span class="order-span-quantity"> {{ $cart->color->name_ar }}</span>


                                                @else

                                                <span class="order-span-quantity"> {{ $cart->color->name_en }}</span>

                                                @endif

                                            </td>
                                            
                                            <td>
                                                <h6 class="order-h6">$
                                                    
                                                    @if($cart->product->price_offer!=""&& $cart->product->end_offer_at>\Carbon\Carbon::now()->toDateString())
                                                    {{ $cart->product->price_offer * $cart->quantity }}
                                                    @else
                                                    {{ $cart->product->price * $cart->quantity }}
                                                    @endif
                                                    .00</h6>
                                            </td>
                                        </tr>
                                        

                                        @endforeach
                                        
                                            <tr>
                                            <td>
                                                <h3 class="order-h3">{{ __("messages.Subtotal") }}</h3>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>
                                                <h3 class="order-h3">${{ sum_subtotal_cart($carts=\App\Models\cart::where("user_id",auth("web")->user()->id)->get()) }}.00</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">{{ __("messages.Shipping") }}</h3>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>
                                                <h3 class="order-h3">${{ sum_shipping_cart($carts) }}.00</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">{{ __("messages.Tax") }}</h3>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>
                                                <h3 class="order-h3">${{ sum_tax_cart($carts) }}.00</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">{{ __("messages.Total") }}</h3>
                                            </td>

                                            <td></td>
                                            <td></td>


                                            <td>
                                                <h3 class="order-h3">${{ sum_cart_user($carts) }}.00</h3>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="u-s-m-b-13">
                                    <input type="checkbox" name="accept" class="check-box" id="accept">
                                    <label class="label-text no-color" for="accept">{{ __("messages.I’ve read and accept the") }}
                                        <a href="" class="u-c-brand">{{ __("messages.terms & conditions") }}</a>
                                    </label>
                                </div>
                                <button  type="submit" class="button button-outline-secondary">{{ __("messages.Place Order") }}</button>
                            </div>
                        </div>
                        <!-- Checkout /- -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>











@include("site.include.footer1")

@else

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

@section('js')
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>

@endsection
@include("site.include.footer")
