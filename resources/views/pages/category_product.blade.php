@extends('layout.main')
@section('title', 'Berbagai Jenis Furniture Murah Jepara - Indoarteak')
@section('additional_footer')
<script>

$(document).ready(function () {
        var height = $(".product-square").width();
        $(".product-square").height(height);
    });

    $(window).resize(function () {
        var height = $(".product-square").width();
        $(".product-square").height(height);
    });

    $(document).ready(function () {
        var owl = $('.owl-carousel.category');
        owl.owlCarousel({
            items: 1,
            itemsDesktop: false,
            itemsDesktopSmall: false,
            itemsTablet: false,
            itemsMobile: false,
            nav:true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,

        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [2000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })
    })
</script>
@endsection
@section('container')
<section class="product-shop spad pt-0">
    <div class="container">
        <div class="owl-carousel owl-theme category my-3 pic-slider-category">
            @foreach ($data['category'] as $item)
            @if ($item->sub_category==null)
            <div class="item w-100">
                <img src="{{asset('/img/category/'.$item->pic)}}" width="100%" 
                    class="img-cover" alt="">
            </div>
            @endif
            @endforeach
        </div>
        <div class="d-flex mb-3">
            <div class="line-nav-secondary my-auto flex-grow-1">
            </div>
            <div class="px-4">
                <h2>Semua Kategori</h2>
            </div>
            <div class="line-nav-secondary my-auto flex-grow-1">
    
            </div>
        </div>
        <div class="my-3">
            <div class="row m-0">
            @foreach ($data['category'] as $item)
            @if ($item->sub_category==null)
           
                <div class="col-md-4 p-3">
                    <div class="card h-100">
                        <img src="{{asset('/img/category/'.$item->pic)}}" class="card-img-top all-category-pic" alt="...">
                        <div class="card-body d-flex flex-column">
                          <h3 class="card-title text-center"><b><a class="nodecor" href="{{route('category',['category_name' => $item->url])}}">{{$item->category_name}}</a> </b></h3>
                          <p class="card-text flex-grow-1 d-flex flex-column justify-content-center">
                              
                                @foreach ($data['category'] as $item2)
                                @if ($item->id==$item2->sub_category)
                                <a href="{{route('category',['category_name' => $item2->url])}}" class="btn btn-sm btn-outline-success btn-block "><i class="fa fa-check" aria-hidden="true"></i> {{$item2->category_name}}</a>
                                @endif
                                @endforeach
                             
                          </p>
                        </div>
                    </div>
                </div>
           
           
                {{--@foreach ($data['category'] as $item)
                <div class="col-6 col-md-3">
                    <div class="product-square w-100 border border-gray p-1">
                        <img src="{{asset('/img/category/'.$item->pic)}}" class="w-100 h-100 of-image-contain" alt="">
                    </div>
                    <div class="p-3 text-center">
                        <a class="no-decor" href="{{route('category',['category_name' => $item->url])}}"><h4><b>{{$item->category_name}}</b></h4></a>
                    
                    </div>
                </div>
                @endforeach--}}
            @endif
            @endforeach
            
        </div>
        </div>
        
    </div>
</section>


    

@endsection
