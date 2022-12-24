<!DOCTYPE html>
<html class="no-js" lang="en-US">

<head>
    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ \App\Models\setting::find(1)->description }}">
    <meta name="author" content="Ali Hmaidi">
    <title>Groover - Online Shopping for Electronics, Apparel, Computers, Books, DVDs & more</title>
    <!-- Standard Favicon -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset("site2/css/bootstrap.min.css") }}">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{ asset("site2/css/fontawesome.min.css") }}">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="{{ asset("site2/css/ionicons.min.css") }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset("site2/css/animate.min.css") }}">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{ asset("site2/css/owl.carousel.min.css") }}">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="{{ asset("site2/css/jquery-ui-range-slider.min.css") }}">
    <!-- Utility -->
    <link rel="stylesheet" href="{{ asset("site2/css/utility.css") }}">
    <!-- Main -->
    <link rel="stylesheet" href="{{ asset("site2/css/bundle.css") }}">
    <style>
    .is-invalid{

        border: 1px solid rgb(207, 0, 0);
    }
 
    
#news_letter1{

width: 50%;
}
@media(max-width:500px){

#news_letter1{

    width: 100%;

}

}


@media(min-width:500px){

#news_letter1{

    width: 80%;

}

}
@media(min-width:800px){

#news_letter1{

    width: 60%;

}

}
    
    </style>
    @yield('css')
</head>

<body>