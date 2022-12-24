@include("style.layout.header")
<style>

    @media(max-width:550px){

        #style_wishlist{
    margin:10px auto !important;


}
        
    }
#style_wishlist{
    margin:10px ;


}
    
</style>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app " style="background:rgb(229, 235, 233)">

        @include('style.layout.navbar')

        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60" style="padding: 0px;margin-top:10px">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap w-100" style="background:rgb(47, 47, 47)">
                                <ul class="breadcrumb__list w-100" style="color: white;text-decoration:none">
                                    <li class="has-separator">

                                        <a style="color: white;text-decoration:none" href="{{ route("show_style_user") }}">{{ __("messages.Home") }}</a></li>
                                    <li class="is-marked">

                                        <a style="color: white;text-decoration:none" href="{{ route("show_style_user") }}">{{ __("messages.Wishlist") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60" style="padding:0px">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-60 " style="margin:0px;padding:10px ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary ">{{ __("messages.Wishlist") }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                

                <!--====== Section Content ======-->
                <div class="section__content ">
                    <div class="container">
                        <div style="display: flex;flex-wrap:wrap">


                                <!--====== End - Wishlist Product ======-->
                                @foreach($pagin1=\App\Models\wishlist::where("user_id",auth('web')->user()->id)->paginate(5) as $wishlist)
                                <div id="style_wishlist"  style="width: 300px ;">
                                    <div class="product-o product-o--hover-on product-o--radius">
                                        <div class="product-o__wrap">
                                
                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="">
                                
                                                <img class="aspect__img" src="{{ asset('img/upload/product/'.$wishlist->product->photo) }}" alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">
                                                    <li>
                                
                                                        <a href="" data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                                    <li>
                                
                                                        <a href="{{ route("delete_wishlist",[$wishlist->product->id,auth('web')->user()->id]) }}" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-trash-alt"></i></a></li>
                                                    </ul>
                                            </div>
                                        </div>
                                
                                        <span class="product-o__category">
                                
                                            <a href="{{ route("show_product_detail",$wishlist->product->id) }}">{{ $wishlist->product->title }}</a></span>
                                
                                        <span class="product-o__name">
                                
                                            <a href="product-detail.html"></a></span>
                                        <div class="product-o__rating gl-rating-style">
                                            @for($i = 0; $i < $wishlist->product->rating; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for($i = $wishlist->product->rating; $i < 5; $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                            <span class="product-o__review">({{ count(\App\Models\number_stars::where("user_id",auth('web')->user()->id)->where("product_id",$wishlist->product->id)->get()) }}) {{ __("messages.review") }}</span></div>
                                            
                                            @if(!empty($wishlist->product->price_offer)&&date("Y-m-d")>=$wishlist->product->start_offer_at&&date("Y-m-d")<=$wishlist->product->end_offer_at)


                                            <span style="font-weight:700" class="product-o__price">${{ $wishlist->product->price_offer }}
                                
                                                <span class="product-o__discount " style="color: red;font-weight:700">${{ $wishlist->product->price }}</span></span>
                                            @else
                                            <span class="product-o__price">${{ $wishlist->product->price }}</span>
                                            
                                            @endif

                                    </div>
                                </div>
                                
                                @endforeach

                                <!--====== Wishlist Product ======-->
                                <!--====== End - Wishlist Product ======-->
                            
                        </div>
                        <div style="display: flex;justify-content:center;align-items:center">{{ $pagin1->links() }}</div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        
    </div>
    <!--====== End - Main App ======-->
    @section('js')
    <script src={{ asset("site/js1/map-init.js") }}></script> 

    <!--====== Vendor Js ======-->
    <script src="{{ asset("site/js1/vendor.js") }}"></script>
  
    <!--====== jQuery Shopnav plugin ======-->
    <script src="{{ asset("site/js1/jquery.shopnav.js") }}"></script>
  
    <!--====== App ======-->
    <script src="{{ asset('site/js1/app.js') }}"></script>
  
    @endsection
    @include("style.layout.footer1")
    @include('style.layout.footer')
  