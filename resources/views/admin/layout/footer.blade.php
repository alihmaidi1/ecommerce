
<!-- jQuery -->
<script src= {{ asset("AdminLTE/plugins/jquery/jquery.min.js") }}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{ asset("AdminLTE/plugins/jquery-ui/jquery-ui.min.js") }}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
{{--  <script src={{ asset("AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<!-- Sparkline -->
<script src={{ asset("AdminLTE/plugins/sparklines/sparkline.js") }}></script>
<script src={{ asset("AdminLTE/plugins/jquery-knob/jquery.knob.min.js") }}></script>
<!-- daterangepicker -->
<script src={{ asset("AdminLTE/plugins/moment/moment.min.js") }}></script>
<script src={{ asset("AdminLTE/plugins/daterangepicker/daterangepicker.js") }}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ asset("AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script>
<!-- Summernote -->
<script src={{ asset("AdminLTE/plugins/summernote/summernote-bs4.min.js") }}></script>
<!-- overlayScrollbars -->
<script src={{ asset("AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
<!-- AdminLTE App -->
<script src={{ asset("AdminLTE/dist/js/adminlte.js") }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset("AdminLTE/dist/js/demo.js") }}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset("AdminLTE/dist/js/pages/dashboard.js") }}></script>
@yield('map_country')
{{--  <script src="{{ asset("include/js/bootstrap.js") }}"></script>  --}}
<script src="{{ asset("include/js/map1.js") }}"></script>
<script src="{{ asset("include/js/get_department_ajax.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.7/themes/fa/theme.min.js"></script>

<!-- the jQuery Library -->
<script src={{ asset("include/js/jquery-3.6.0.min.js") }}></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
<script>
    $.fn.fileinputBsVersion = "3.3.7";
$("#input-id").fileinput({
'showUpload':false,
'allowedFileTypes': ['image'],
'showCancel': true,
"theme": 'fa',
"showClose": false,
"showDelete":false,
initialPreview: [


    @if(Route::currentRouteName()=="edit_product")
    @foreach(\App\Models\img::where("product_id",$product->id)->get() as $product1)
        '<img src="{{ asset("img/upload/product/$product1->name") }}" class="" style="height:160px;width:100%">',

        @endforeach

        @endif



],
initialPreviewAsData: true, // defaults markup
initialPreviewConfig: [
    @if(Route::currentRouteName()=="edit_product")
    @foreach(\App\Models\img::where("product_id",$product->id)->get() as $product1)
    {previewAsData: false, size: 823782, caption: "{{ $product1->name }}", url: "{{ asset("img/upload/product/") }}", key: 13},

        @endforeach
    @endif
    ],

});
</script>
<script src="{{ asset("include/js/js_admin.js") }}"></script>
</body>
</html>
