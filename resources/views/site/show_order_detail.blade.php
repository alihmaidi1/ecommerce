@include("site.include.header")

@if(count(\App\Models\order::where("user_id",auth("web")->user()->id)->get())!=0)
@include("site.include.navbar")
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>{{ __("messages.About") }}</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("meesages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.My order") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>




<div class="page-about u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-md-12">
                <div class="about-me-info u-s-m-b-30">
                    <div class="row">
                    <div  class="col-12" style="padding:20px;box-shadow:0px 0px 5px 5px rgb(247, 247, 247)">
                        <h6 style="font-weight:700" class="text-center">{{ __("messages.Shipping Address") }}</h6>
                        <div class="row mb-2">
                        <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0"> {{ __("messages.First Name :") }} </span> <span class="button p-0">{{$order->first_name}}</span></div>
                        <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0"> {{ __("messages.Last Name :") }} </span> <span class="button  p-0">{{ $order->last_name }}</span></div>
                        </div>
                        <div class="row mb-2">
                            @if(LaravelLocalization::getCurrentLocale()=="ar")

                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0"> {{ __("messages.Company :") }} </span><span class="button p-0">{{ $order->tracks->name_ar }}</span></div>

                            @else
                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0"> {{ __("messages.Company :") }} </span><span class="button p-0">{{ $order->tracks->name_en }}</span></div>


                            @endif

                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0">{{ __("messages.Phone :") }} </span><span class="button p-0">{{ $order->phone }}</span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0">{{ __("messages.Email :") }} </span><span class="button p-0">{{ $order->email }}</span></div>
                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0">{{ __("messages.Status :") }} </span><span class="button p-0" style="color:green">{{ $order->status }}</span></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0">{{ __("messages.Country :") }} </span><span class="button p-0">{{ $order->countrys->name }}</span></div>
                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0">{{ __("messages.City :") }} </span><span class="button p-0" >{{ $order->citys->name }}</span></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0">{{ __("messages.State :") }} </span><span class="button p-0">{{ $order->state }}</span></div>
                            <div class="col-6"><span  style="font-weight:700;color:#000" class="button p-0">{{ __("messages.Zip :") }} </span><span class="button p-0" >{{ $order->zip }}</span></div>
                        </div>
                        <hr/>
                        <div class="row mb-2">
                            <div class="col-12 text-center"><span  style="font-weight:700;color:#000" class="button p-0"> {{ __("messages.Address :") }} </span> <span class="button p-0">{{$order->address}}</span></div>
                            </div>

                    </div>

                    <div  class="col-12 mt-3" style="padding:20px;box-shadow:0px 0px 5px 5px rgb(247, 247, 247)">
                        <h6 style="font-weight:700" class="text-center">{{ __("messages.Shipping Info") }}</h6>
                        <div class="row mb-2">
                            <div class="col-6 text-center"><span  style="font-weight:700;color:#000" class="button p-0">  {{ __("messages.Tax:") }} </span> <span class="button p-0">${{sum_tax_order(\App\Models\order_product::where("order_id",$order->id)->get())}}.00</span></div>
                            <div class="col-6 text-center"><span  style="font-weight:700;color:#000" class="button p-0"> {{ __("messages.Shipping :") }} </span> <span class="button p-0">${{sum_shipping_order(\App\Models\order_product::where("order_id",$order->id)->get())}}.00</span></div>
                        
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-center"><span  style="font-weight:700;color:#000" class="button p-0">  {{ __("messages.SubTotal:") }} </span> <span class="button p-0">${{sum_subtotal_order(\App\Models\order_product::where("order_id",$order->id)->get())}}.00</span></div>
                            <div class="col-6 text-center"><span  style="font-weight:700;color:#000" class="button p-0"> {{ __("messages.Total :") }} </span> <span class="button p-0">${{$order->total}}.00</span></div>
                        
                        </div>



                    </div>
                    
                    </div>

                    




                </div>
            </div>
            <div class=" col-lg-6 col-md-12">
                <div class="about-me-image u-s-m-b-30">
                    <div class="banner-hover effect-border-scaling-gray">
                        <img loading="lazy" class="img-fluid" src="{{ asset("site2/images/site2/9.jpg") }}" alt="About Picture">
                    </div>
                </div>
                <div class="about-social text-center u-s-m-b-30">
                    <ul class="social-media-list">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-rss"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="page-wishlist u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Products-List-Wrapper -->
                <div class="table-wrapper u-s-m-b-60">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.Product Id") }}</th>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.Name") }}</th>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.Price") }}</th>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.color") }}</th>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.size") }}</th>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.Department") }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order12=\App\Models\order_product::where("order_id",$order->id)->paginate(5) as $order_product)
                            <tr>
                                <td>
                                    <div class="cart-anchor-image">
                                        <span>{{ $order_product->product_id }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-price">

                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                    <span>{{ $order_product->product->title_ar }}  x{{ $order_product->quantity }}</span>

                                        @else

                                    <span>{{ $order_product->product->title_en }}  x{{ $order_product->quantity }}</span>

                                        @endif


                                    </div>
                                </td>
                                <td>
                                    <div class="cart-price">
                                    <span>
                                        

                                    ${{ $order_product->price_one }}.00
                                    

                                    
                                    
                                    </span>
                                    </div>
                                </td>
                                <td>

                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                <div class="cart-price">    {{ $order_product->color->name_ar }}</div>

                                    @else

                                    <div class="cart-price">{{ $order_product->color->name_en }}</div>

                                    @endif


                                </td>
                                <td>

                                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                                    <div class="cart-price">{{ $order_product->size->name_ar }}</div>

                                    @else

                                    <div class="cart-price">{{ $order_product->size->name_en }}</div>

                                    @endif


                                </td>
                                
                                <td>
                                    <div class="cart-price">


                                        @if(LaravelLocalization::getCurrentLocale()=="ar")

                                        <span>{{ $order_product->product->department->name_ar }}  </span>

                                        @else


                                    <span>{{ $order_product->product->department->name_en }}  </span>

                                        @endif


                                    </div>
                                </td>
                               
                                                           </tr>
                            
                            @endforeach

                        </tbody>
                    </table>
                    <br/>
                    <div class="d-flex justify-content-center">{{ $order12->links() }}</div>
                </div>
                <!-- Products-List-Wrapper /- -->
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
            <h5>Your Order is currently empty.</h5>
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
