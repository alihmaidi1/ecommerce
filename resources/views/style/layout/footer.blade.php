@yield('js')

<script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    
    <!-- jQuery sticky menu -->
    <script src={{ asset('site/js/owl.carousel.min.js') }}></script>
    <script src={{ asset('site/js/jquery.sticky.js') }}></script>
    
    <!-- jQuery easing -->
    <script src={{ asset("site/js/jquery.easing.1.3.min.js") }}></script>
    
    <!-- Main Script -->
    <script src={{ asset('site/js/main.js') }}></script>
    
    <!-- Slider -->
    <script type="text/javascript" src={{ asset("site/js/bxslider.min.js") }}></script>
    <script type="text/javascript" src={{ asset("site/js/script.slider.js") }}></script>
    
    
    <script src="{{ asset("include/js/jquery-3.6.0.min.js") }}"></script>
    <script src="{{ asset("include/js/bootstrap.js") }}"></script>
    
    @yield('js_end')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.7/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.7/themes/fa/theme.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.2/umd/popper.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
  </html>