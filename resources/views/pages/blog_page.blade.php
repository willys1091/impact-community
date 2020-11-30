@extends('layout.main')
@section('title', $content->title)
@section('page-container')
<!-- Blog Details Section Begin -->
{{--<section class="blog-details spad py-0">
    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead d-flex" style="background-image: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.7) 100%),url('{{asset('/img/blog/thumbnail/'.$blog_page->thumbnail_img)}}')">
        <div class="container h-100 py-5 my-auto">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">{{$blog_page->title}}</h1>
                    <p class="lead text-light">Artikel by Arif Furniture</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-desc text-justify">
                        <img src="{{asset('/img/blog/thumbnail/'.$blog_page->thumbnail_img)}}" class="thumbnail-blog-img rounded" alt="...">

                        {!!$blog_page->content!!}
                        
                    </div>
                   
                    <div class="blog-more">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="https://www.ariffurniture.co.id/wp-content/uploads/2020/07/kursi-makan-scaled.jpg" alt="" height="300px" style="object-fit: cover">
                            </div>
                            <div class="col-sm-4">
                                <img src="https://www.ariffurniture.co.id/wp-content/uploads/2020/08/Set-Meja-Makan-Gold-Luxury-Jepara.jpg" alt="" height="300px" style="object-fit: cover">
                            </div>
                            <div class="col-sm-4">
                                <img src="https://www.ariffurniture.co.id/wp-content/uploads/2020/08/Bufet-TV-Klasik-Minimalis-Terbaru.jpg" alt="" height="300px" style="object-fit: cover">
                            </div>
                        </div>
                    </div>
                    <div class="blog-quote">
                        <p>“ Each piece [of wood] is unique, so we have to pay attention to it, and I certainly try to read each piece. Like people, it’s flaws are what make it interesting.” <span>- Greg Goodman</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!-- Blog Details Section End -->
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


