@extends('layout.main')
@section('title', 'Homepage')
@section('page-container')
<main>
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="video-bg">
            <video id="vid" width="100%" height="100%" autobuffer="false" autoplay="true" muted loop>
                <source
                    src="assets/video/5e8cd396f9ea7c01bd0158de_Passion-live-b-roll-loop-1080-compressed-transcode.mp4"
                    type="video/mp4">
            </video>
            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <!-- Single Slider -->

            <div class="single-slider slider-height d-flex align-items-center">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInUp" data-delay=".6s">Socially Distant, not Spiritually
                                    Distant</h1>
                                <!-- Hero-btn --/>
                            <div class="hero__btn">
                                <a href="industries.html" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s">Watch Portfolio</a>
                            </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <!--<div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-8">
                        <div class="hero__caption">
                            <span data-animation="fadeInUp" data-delay=".4s">Creative Photographey</span>
                            <h1 data-animation="fadeInUp" data-delay=".6s">Photography Make us happy Take a shot.</h1>
                            <!-- Hero-btn --/>
                            <div class="hero__btn">
                                <a href="industries.html" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s">Watch Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Man Img --/>
            <div class="hero-man">
                <img src="assets/img/hero/hero_man1.png" alt="">
            </div>
        </div>-->
        </div>
    </div>
    <!-- slider Area End-->
    <!--? About Area start -->
    <section class="about-area about1 section-padding30" style="margin-bottom: -300px; padding-bottom: 300px;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-8">
                    <div class="about-caption2 mb-50">
                        <h3>Pesan Minggu ini, <br> {{$data['watchData'][0]['title']}}</h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-caption text-right">
                        <h3 class="mb-0">Next Online Gathering:</h3>
                        @php
                        $d=strtotime($schedule->time);
                        $date = date("j F, Y", $d);
                        @endphp
                        <h4>{{$date}}</h4>
                    </div>
                </div>
            </div>

        </div>


        <!--? Brand Shape  --/>
    <div class="about-shape d-none d-xl-block">
        <img src="assets/img/gallery/about_shape.png" alt="">
    </div>-->
    </section>

    <!-- Services Area End -->
    <!--? Blog Ara Start -->
    <section class="home-blog-area section-padding30" style="padding-top: 0px;">
        <div class="container mb-5">
            <div class="card bg-dark text-white">
                <img src="https://i.ytimg.com/vi/{{$data['watchData'][0]['url_video']}}/maxresdefault.jpg"
                    class="card-img" alt="...">
                <div class="card-img-overlay">
                    <a href="https://youtu.be/{{$data['watchData'][0]['url_video']}}"
                        class="venobox vbox-item play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-team mb-30">
                        <div class="team-caption">
                            <h3 class="m-0">Article</h3>
                            <h3 class="latin"><a
                                href="{{route('content',['url'=>$data['content']['article']->url]) }}">
                                {{$data['content']['article']->title}}
                            </a></h3>
                        </div>
                        <div class="team-img">
                            <a href="{{route('content',['url'=>$data['content']['article']->url]) }}">
                            <img src="{{$data['content']['article']->thumbnail_img}}"
                                alt="" class="rounded"></a>
                        </div>
                        <div class="team-caption">
                            <p><a href="{{route('content',['url'=>$data['content']['article']->url]) }}"
                                    class="pb-2"><strong>Read the
                                        Article</strong> </a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-team mb-30">
                        <div class="team-caption">
                            <h3 class="m-0">News</h3>
                            <h3 class="latin"><a
                                href="{{route('content',['url'=>$data['content']['news']->url]) }}">
                                {{$data['content']['news']->title}}
                            </a></h3>
                        </div>
                        <div class="team-img">
                            <a href="{{route('content',['url'=>$data['content']['news']->url]) }}">
                            <img src="{{$data['content']['news']->thumbnail_img}}"
                                alt="" class="rounded"></a>
                        </div>
                        <div class="team-caption">
                            <p><a href="{{route('content',['url'=>$data['content']['news']->url]) }}"
                                    class="pb-2"><strong>Read the
                                        News</strong> </a></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="home-blog-area section-padding30" style="padding-top: 0px;">
        <div class="container">
            <h2 class="title mb-3">Everyday Resource</h2>
            <div class="row m-15">
                <div class="col-lg-6 d-flex">
                    <div class="card bg-dark text-white">
                        <img src="https://i.ytimg.com/vi/{{$data['watchData'][0]['url_video']}}/maxresdefault.jpg"
                            class="card-img h-100" alt="..." style="object-fit: cover">
                        <div class="card-img-overlay">
                            <a href="https://youtu.be/{{$data['watchData'][0]['url_video']}}"
                                class="venobox vbox-item play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row m-15">
                        @for ($i = 1; $i <= 4; $i++)
                        <div class="col-lg-6">
                            <div class="card bg-dark text-white">
                                <img src="https://i.ytimg.com/vi/{{$data['watchData'][$i]['url_video']}}/maxresdefault.jpg"
                                    class="card-img" alt="...">
                                <div class="card-img-overlay">
                                    <a href="https://youtu.be/{{$data['watchData'][$i]['url_video']}}"
                                        class="venobox vbox-item play-btn mb-4" data-vbtype="video"
                                        data-autoplay="true"></a>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--<section class="home-blog-area section-padding30" style="padding-top: 0px;">
        <div class="container">
            <h2 class="title">For God. For People. <br>
                For the City. For the World.</h2>
            <h3 class="latin text-dark mb-3">We’re creating everyday tools for you as we all walk through these days
                together.</h3>
            <div class="row m-15">
                @for ($i = 0; $i < 4; $i++) <div class="col-lg-3">
                    <div class="single-team mb-30">

                        <div class="team-img">
                            <img src="https://assets-global.website-files.com/5e835905a5598254225ee31a/5e83597100b4e4e7024b6474_card__pastor-l-p-500.jpeg"
                                alt="" class="rounded">
                        </div>
                        <div class="team-caption">
                            <h3 class="m-0"><a href="/watch">
                                    Join us online
                                </a></h3>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
        </div>
    </section>--}}
    <div class="slider-area position-relative">
        <div class="video-bg">
            <video id="vid" width="100%" height="100%" autobuffer="false" autoplay="true" muted loop>
                <source
                    src="assets/video/5e8cd396f9ea7c01bd0158de_Passion-live-b-roll-loop-1080-compressed-transcode.mp4"
                    type="video/mp4">
            </video>
            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <!-- Single Slider -->

            <div class="single-slider slider-height d-flex align-items-center">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                @php
                                $title = $quote->content;
                                $text=str_ireplace('<p>','',$title);
                                    $text=str_ireplace('</p>','',$text);
                                @endphp
                                <h3>{{$text}}</h3>
                                <h2 data-animation="fadeInUp" data-delay=".6s" class="text-justify">
                                    <div class="hanging-quote">“</div>{{$quote->title}}”
                                </h2>
                                <h3>Share this quote //</h3>
                                <h5><a target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F119.8.160.93%2F&quote={{$quote->title}}">
                                        <i class="fa fa-facebook mr-3" aria-hidden="true"></i></a>
                                    <a target="_blank"
                                        href="https://twitter.com/intent/tweet?url=http%3A%2F%2F119.8.160.93%2F&text={{$quote->title}}"><i
                                            class="fa fa-twitter" aria-hidden="true"></i></a></h5>
                                <!-- Hero-btn --/>
                            <div class="hero__btn">
                                <a href="industries.html" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s">Watch Portfolio</a>
                            </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <!--<div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-8">
                        <div class="hero__caption">
                            <span data-animation="fadeInUp" data-delay=".4s">Creative Photographey</span>
                            <h2 data-animation="fadeInUp" data-delay=".6s">Photography Make us happy Take a shot.</h1>
                            <!-- Hero-btn --/>
                            <div class="hero__btn">
                                <a href="industries.html" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s">Watch Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Man Img --/>
            <div class="hero-man">
                <img src="assets/img/hero/hero_man1.png" alt="">
            </div>
        </div>-->
        </div>
    </div>
    <section class="home-blog-area section-padding30">
        <div class="container">
            <h2 class="title">Social Activity</h2>
            <h3 class="latin text-dark mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla quos
                reprehenderit accusamus id eius suscipit aliquid vel. Natus, nesciunt incidunt id voluptates, quo
                accusamus fuga quibusdam quod illo sed placeat!</h3>
            <div class="row m-15">
                @foreach ($data['content']['social'] as $item)
                <div class="col-lg-4">
                    <div class="single-team mb-30">
                        <div class="team-img care">
                            <img src="{{$item->thumbnail_img}}"
                                alt="" class="rounded">
                        </div>
                        <div class="team-caption">
                            <h3 class="m-0"><a href="{{route('content',['url'=>$item->url]) }}"><strong>{{$item->title}}</strong></a></h3>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        </div>
    </section>
    <section class="home-blog-area section-padding30" style="padding-top: 0px;">
        <div class="container">
            <h2 class="title">City</h2>
            <h3 class="latin text-dark mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, tempora
                dolore similique optio maxime exercitationem sint facere numquam odio vero debitis incidunt quidem, odit
                accusamus voluptatibus in, cupiditate repellat totam?</h3>
            <div class="row m-15">
                @foreach ($data['city'] as $item)
                <div class="col-lg-4">
                    <div class="single-team mb-30">
                        <div class="team-img care">
                            <img src="https://assets-global.website-files.com/5e7a69dac525d7ea05eb0160/5e8c8bef33a235e3a6b101dd_QGCVOZFA-p-1080.jpeg"
                                alt="" class="rounded">
                        </div>
                        <div class="team-caption">
                            <h3 class="m-0"><a href="{{route('city_detail',['url'=>$item->url]) }}"><strong>{{$item->title}}</strong></a></h3>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <section class="home-blog-area section-padding30" style="padding-top: 0px;">
        <div class="container">
            <h2 class="title">Church</h2>
            <h3 class="latin text-dark mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, tempora
                dolore similique optio maxime exercitationem sint facere numquam odio vero debitis incidunt quidem, odit
                accusamus voluptatibus in, cupiditate repellat totam?</h3>
            <div class="row m-15">
                @foreach ($data['church'] as $item)
                <div class="col-lg-{{12/count($data['church'])}}">
                    <div class="single-team mb-30">
                        <div class="team-img care">
                            <img src="https://assets-global.website-files.com/5e7a69dac525d7ea05eb0160/5e8c8bef33a235e3a6b101dd_QGCVOZFA-p-1080.jpeg"
                                alt="" class="rounded">
                        </div>
                        <div class="team-caption">
                            <h3 class="m-0"><a href="{{route('church_detail',['url'=>$item->url]) }}"><strong>{{$item->title}}</strong></a></h3>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <div class="slider-area position-relative">
        <div class="video-bg">
            <img src="https://assets-global.website-files.com/5e7a69dac525d7ea05eb0160/5e7b928ef10c2156a02ce46f_home__cta-bg-sm.jpg"
                class="w-100 h-100" style="object-fit: cover;" alt="">

            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <!-- Single Slider -->

            <div class="single-slider slider-height d-flex align-items-center">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                <h2 data-animation="fadeInUp" data-delay=".6s" class="text-justify">
                                    Subscribe to Impact Community Indonesia to study through the scriptures with us.
                                </h2>
                                <h3>Follow Along //</h3>
                                <h5><a href="#"> <i class="fa fa-facebook mr-3" aria-hidden="true"></i></a><a
                                        href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></h5>
                                <!-- Hero-btn --/>
                            <div class="hero__btn">
                                <a href="industries.html" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s">Watch Portfolio</a>
                            </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <!--<div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-8">
                        <div class="hero__caption">
                            <span data-animation="fadeInUp" data-delay=".4s">Creative Photographey</span>
                            <h2 data-animation="fadeInUp" data-delay=".6s">Photography Make us happy Take a shot.</h1>
                            <!-- Hero-btn --/>
                            <div class="hero__btn">
                                <a href="industries.html" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s">Watch Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Man Img --/>
            <div class="hero-man">
                <img src="assets/img/hero/hero_man1.png" alt="">
            </div>
        </div>-->
        </div>
    </div>
</main>
@endsection