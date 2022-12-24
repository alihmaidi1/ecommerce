@include('style.layout.header')
<style>
    @media(max-width:750px){
#card{

    margin:10px auto !important; 
    
}

    }
</style>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        @include("style.layout.navbar")
        <div class="app-content" style="background:rgb(242, 244, 246)">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60 " style="padding: 0px;padding-top:15px">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap w-100" style="background: rgb(68, 68, 68)">
                                <ul class="breadcrumb__list w-100" style="color:white;text-decoration:none" >
                                    <li class="has-separator">

                                        <a style="color:white;text-decoration:none" href="{{ route('show_style_user') }}">{{ __("messages.Home") }}</a></li>
                                    <li class="is-marked">

                                        <a style="color:white;text-decoration:none" href="{{ route('show_style_user') }}">{{ __("messages.Cart") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60"  style="margin:0px;padding:0px ">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-60 " style="margin:0px;margin-bottom:5px">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary ">{{ __("messages.SHOPPING CART") }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->

                                <div style="display:flex;flex-wrap:wrap;justify-content:space-between">
                                            @foreach($pagin1=\App\Models\cart::where("user_id",auth('web')->user()->id)->paginate(4) as $cart)
                                            <div class="card card-cart" id="card" style=";margin:4px; ">
                                                <img style="width:100%;height:200px" src="{{ asset("img/upload/product/".$cart->product->photo) }}" class="card-img-top" alt="...">
                                                <div class="card-body bg-light">
                                                  <h5 class="card-title text-center"><a href="{{ route("show_product_detail",$cart->product->id) }}">{{ $cart->product->title }}</a></h5>
                                                  <p style="height:100px;overflow:auto" class="card-text text-center">{{ $cart->product->content }}</p>
                                                  <div class="card-text">
                                                      <button class="btn btn-sm btn-primary">{{ $cart->product->department->name}}</button>
                                                      <button class="btn btn-sm btn-warning">{{ __("messages.Size:") }} {{ $cart->product->size}}</button>
                                                      <button class="btn btn-sm btn-danger">{{ __("messages.Price:") }} $<span id="price-cart-{{ $loop->iteration }}" >
                                                        
                                                        @if($cart->product->price_offer!=null&&date("Y-m-d")>=$cart->product->start_offer_at&&date("Y-m-d")<=$cart->product->end_offer_at)    
                                                        {{ $cart->product->price_offer}}
                                                        @else
                                                        {{ $cart->product->price}}
                                                        @endif
                                                    </span></button>
                                                        <span style=" display:none"  id="tax-cart-{{ $loop->iteration }}">{{ $cart->product->tax }}</span>
                                                        <span style=" display:none" id="shipping-cart-{{ $loop->iteration }}">{{ $cart->product->shipping }}</span>
                                                    </div>
                                                    <br/>
                                                  <div class="table-p__input-counter-wrap">
                                                    <a style="margin-right:20px " class="far fa-trash-alt " href="{{ route("delete_cart",$cart->id) }}"></a>

                                                    <!--====== Input Counter ======-->
                                                    <div class="input-counter">

                                                        <span style="display: flex;justify-content:center;align-items:center" class="input-counter__minus fas fa-minus"></span>

                                                        <input onchange="change_price({{ $loop->iteration }}, 
                                                        @if($cart->product->price_offer!=null&&date("Y-m-d")>=$cart->product->start_offer_at&&date("Y-m-d")<=$cart->product->end_offer_at)
                                                        {{ $cart->product->price_offer }}
                                                        @else
                                                        {{ $cart->product->price }}
                                                        @endif
                                                        , {{ $cart->product->tax }},{{ $cart->product->shipping }},{{ count(\App\Models\cart::where('user_id',auth('web')->user()->id)->get()) }} )" id="input-cart-{{$loop->iteration }}" class=" input-counter__text input-counter--text-primary-style" type="text" readonly value="1" data-min="1" data-max="{{ $cart->product->numbers }}">

                                                        <span style="display: flex;justify-content:center;align-items:center" class="input-counter__plus fas fa-plus"></span></div>
                                                    <!--====== End - Input Counter ======-->
                                                </div>

                                                </div>
                                              </div>   
                                            @endforeach
                                             <!--====== End - Row ======-->

                <!--====== End - Section Content ======-->
                                 </div>
  
                                 <div class="d-flex justify-content-center">{{ $pagin1->links() }}</div>

            <!--====== Section 3 ======-->
            <div class="u-s-p-b-60" style="padding: 0px;margin:0px">
 
                <!--====== Section Content ======-->

                
                <div class="section__content rounded" style="padding: 0px;margin:0px">
                    <div class="container rounded " style="padding: 0px;margin:0px auto">
                        <div class="row "style="padding: 0px;margin:0px auto">
                            <div class="col-lg-12 rounded col-md-12 col-sm-12 u-s-m-b-30 "style="padding: 0px;margin:0px;margin-bottom:10px">
                                <div class="f-cart" style="padding: 0px;margin:0px auto">
                                    <div class="row " style="padding: 0px;margin:0px">
                                        
                                        <div class="col-12 rounded  u-s-m-b-30" style="padding: 0px;margin:0px">
                                            <div class="f-cart__pad-box rounded bg-light">
                                                <div class="u-s-m-b-30">
                                                    <form method="post" action="{{ route("checkout") }}">
                                                    <table class="f-cart__table">
                                                        @csrf
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ __("messages.SHIPPING") }}</td>
                                                                <td><input id="shipping-input1" name="shipping"  class="form-control" value="{{ $shipping=sum_shipping_cart(auth('web')->user()->id) }}" readonly/>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __("messages.TAX") }}</td>
                                                                <td><input id="tax-input1" name="taxing" class="form-control" readonly value="{{ $tax=sum_tax_cart(auth('web')->user()->id) }}"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __("messages.SUBTOTAL") }}</td>
                                                                <td><input id="sum-input1" name="subtotal" class="form-control" readonly value="{{ $subtotal=sum_price_cart(auth('web')->user()->id) }}"/> </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __("messages.GRAND TOTAL") }}</td>
                                                                <td><input id="total1" name="total" class="form-control" readonly value="{{ $subtotal+$tax+$shipping }}"/></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <button class="btn btn--e-brand-b-2" type="submit"> {{ __("messages.PROCEED TO CHECKOUT ") }}</button></div>
                                                 
                                                </form>
                                                </div>
                                                <div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        
    </div>
    @section('js')
    <script src={{ asset("site/js1/map-init.js") }}></script> 

    <!--====== Vendor Js ======-->
    <script src="{{ asset("site/js1/vendor.js") }}"></script>
  
    <!--====== jQuery Shopnav plugin ======-->
    <script src="{{ asset("site/js1/jquery.shopnav.js") }}"></script>
  
    <!--====== App ======-->
    <script src="{{ asset('site/js1/app.js') }}"></script>
  
    @endsection
    <script>
        function change_price(index,price,tax,shipping,max){
            let x=document.getElementById('input-cart-'+index);
            let y=document.getElementById("price-cart-"+index);
            let z=document.getElementById('tax-cart-'+index);
            let t=document.getElementById("shipping-cart-"+index);
            y.innerHTML=x.value*price
            z.innerHTML=x.value*tax
            t.innerHTML=x.value*shipping
            let tax1=0;
            let shipping1=0;
            let sum1=0;
            for(let i=1;i<=max;i++){
                tax1+=parseInt(document.getElementById('tax-cart-'+i).innerHTML);
                console.log(tax1)
                shipping1+=parseInt(document.getElementById('shipping-cart-'+i).innerHTML);
                sum1+=parseInt(document.getElementById("price-cart-"+i).innerHTML)
            console.log(sum1)
            }
            
            document.getElementById("tax-input1").value=tax1;
            document.getElementById("shipping-input1").value=shipping1;
            document.getElementById("sum-input1").value=sum1;
            document.getElementById("total1").value=tax1+shipping1+sum1


        }
    </script>
    @include("style.layout.footer1")
@include('style.layout.footer')