<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bella Shop</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('st-store/assets/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="shortcut icon" href="{{asset('st-store/assets/ico/favicon.ico')}}">

    <!-- CSS Global -->
    <link href="{{asset('st-store/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('st-store/assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('st-store/assets/plugins/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('st-store/assets/plugins/prettyphoto/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('st-store/assets/plugins/owl-carousel2/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('st-store/assets/plugins/owl-carousel2/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('st-store/assets/plugins/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{asset('st-store/assets/css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('st-store/assets/css/theme-green-1.css')}}" rel="stylesheet">

    <!-- Head Libs -->
    <script src="{{asset('st-store/assets/plugins/modernizr.custom.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{asset('st-store/assets/plugins/iesupport/html5shiv.js')}}"></script>
    <script src="{{asset('st-store/assets/plugins/iesupport/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body id="home" class="wide">
<!-- WRAPPER -->
<div class="wrapper">
    @include('store.partials.popup-cart')
    @include('store.partials.topbar')

    <!-- HEADER -->
    <header class="header fixed">
        <div class="header-wrapper">
            <div class="container">

                <!-- Logo -->
                <div class="logo">
                    <a href="index.html"><img src="/st-store/assets/img/logo-bella-shop.png" alt="Bella Shop"/></a>
                </div>
                <!-- /Logo -->
                <!-- Header search -->
                <div class="header-search">
                    <input class="form-control" type="text" placeholder="What are you looking?"/>
                    <button><i class="fa fa-search"></i></button>
                </div>
                <!-- /Header search -->
                @include('store.partials.header-cart')
            </div>
        </div>
        @include('store.partials.navigation')
    </header>
    <!-- /HEADER -->