@extends('layout.main')
@section('title', 'Update')
@section('page-container')
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="video-bg bg-cover"
            style="background-image: url('https://gallery-cdn.breezy.hr/4a11648c-209a-4ce9-a499-9a2cb787ff33/breez2.jpg')">
            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <div class="single-slider min-h-50 slider-height d-flex align-items-center pt-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                <h3 class="text-center">Come join our team!</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section class="py-5">
        
        <div class="container">
            <div class="w-100 my-4">
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


            <p>Our family, Passion City Church/Passion Conferences/Passion Publishing/sixstepsrecords, are all connected by our passionate pursuit to see our city [and the world] come to know His power and beauty.</p>

            <p> We are looking for people who love Jesus, the people of Passion City Church, the city of Atlanta, and the world to join us. It is important that our team members are willing to adapt and be flexible, work above and beyond expectations, all while acting as advocates of the culture and vision of Passion. An ideal individual is low drama, high-momentum, high-capacity, positive, an over-comer, a dreamer, and a creative with a can-do-whatever-it-takes attitude.</p>
                
                <p>    To learn more about who we are, check out Passion City Church :: This is US.</p>
                <hr>
                <div class="row no-gutters">
            @foreach ($blog as $item)
            
                
                  
                  <div class="col-md-12 d-flex border rounded p-3">
                    
                      <a class="flex-grow-1" href="{{route('recruitment_detail',['url'=>$item->url])}}"><h5 class="card-title text-dark m-0">{{$item->title}}</h5></a>
                      <a href="{{route('recruitment_detail',['url'=>$item->url])}}" class="btn btn-primary">Apply</a>
                    
                  </div>
                
            @endforeach
        </div>
            

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

            </p>
        </div>
    </section>
</main>
@endsection
