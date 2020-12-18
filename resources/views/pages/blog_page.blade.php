@extends('layout.main')
@section('title', $content->title)
@section('page-container')
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
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{$content->thumbnail_img}}" alt="">
                </div>
                <div class="blog_details">
                   <h2 style="color: #2d2d2d;">{{$content->title}}
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                    @if ($content->category!=null)
                    @php
                    $cat_selected = json_decode($content->category);
                    @endphp
                    @foreach ($cat_selected as $item2)
                    @foreach ($data['prepareData'] as $item3)
                    @if ($item2==$item3['id'])
                    <li><a href="#"><i class="fa fa-user"></i>
                        {{$item3['name']}}</a></li>

                    @endif

                    @endforeach
                    @endforeach

                    @endif
                   </ul>
                   {!!$content->content !!}

                </div>
             </div>
             <div class="navigation-top">

                <div class="navigation-area">
                   <div class="row">
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                         <div class="thumb">
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-left"></span>
                            </a>
                         </div>
                         <div class="detials">
                            <p>Prev Post</p>
                            <a href="#">
                               <h4 style="color: #2d2d2d;">Space The Final Frontier</h4>
                            </a>
                         </div>
                      </div>
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                         <div class="detials">
                            <p>Next Post</p>
                            <a href="#">
                               <h4 style="color: #2d2d2d;">Telescopes 101</h4>
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-right"></span>
                            </a>
                         </div>
                         <div class="thumb">
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/next.png" alt="">
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>

          </div>

       </div>
    </div>
 </section>

@endsection


