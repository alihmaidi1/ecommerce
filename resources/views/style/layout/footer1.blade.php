
<div class="footer-top-area" style="padding: 0px;padding-top:20px;margin:0px;background:#000">
    <div class="container " >
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="footer-about-us text-center" style="width: 80%">
                    <h2 style="font-weight:600">E<span>Commerce</span></h2>
                    <p>{{ __("messages.This site is a free humanitarian work, and we ask God to make it a great reward, and do not forget us with your prayers. Thank you") }}</p>

                </div>
            </div>
            
            <div class="col-md-4 col-sm-6">
                <div class="footer-menu">
                    <h2 class="text-center footer-wid-title" style="color: red">{{ __("messages.User Navigation") }} </h2>
                    <ul>
                        <li style="margin-top:15px; " class=" text-center"><a class="text-decoration-none" href="{{ route("my_profile") }}">{{ __("messages.My account") }}</a></li>
                        <li style="margin-top:15px; " class=" text-center"><a class="text-decoration-none" href="{{ route("show_order") }}">{{ __("messages.Order history") }}</a></li>
                        <li style="margin-top:15px; " class=" text-center"><a class="text-decoration-none" href="{{ route("show_wishlist") }}">{{ __("messages.Wishlist") }}</a></li>
                        <li style="margin-top:15px; " class=" text-center"><a class="text-decoration-none" href="{{ route("contact") }}">{{ __("messages.Vendor contact") }}</a></li>
                    </ul>                        
                </div>
            </div>
            
            
            <div class="col-md-4 col-sm-6">
                <div class="footer-menu">
                    <h2 class="text-center " style="color:rgb(9, 123, 230)">{{ __("messages.Contact") }} </h2>
                    <ul>
                        <li style="margin-top:15px; " class=" text-center"><a class="text-decoration-none text-white" href="{{ \App\Models\setting::find(1)->facebook }}" target="_blank"><i style="" class="text-primary fab fa-facebook"></i> {{ __("messages.Facebook") }}</a></li>
                        <li style="margin-top:15px; " class=" text-center"><a class="text-decoration-none text-white" href="" target="_blank"><i style="" class="text-primary fab fa-whatsapp"></i> {{ \App\Models\setting::find(1)->phone }}</a></li>
                        <li style="margin-top:15px; " class=" text-center"><a class="text-decoration-none text-white" href="" target="_blank"><i style="" class="text-primary fab fa-telegram"></i> {{ \App\Models\setting::find(1)->name_eng }}</a></li>
                        <li style="margin-top:15px; " class=" text-center"><a class="text-decoration-none text-white" href="mailto:{{ \App\Models\setting::find(1)->email }}" target="_blank"><i style="" class="text-primary fas fa-envelope"></i> {{ \App\Models\setting::find(1)->email }}</a></li>
                    </ul>                        
                </div>
            </div>
               

                  </div>
    </div>

</div> <!-- End footer top area -->

<div  class="footer-bottom-area" style="padding-top:30px ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p style="text-align:center">&copy; 2022 uCommerce . All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a> And Website Design By Ali Hmaidi</p>
       
                </div>
            </div>
            
            <div class="col-12">
                <div style="text-align:center"  class="footer-card-icon">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-paypal"></i>
                    <i class="fab fa-cc-discover"></i>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->
