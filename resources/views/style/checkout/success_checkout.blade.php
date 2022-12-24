
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ asset("include/css/bootstrap.css") }}"/>
{{-- <link rel="stylesheet" href="{{ asset("include/css/product_details.css") }}"> --}}
<link rel="stylesheet" href="{{ asset('site/css1/vendor.css') }}">        
<link rel="stylesheet" href={{ asset('site/style.css') }}>    
<link rel="stylesheet" href="{{ asset("include/fontawesome/css/all.min.css") }}">
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>

</head>
<body class="config" style="background:rgb(221, 221, 221)">
    @include('style.layout.navbar')
  
    <div class="u-s-p-y-60 " style="padding: 0px;padding-top:10px;background:rgb(223, 227, 230)">

      
      <!--====== Section Content ======-->
      <div class="section__content" style="background:rgb(223, 227, 230)">
          <div class="container">
              <div class="breadcrumb">
                  <div class="breadcrumb__wrap w-100" style="background: rgb(46, 46, 46)">
                      <ul class="breadcrumb__list w-100 list-unstyled d-flex " style="color:white;text-decoration:none">
                          <li class="has-separator pt-3  ms-4">

                              <a  style="color:white;text-decoration:none" href="{{ route('show_style_user') }}">{{ __("messages.Home") }}</a></li>
                          <li class="is-marked ms-4 pt-3">

                              <a style="color:white;text-decoration:none" href="{{ route("show_style_user") }}">{{ __("messages.My Cart") }}</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  
  </div>

<form action="{{ route('processTransaction') }}">
    <div class="container">
    @if(\Session::has('error'))
    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
    {{ \Session::forget('error') }}
@endif
@if(\Session::has('success'))
    <div class="alert alert-success">{{ \Session::get('success') }}</div>
    {{ \Session::forget('success') }}
@endif
    </div>
  <div class="container">
          <div class="alert alert-success">Now you can contact with the phone</div>

</div>
@include("style.layout.footer1")
<script src="{{ asset("include/js/jquery-3.6.0.min.js") }}"></script>
<script src="{{ asset("include/js/bootstrap.js") }}"></script>

</html>