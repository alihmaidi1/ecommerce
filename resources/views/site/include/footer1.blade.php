@include("site.include.search_modal")
<footer class="footer">
    <div class="container">
        <!-- Outer-Footer -->
        <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                {{ __("messages.For special offers and other discount information") }}
            </h6>
            <h1>
                {{ __("messages.Subscribe to our Newsletter") }}
            </h1>
            <p>
                {{ __("messages.Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.") }}
            </p>
                <label class="sr-only" for="newsletter_field">{{ __("messages.Enter your Email") }}</label>
                <div id="news_letter1" class="input-group  m-auto">
                <input style="border:2px solid #000;padding:13px;font-size:12px" required class="form-control" type="text" id="newsletter_field" name="email" placeholder="{{ __("messages.Your Email Address") }}">
                
                <button  style="border:2px solid #000;background:#fff;border-left:none" onclick="add_newsletter()" class="button input-group-text">{{ __("messages.SUBMIT") }}</button>
                </div>
                <div style="position: relative;left:-70px">
                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                    <strong id="newletter_message"></strong>
                </span>
                </div>
            </div>


        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-list">
                        <h6>{{ __("messages.COMPANY") }}</h6>
                        <ul>
                            <li>
                                <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                            </li>
                            <li>
                                <a href="{{ route("about_user_site") }}">{{ __("messages.About") }}</a>
                            </li>
                            <li>
                                <a href="{{ route("user_contact_index") }}">{{ __("messages.Contact") }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-list">
                        <h6>{{ __("messages.INFORMATION") }}</h6>
                        <ul>
                            <li>
                                <a href="{{ route("show_department_user") }}">{{ __("messages.Categories Directory") }}</a>
                            </li>
                            <li>
                                <a href="{{ route("show_wishlist") }}">{{ __("messages.My Wishlist") }}</a>
                            </li>
                            <li>
                                <a href="{{ route("show_cart") }}">{{ __("messages.My Cart") }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-list">
                        <h6>{{ __("messages.Address") }}</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>{{ \App\Models\setting::find(1)->address }}</span>
                            </li>
                            <li>
                                <a href="tel:{{ \App\Models\setting::find(1)->phone }}">
                                    <i class="fas fa-phone u-s-m-r-9"></i>
                                    <span>{{ \App\Models\setting::find(1)->phone }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ \App\Models\setting::find(1)->email }}">
                                    <i class="fas fa-envelope u-s-m-r-9"></i>
                                    <span>
                                        {{ \App\Models\setting::find(1)->email }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
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
                    <li>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">{{ __("messages.Copyright") }} &copy; 2022
                <a href="">Ali Hmaidi</a> {{ __("messages.All Right Reserved") }}</p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
