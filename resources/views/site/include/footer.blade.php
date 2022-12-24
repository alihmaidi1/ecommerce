<noscript>
    <div class="app-issue">
        <div class="vertical-center">
            <div class="text-center">
                <h1>JavaScript is disabled in your browser.</h1>
                <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser to register for Groover.</span>
            </div>
        </div>
    </div>
    <style>
    #app {
        display: none;
    }
    </style>
</noscript>
<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>

    
window.ga = function() {
    ga.q.push(arguments)
};
ga.q = [];
ga.l = +new Date;
ga('create', 'UA-XXXXX-Y', 'auto');
ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<!-- Modernizr-JS -->
<script type="text/javascript" src="{{ asset("site2/js/vendor/modernizr-custom.min.js") }}"></script>
<!-- NProgress -->
<script type="text/javascript" src="{{ asset("site2/js/nprogress.min.js") }}"></script>
<!-- jQuery -->
<script type="text/javascript" src="{{ asset("site2/js/jquery.min.js") }}"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{{ asset("site2/js/bootstrap.min.js") }}"></script>
<!-- Popper -->
<script type="text/javascript" src="{{ asset("site2/js/popper.min.js") }}"></script>
<!-- ScrollUp -->
<script type="text/javascript" src="{{ asset("site2/js/jquery.scrollUp.min.js") }}"></script>
<!-- Elevate Zoom -->
<script type="text/javascript" src="{{ asset("site2/js/jquery.elevatezoom.min.js") }}"></script>
<!-- jquery-ui-range-slider -->
<script type="text/javascript" src="{{ asset("site2/js/jquery-ui.range-slider.min.js") }}"></script>
<!-- jQuery Slim-Scroll -->
<script type="text/javascript" src="{{ asset("site2/js/jquery.slimscroll.min.js") }}"></script>
<!-- jQuery Resize-Select -->
<script type="text/javascript" src="{{ asset("site2/js/jquery.resize-select.min.js") }}"></script>
<!-- jQuery Custom Mega Menu -->
<script type="text/javascript" src="{{ asset("site2/js/jquery.custom-megamenu.min.js") }}"></script>
<!-- jQuery Countdown -->
<script type="text/javascript" src="{{ asset("site2/js/jquery.custom-countdown.min.js") }}"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="{{ asset("site2/js/owl.carousel.min.js") }}"></script>
<!-- Main -->
<script type="text/javascript" src="{{ asset("site2/js/app.js") }}"></script>
<script src="{{ asset("site2/js/site2.js") }}"></script>
@yield('js')

</body>
</html>
