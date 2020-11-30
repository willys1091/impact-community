@extends('layout.main')
@section('title', 'Update')
@section('page-container')
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="video-bg bg-cover"
            style="background-image: url('https://cdn2.tstatic.net/tribunnews/foto/bank/images/pertamina-marketing-operation-fire-rescue-competition-mofrc.jpg')">
            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <div class="single-slider min-h-50 slider-height d-flex align-items-center pt-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                <h3 class="text-center">Update of Impact Community</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section class="py-5">
        <div class="container">
            @foreach ($blog as $item)
            <div class="card mb-3 border-0">
                <div class="row no-gutters">
                  <div class="col-md-6">
                    <img src="{{$item->thumbnail_img}}" class="card-img" alt="{{$item->title}}">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <a href="{{route('content',['url'=>$item->url])}}"><h5 class="card-title text-dark">{{$item->title}}</h5></a>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">
                        @if ($item->category!=null)
                        @php
                        $cat_selected = json_decode($item->category);
                        @endphp
                        @foreach ($cat_selected as $item2)
                        @foreach ($data['prepareData'] as $item3)
                        @if ($item2==$item3['id'])
                        <a href="#" class="badge badge-dark">{{$item3['name']}}</a>
                        @endif
                        
                        @endforeach
                        @endforeach
                        
                        @endif
                        

                        </small></p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            
            {{--<div class="w-100 my-4">
                <div class="d-flex">
                    <div class="line-nav-secondary my-auto flex-grow-1">
                    </div>
                    <div class="px-4">
                        <h3 class="text-dark">DONATE GIFT CARDS</h3>
                    </div>
                    <div class="line-nav-secondary my-auto flex-grow-1">

                    </div>
                </div>
            </div>


            <p>Right now, the best way to help is by providing gift cards to the families who’ve been displaced to local
                restaurants, grocery stores, Target, Walmart, etc. so they can replace the essential items they most
                need. If you’d like to provide gift cards, you can drop those off at our 515 location any day between 9a
                – 5p.

                You can also purchase an e-gift card and have it sent to firerelief@passioncitychurch.com and we will
                ensure it goes directly to the victims of the fire.</p>
            <div class="w-100 my-4">
                <div class="d-flex">
                    <div class="line-nav-secondary my-auto flex-grow-1">
                    </div>
                    <div class="px-4">
                        <h3 class="text-dark">HAVE SOMETHING ELSE TO DONATE
                        </h3>
                    </div>
                    <div class="line-nav-secondary my-auto flex-grow-1">

                    </div>
                </div>
            </div>


            <p>If you own a business or are from another church and would like to help out in some other way, reach our Team through firerelief@passioncitychurch.com.

            </p>--}}
        </div>
    </section>
</main>
@endsection
