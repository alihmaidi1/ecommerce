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
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.My order") }}</a>
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
                <div class="table-wrapper u-s-m-b-60">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;min-width:100px">{{ __("messages.Order Id") }}</th>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.Email") }}</th>
                                <th style="vertical-align: middle;min-width:170px">{{ __("messages.Date") }}</th>
                                <th style="vertical-align: middle;min-width:120px">{{ __("messages.Total") }}</th>
                                <th style="vertical-align: middle;min-width:150px">{{ __("messages.Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order1=\App\Models\order::where("user_id",auth("web")->user()->id)->paginate(8) as $order)
                            <tr>
                                <td>
                                    <div class="cart-anchor-image">
                                        <span>{{ $order->id }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-price">
                                    <span>{{ $order->email }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-price">
                                    <span>{{ $order->created_at }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-price">
                                    <span>{{ $order->total }}</span>
                                    </div>
                                </td>
                                <td style="width:200px">
                                    <a style="width:120px;border:2px solid #000;padding:7px;border-radius:4px;display:block" href="{{ route("show_order_detail",$order->id) }}" >show Details</a>
                                </td>
                            </tr>
                            
                            @endforeach

                        </tbody>
                    </table>
                    <br/>
                    <div class="d-flex justify-content-center">{{ $order1->links() }}</div>
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
