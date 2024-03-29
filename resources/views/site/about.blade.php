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

<div class="page-about u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-me-info u-s-m-b-30">
                    <h1>Welcome to
                        <span>Ecommerce</span>
                    </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, delectus, modi? Accusamus fuga itaque laborum modi nam ullam vel veniam! Beatae consectetur debitis ipsa ipsam iusto provident quod. Sit, voluptatum!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ea, earum eum eveniet ex, expedita id molestias nisi perspiciatis saepe vero voluptas voluptatum. Id, illum ipsum iste laboriosam placeat quo.
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, delectus, modi? Accusamus fuga itaque laborum modi nam ullam vel veniam! Beatae consectetur debitis ipsa ipsam iusto provident quod. Sit, voluptatum!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ea, earum eum eveniet ex, expedita id molestias nisi perspiciatis saepe vero voluptas voluptatum. Id, illum ipsum iste laboriosam placeat quo.
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, delectus, modi? Accusamus fuga itaque laborum modi nam ullam vel veniam! Beatae consectetur debitis ipsa ipsam iusto provident quod. Sit, voluptatum!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ea, earum eum eveniet ex, expedita id molestias nisi perspiciatis saepe vero voluptas voluptatum. Id, illum ipsum iste laboriosam placeat quo.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-me-image u-s-m-b-30">
                    <div class="banner-hover effect-border-scaling-gray">
                        <img loading="lazy" class="img-fluid" src="{{ asset("site2/images/site2/6.jpg") }}" alt="About Picture">
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




@include("site.include.footer1")
@include("site.include.footer")
