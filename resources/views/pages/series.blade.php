@extends('layout.main')
@section('title', $title)
@section('page-container')
<main>
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="video-bg bg-cover" style="background-image: url('/assets/img/bg-mountain.jpg');bottom:90px;">
            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <div class="single-slider slider-height min-h-70 d-flex align-items-center flex-column">

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12 my-5">
                            <div class="hero__caption">
                                <div class="embed-responsive embed-responsive-16by9">
                                    @php
                                        if ($watch_selected!=null) {
                                            $selected = $watch_selected;
                                        } else {
                                            $selected = $watch[0];
                                        }
                                    @endphp

                                    <iframe width="1280" height="640" src="https://www.youtube.com/embed/{{$selected['url_video']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    {{--<iframe class="embed-responsive-item" data-animation="fadeInUp" data-delay=".6s"
                                        src="https://youtu.be/Pyml68f5WkY" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>--}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-dark w-100 z-index-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title-watch">
                                    <h2>Now watching: {{$selected['title']}}
                                    </h2>
                                    <h2 class="ml-auto">SERIES: {{$selected['seriesCat']['name']}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- slider Area End-->
    <!--? About Area start -->

    <!-- Services Area End -->
    <!--? Blog Ara Start -->
    <section class="home-blog-area section-padding30">
        <div class="container">
            <h3 class="title-list-watch mb-4">Message Series</h3>
            <div class="row">
               
                @foreach ($watch as $item)
                <div class="col-lg-4">
                    <div class="single-team mb-30">
                        
                        <div class="team-img">
                            <a href="{{route('series_detail', ['url' => $item->url_web])}}">
                            <img src="https://i.ytimg.com/vi/{{$item->url_video}}/maxresdefault.jpg"
                                alt="" class="rounded">
                            </a>
                            <div class="date-message">
                                {{ changeDateFormate(date($item->created_at),'m F Y')  }}
                               
                            </div>
                        </div>
                        <div class="team-caption">
                            <h3 class="m-0"><a href="{{route('series_detail', ['url' => $item->url_web])}}">
                               <strong>{{$item->title}}</strong> 
                            </a></h3>
                            <h4 class="m-0"><a href="{{route('series', ['url' => $item->seriesCat->url])}}">
                                {{$item->seriesCat->name}}
                            </a></h4>
                            
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
</main>
@endsection
