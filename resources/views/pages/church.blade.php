@extends('layout.main')
@section('title', 'Catedral Church')
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

                                <h1 data-animation="fadeInUp" data-delay=".6s">Catedral Church</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="bg-primary py-4">
        <div class="container">
            <h3 class="text-banner">gathering online 10a + 1p + 5p + 8p </h3>
        </div>
    </div>
    <section>
        <div class="row no-gutters">
            <div class="col-lg-6 min-h-50  bg-cover"
                style="background-image: url('https://passioncitychurch.com/wp-content/uploads/2019/07/IMG_7311.jpg')">
            </div>
            <div class="col-lg-6 min-h-50 bg-light">
                <div class="p-5">
                    <h2 class="text-dark">// LOCATION PASTOR //</h2>
                    <h2 class="text-dark"> GRANT + MAGGIE PARTRICK</h2>
                    <p>Passion City Church Cumberland is pastored by Grant Partrick. </p>

                    <p>Together, he and his wife Maggie, have been a part of the Passion team since 2014 and live with
                        their daughter, Mercy, in Atlanta. Previously Grant served as the Pastor of Passion Students
                        where he challenged middle and high school students to live lives focused on Jesus.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-dark py-4">
        <div class="container">
            <h3 class="text-banner text-white">happening in our house</h3>
        </div>
    </div>
    <section>
        <div class="row no-gutters">
            <div class="col-lg-12">
                <a href="#">
                    <img src="https://passioncitychurch.com/wp-content/uploads/2020/04/CG-web-banner-copy-2048x464.jpg" alt=""class="img-fluid">
                </a>
                
            </div>
            <div class="col-lg-12">
                <img src="https://passioncitychurch.com/wp-content/uploads/2020/03/PASSION_ROAR_Available-Now_Website-Billboard_Banner-2048x464.png" alt=""class="img-fluid">
            </div>
            <div class="col-lg-12">
                <img src="https://passioncitychurch.com/wp-content/uploads/2019/12/Billboard.jpg" alt=""class="img-fluid">
            </div>
            <div class="col-lg-12">
                <img src="https://passioncitychurch.com/wp-content/uploads/2019/05/2560x580.NF_.Gold_.jpg" alt=""class="img-fluid">
            </div>
            <div class="col-lg-12">
                <img src="https://passioncitychurch.com/wp-content/uploads/2018/06/2560x580.BB_.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-12">
                <img src="https://passioncitychurch.com/wp-content/uploads/2018/03/Baptism.BB_.2.png" alt="" class="img-fluid">
            </div>
        </div>
    </section>
</main>
@endsection
