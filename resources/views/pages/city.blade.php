@extends('layout.main')
@section('title', 'Jakarta')
@section('page-container')
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="video-bg bg-cover" style="background-image: url('/assets/img/bg-mountain.jpg')">
            <div class="color-overlay"></div>
        </div>
        <div class="slider-active">
            <div class="single-slider min-h-50 slider-height d-flex align-items-center pt-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__caption">
                                <h3 class="text-center">Welcome to</h3>
                                <h1 data-animation="fadeInUp" data-delay=".6s">Passion City Church</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="bg-primary py-4">
        <div class="container"><h3 class="text-banner">for God. for People. for the City. for the World.</h3></div>
    </div>
    <section>
        <div class="row no-gutters">
            <div class="col-lg-6 min-h-50 bg-cover bg-grayscale" style="background-image: url('https://deathseal.files.wordpress.com/2018/10/jakarta-cityscape.jpg')">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <a href="/city/church">
                    <img src="https://passioncitychurch.com/wp-content/uploads/2017/08/515.FI_-768x427.png" alt="">
                </a>
                </div>
            </div>
            <div class="col-lg-6 min-h-50 bg-cover bg-grayscale" style="background-image: url('https://live.staticflickr.com/7218/7195730136_fec79a6f62_b.jpg')">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <a href="/city/church"> <img src="https://passioncitychurch.com/wp-content/uploads/2017/08/515.FI_-768x427.png" alt=""></a>
                   
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
