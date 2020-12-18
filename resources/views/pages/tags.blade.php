@extends('layout.main')
@section('title', 'Jual Furniture Berkualitas - Arif Furniture')
@section('additional_footer')
<script>
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
            autoplayTimeout: 12000,
            autoplayHoverPause: true,

        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [12000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })
    })
</script>
@endsection
@section('container')
<!-- Product Shop Section Begin -->
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
                <h2>Tags : {{ $tags }}</h2>
            </div>
            <div class="line-nav-secondary my-auto flex-grow-1">
    
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h6 class="fw-title mb-1"><a class="nodecor" href="{{route('category_product')}}">Semua Kategori</a>
                    </h6>
                    <hr class="my-2">
                    <ul class="filter-catagories">
                        @foreach ($data['category'] as $item)
                        @if ($item->sub_category==null)
                        <li><a href="{{route('category', ['category_name'=>$item->url])}}">{{$item->category_name}}</a>
                        </li>
                        @foreach ($item->childs as $item2)
                        @if ($item->id==$item2['sub_category'])
                        <li class="ml-3 child"><a
                                href="{{route('category', ['category_name'=>$item2->url])}}">{{$item2->category_name}}</a>
                        </li>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                {{--<div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="select-option">
                                <select class="sorting">
                                    <option value="">Default Sorting</option>
                                </select>
                                <select class="p-show">
                                    <option value="">Show:</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>Show 01- 09 Of 36 Product</p>
                        </div>
                    </div>
                </div>--}}
                <div class="product-list">
                    <div class="row">
                        @foreach ($product as $item)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    
                                    <img src="{{asset('/img/product/'.$item->pic)}}" alt="">
                                    <div class="sale pp-sale">Sale</div>
                                    
                                    <ul>
                                        <li class="w-icon active"><a href="https://wa.me/6282241666995?text=Halo%2C%20Arif%20Furniture.%20Saya%20tertarik%20dengan%20produk%20{{$item->product_name}}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                        <li class="quick-view"><a href="{{url('/product/'.$item->url)}}"">View</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">
                                    {{$item->categoryproduct->category_name}}
                                    </div>
                                    <a href="{{url('/product/'.$item->url)}}" class="mb-2">
                                        <h5>{{$item->product_name}}</h5>
                                    </a>
                                    
                                    <div class="product-price">
                                        <p class="m-0">Harga :</p>
                                        @if ($item->price!=null)
                                            {{$item->price}}
                                        @else
                                        <a target="_blank" href="https://wa.me/6282241666995?text=Halo%2C%20Arif%20Furniture.%20Saya%20tertarik%20dengan%20produk%20{{$item->product_name}}"><i class="fa fa-whatsapp" aria-hidden="true"></i> Hubungi Kami</a>
                                        
                                        @endif
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 paginate-nav">
                            {{ $product->links() }}
                        </div>

                       
                    </div>
                </div>
                {{--<div class="loading-more">
                    <i class="icon_loading"></i>
                    <a href="#">
                        Loading More
                    </a>
                </div>--}}
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
@endsection