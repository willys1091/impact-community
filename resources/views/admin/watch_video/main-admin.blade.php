{{--<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('/img/icons/fav_Indoarteak.png')}}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/indoarteak-main.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <meta name="google-site-verification" content="OE1xWO6zuIxH9AgpArjD1WFIOV17hsFCo4V4jv9pbZI" />

    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield('additional_head')
    <script>
        var navbar_trans = true;
        $(document).ready(function () {


            $(".navbar-toggler").click(function () {
                if (navbar_trans == true) {
                    $('nav').addClass('bg-white').removeClass('bg-white-transparent');
                    navbar_trans = false;
                } else {
                    $('nav').addClass('bg-white-transparent').removeClass('bg-white');
                    navbar_trans = true;
                }

            });
        });

    </script>
</head>

<body>
    <div class="sticky-top">
        <nav class="navbar  navbar-expand-lg navbar-light bg-wthite-transparent p-wrapper-indoarteak">
            <a class=" navbar-brand d-inline-flex" href="{{url('/')}}">
                <img src="{{asset('img/Logo_Indoarteak.png')}}" width="" height="60" alt="">
                <h5 class="d-inline mt-auto mb-0">Admin Panel</h5> 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item {{ Request::is('ia-admin/dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="/ia-admin/dashboard">Dashboard Home</a>
                    </li>
                    <li class="nav-item {{Request::is('ia-admin/product/*') || Request::is('ia-admin/product') ?'active':''}}">
                        <a class="nav-link" href="/ia-admin/product">Product</a>
                    </li>
                    <li class="nav-item {{Request::is('ia-admin/blog/*') || Request::is('ia-admin/blog') ?'active':''}}">
                        <a class="nav-link" href="/ia-admin/blog">Blog</a>
                    </li>
                    <li class="nav-item {{Request::is('ia-admin/logout')?'active':''}}">
                        <a class="nav-link" href="{{route('admin.logout')}}">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="w-100 p-wrapper-indoarteak-2 mb-3">
            <div class="line-nav w-100">

            </div>
        </div>
    </div>

    @yield('container')
    <div class="w-100 bg-main-color  p-wrapper-indoarteak">
        <div class="row">
            <div class="col-md-6 py-2">
                <p class="m-0 text-black">
                    Copyright @2008, Indoarteak - Toko Furniture Jepara Murah Berkualitas
                </p>
            </div>
            <div class="col-md-6 d-flex flex-row-reverse py-2">
                <div class="">
                    <div id="histats_counter"></div>
                    <!-- Histats.com  START  (aync)-->
                    <script type="text/javascript">
                        var _Hasync = _Hasync || [];
                        _Hasync.push(['Histats.startgif', '1,4422660,4,8006,"undefined"']);
                        _Hasync.push(['Histats.fasi', '1']);
                        _Hasync.push(['Histats.track_hits', '']);
                        (function () {
                            var hs = document.createElement('script');
                            hs.type = 'text/javascript';
                            hs.async = true;
                            hs.src = ('//s10.histats.com/js15_gif_as.js');
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0])
                            .appendChild(hs);
                        })();
    
                    </script>
                    <noscript><a href="/" alt="hit counter code" target="_blank">
                            <div id="histatsC"><img border="0" src="//s4is.histats.com/8006.gif?4422660&103"></div>
                        </a>
                    </noscript>
                    
                </div>
                
                
            </div>
        </div>

    </div>
</body>

</html>--}}

{{--@extends('layout.main-admin')
@section('title', 'Admin Panel - Indoarteak')
@section('container')
    <div class="image-box h-min100vh">
        <div class="image-box-background">
        </div>
        <div class=""></div>
        <div class="image-box-content h-100vh py-3">
            <img src="{{asset('images/logo1.png')}}" width="auto" height="300" class="d-inline-block align-top p-5"
                    alt="">
            <div>

            </div>
        </div>
    </div>
    
@endsection--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Arif Furniture">
    <meta name="author" content="Arif Furniture">
    <meta name="keywords" content="Arif Furniture">
    <link rel="shortcut icon" href="{{asset('/img/icons/Icon_ArifFurniture.png')}}" type="image/x-icon">

    <!-- Title Page-->
    
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">
    @yield('additional_head')
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('img/icons/Logo Mebel Arif Furniture.png')}}" alt="Arif Furniture" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    
                    <ul class="navbar-mobile__list list-unstyled">
                        
                        <li class="active">
                            <a href="{{route('admin.index')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>Products</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('admin.product.create')}}">Add Product</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.product.index')}}">View Products</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>Category</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('admin.categoryProduct.create')}}">Add Category</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.categoryProduct.index')}}">View Category</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>Article</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('admin.blog.create')}}">Add Article</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.blog.index')}}">View Article</a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                        <a href="{{route('admin.fAQ.index')}}">
                            <i class="fas fa-tachometer-alt"></i>FAQ</a>
                        </li>
                        <li class="">
                            <a href="{{route('admin.postTemplate.index')}}">
                                <i class="fas fa-tachometer-alt"></i>Template</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('img/icons/Logo Mebel Arif Furniture.png')}}" alt="Arif Furniture" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        
                        <li class="active">
                            <a href="{{route('admin.index')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>Products</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('admin.product.create')}}">Add Product</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.product.index')}}">View Products</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>Category</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('admin.categoryProduct.create')}}">Add Category</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.categoryProduct.index')}}">View Category</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>Article</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('admin.blog.create')}}">Add Article</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.blog.index')}}">View Article</a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="{{route('admin.fAQ.index')}}">
                                <i class="fas fa-tachometer-alt"></i>FAQ</a>
                            </li>
                            <li class="">
                                <a href="{{route('admin.postTemplate.index')}}">
                                    <i class="fas fa-tachometer-alt"></i>Template</a>
                            </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                           
                            <div class="header-button w-100">
                                
                                <div class="account-wrap w-100">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body p-0">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <form action="{{route('admin.logout')}}" method="post">
                                                    @csrf
                                                <button type="submit" class="w-100">
                                                    <a class="text-left">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </button>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    @yield('page-container')
                </div>
            </div>
        
    </div>

    </div>

    <!-- Jquery JS-->
    <script src="/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/vendor/slick/slick.min.js">
    </script>
    <script src="/vendor/wow/wow.min.js"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/js/main-dashboard.js"></script>
    @yield('additional_script')

</body>

</html>
<!-- end document-->


