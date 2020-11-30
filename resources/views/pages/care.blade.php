@extends('layout.main')
@section('title', 'Care - Church')
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
                                <h3 data-animation="fadeInUp" data-delay=".6s" class="text-center" style="margin-top:100px">WE’RE ALL IN THIS
                                    TOGETHER.</h3>
                            </div>
                            <p class="text-center text-white mb-4">Each of us can make a difference in the world, and
                                together our impact can be extraordinary. Whether you are looking for ways to help out
                                in your community, or are in need of assistance, there are people ready to come
                                alongside of you. After all, we’re all in this together.</p>
                            <p class="text-center">
                                @for ($i = 0; $i < 7; $i++)
                                <a class="btn btn-lg btn-light w-50 my-3" href="/care/firerelief" role="button">Fire Relief</a>
                                @endfor
                                
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
