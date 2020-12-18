@extends('layout.main')
@section('title', 'Homepage')
@section('page-container')
@inject('general', 'App\Http\Controllers\PageController')
<main>
    <div class="slider-area ">
        <div class="video-bg">
            <video id="vid" width="100%" height="100%" autobuffer="false" autoplay="true" muted loop>
                <source src="{{asset($top_quote->thumbnail_img)}}" type="video/mp4">
            </video>
            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                {!! $top_quote->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <section class="about-area about1 section-padding30" style="margin-bottom: -300px; padding-bottom: 300px;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-8">
                    <div class="about-caption2 mb-50">
                        <h3>Pesan Minggu ini, <br> {{$watchData[0]->title}}</h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-caption text-right">
                        <h3 class="mb-0">Next Online Gathering:</h3>
                        <h4>{{ date("j F, Y", strtotime($schedule->time))}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-blog-area section-padding30" style="padding-top: 0px;">
        <div class="container mb-5">
            <div class="card bg-dark text-white">
                <img src="https://i.ytimg.com/vi/{{$watchData[0]['url_video']}}/maxresdefault.jpg"
                    class="card-img" alt="...">
                <div class="card-img-overlay">
                    <a href="https://youtu.be/{{$watchData[0]['url_video']}}"
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
                            <h3 class="latin"><a href="{{route('content',['url'=>$article->url]) }}"> {{$general->readmore($article->title,'40')}} </a></h3>
                        </div>
                        <div class="team-img">
                            <a href="{{route('content',['url'=>$article->url]) }}">
                            <img src="{{$article->thumbnail_img}}" alt="" class="rounded"></a>
                        </div>
                        <div class="team-caption">
                            <p><a href="{{route('content',['url'=>$article->url]) }}" class="pb-2"><strong>Read the Article</strong> </a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-team mb-30">
                        <div class="team-caption">
                            <h3 class="m-0">News</h3>
                            <h3 class="latin"><a
                                href="{{route('content',['url'=>$news->url]) }}">{{$general->readmore($news->title,'40')}} </a></h3>
                        </div>
                        <div class="team-img">
                            <a href="{{route('content',['url'=>$news->url]) }}">
                            <img src="{{$news->thumbnail_img}}" alt="" class="rounded"></a>
                        </div>
                        <div class="team-caption">
                            <p><a href="{{route('content',['url'=>$news->url]) }}"class="pb-2"><strong>Read the News</strong> </a></p>
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
                        <img src="https://i.ytimg.com/vi/{{$watchData[0]['url_video']}}/maxresdefault.jpg"
                            class="card-img h-100" alt="..." style="object-fit: cover">
                        <div class="card-img-overlay">
                            <a href="https://youtu.be/{{$watchData[0]['url_video']}}"
                                class="venobox vbox-item play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row m-15">
                        @for ($i = 1; $i <= 4; $i++)
                        <div class="col-lg-6">
                            <div class="card bg-dark text-white">
                                <img src="https://i.ytimg.com/vi/{{$watchData[$i]['url_video']}}/maxresdefault.jpg"
                                    class="card-img" alt="...">
                                <div class="card-img-overlay">
                                    <a href="https://youtu.be/{{$watchData[$i]['url_video']}}"
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

    <div class="slider-area position-relative">
        <div class="video-bg">
            <video id="vid" width="100%" height="100%" autobuffer="false" autoplay="true" muted loop>
                <source
                    src="{{asset($middle_quote->thumbnail_img)}}"
                    type="video/mp4">
            </video>
            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                @php
                                //$title = $quote->content;
                                //$text=str_ireplace('<p>','',$title);
                                    //$text=str_ireplace('</p>','',$text);
                                @endphp
                                {!! $middle_quote->content !!}
                      
                                
                                <h3>Share this quote //</h3>
                                {{-- <h5><a target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F119.8.160.93%2F&quote={{$quote->title}}">
                                        <i class="fa fa-facebook mr-3" aria-hidden="true"></i></a>
                                    <a target="_blank"
                                        href="https://twitter.com/intent/tweet?url=http%3A%2F%2F119.8.160.93%2F&text={{$quote->title}}"><i
                                            class="fa fa-twitter" aria-hidden="true"></i></a></h5> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <section class="home-blog-area section-padding30">
        <div class="container">
            <h2 class="title mb-5">Social Activity</h2>
            {{-- <h3 class="latin text-dark mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla quos
                reprehenderit accusamus id eius suscipit aliquid vel. Natus, nesciunt incidunt id voluptates, quo
                accusamus fuga quibusdam quod illo sed placeat!</h3> --}}
            <div class="row m-15">
                @foreach ($social as $item)
                <div class="col-lg-4">
                    <div class="single-team mb-30">
                        <div class="team-img care">
                            <img src="{{$item->thumbnail_img}}"
                                alt="" class="rounded">
                        </div>
                        <div class="team-caption">
                            <h3 class="m-0"><a href="{{route('content',['url'=>$item->url]) }}"><strong>{{$general->readmore($item->title,'30')}}</strong></a></h3>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        </div>
    </section>
    <section class="home-blog-area section-padding30" style="padding-top: 0px;">
        <div class="container">
            <h2 class="title mb-5">City</h2>
            {{-- <h3 class="latin text-dark mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, tempora
                dolore similique optio maxime exercitationem sint facere numquam odio vero debitis incidunt quidem, odit
                accusamus voluptatibus in, cupiditate repellat totam?</h3> --}}
            <div class="row m-15">
                @foreach ($city as $item)
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
            <h2 class="title mb-5">Church</h2>
            {{-- <h3 class="latin text-dark mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, tempora
                dolore similique optio maxime exercitationem sint facere numquam odio vero debitis incidunt quidem, odit
                accusamus voluptatibus in, cupiditate repellat totam?</h3> --}}
            <div class="row m-15">
                @foreach ($church as $item)
                <div class="col-lg-{{12/count($church)}}">
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
            <img src="{{asset($bottom_quote->thumbnail_img)}}"
                class="w-100 h-100" style="object-fit: cover;" alt="">

            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">

            <div class="single-slider slider-height d-flex align-items-center">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                {!! $bottom_quote->content !!}
                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
