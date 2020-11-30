<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/Logo_only.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/slicknav.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/venobox.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="/assets/img/Logo_only.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="/"><img src="/assets/img/Logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/watch">Watch</a></li>

                                            @foreach ($data['city'] as $item)
                                           
                                            <li><a href="{{route('city_detail',['url'=>$item->url])}}">{{$item->title}}</a>
                                                @php
                                                    $i = 0 ;
                                                @endphp
                                                
                                                @foreach ($data['church'] as $key=>$item2)
                                                    @if ($item->id == $item2->parent)
                                                        @if ($i == 0)
                                                            <ul class="submenu">
                                                        @endif
                                                        
                                                        <li><a href="{{route('church_detail',['url'=>$item2->url])}}">{{$item2->title}}</a></li>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                        
                                                    @endif
                                                    @if ($i > 0 && $key==count($data['church'])-1 )
                                                        </ul>
                                                    @endif
                                                    
                                                        
                                                
                                                @endforeach
                                            
                                            
                                            </li>
                                           
                                                    
                                            @endforeach

                                            {{--@foreach ($data['prepareData'] as $item)
                                            @if ($item->parent != null)
                                            <li><a href="{{route('church_detail',['url'=>'catedral-church-jakarta'])}}">{{$item->name}}</a>
                                            
                                            </li>
                                            @endif
                                                    
                                            @endforeach

                                            <li><a href="/city">Jakarta</a>
                                                <ul class="submenu">
                                                    <li><a href="/church">Catedral</a></li>

                                                </ul>
                                            </li>
                                            {{--<li><a href="/care">Care</a>
                                                <ul class="submenu">
                                                    <li><a href="/care/firerelief">Fire Relief</a></li>

                                                </ul>
                                            </li>--}}
                                            <li><a href="/update">Update</a>
                                                <ul class="submenu">
                                                    @foreach ($data['prepareData'] as $item)
                                                    @if ($item->type == 'info')
                                                    <li><a href="{{route('update_filter',['url'=>$item->url])}}">{{$item->name}}</a></li>
                                                    @endif
                                                    
                                                    @endforeach
                                                    

                                                </ul>
                                            </li>
                                            {{--<li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul>
                                            </li>--}}
                                            <li><a href="/contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                {{--<div class="header-right-btn f-right d-none d-lg-block ml-20">
                                    <a href="contact.html" class="btn header-btn">Contact now</a>
                                </div>--}}
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    @yield('page-container')
    <footer>
        <!--? Footer Start-->
        <div class="footer-area footer-bg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <h3 class="mb-5">Passion City Online is part
                        of the Passion Movement.</h3>
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <h4><strong>Passion City Church</strong></h4>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">(404) 231-7080 <br>
                                            515 GARSON DRIVE NE
                                            ATLANTA, GA 30324</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4><strong>Information</strong> </h4>
                                    <ul>
                                        <li><a href="#">Email Updates</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="{{route('recruitment')}}">Join Our Team</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4><strong>The Movement</strong> </h4>
                                    <ul>





                                        <li><a href="#">Passion Conferences</a></li>
                                        <li><a href="#">Passion Camp</a></li>
                                        <li><a href="#">Passion Holy Land</a></li>
                                        <li><a href="#">Passion Global Insitute</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Instagram -->
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4><strong>Follow</strong></h4>
                                </div>
                                <div class="instagram-gellay">
                                    <h5><a href="#"> <i class="fa fa-facebook mr-3" aria-hidden="true"></i></a><a
                                            href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());

                                    </script> All rights reserved | Church Powered by <a style="color: rgb(53, 53, 53)" href="https://colorlib.com"
                                        target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/animated.headline.js"></script>
    <script src="/assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="/assets/js/contact.js"></script>
    <script src="/assets/js/jquery.form.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="/assets/js/mail-script.js"></script>
    <script src="/assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="/assets/js/vendor/venobox.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/main.js"></script>
    <script>
        $(document).ready(function () {
            document.getElementById('vid').play();
        });

    </script>

</body>

</html>
