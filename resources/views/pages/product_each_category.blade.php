@extends('layout.main')
@section('title', 'Jual '.$category_selected->category_name.' Berkualitas - Arif Furniture')
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
            <div class="item w-100">
                <img src="{{asset('/img/category/'.$category_selected['parent']['pic'])}}" width="100%" 
                    class="img-cover" alt="">
            </div>
            @foreach ($data['category'] as $item)
            @if ($item->sub_category!=null && $category_selected['parent']['id']==$item->sub_category)
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
                <h2>{{$category_selected->category_name}}</h2>
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
                        <li class="{{Request::is('product-category/'.$category_selected['parent']['url'])  ? 'active' : ''}}"><a
                                href="{{route('category', ['category_name'=>$category_selected['parent']['url']])}}">{{$category_selected['parent']['category_name']}}</a>
                        </li>
                        @foreach ($data['category'] as $item)
                        @if ($item->sub_category!=null && $category_selected['parent']['id']==$item->sub_category)
                        <li class="{{Request::is('product-category/'.$item->url)  ? 'active' : ''}} ml-3"><a
                                href="{{route('category', ['category_name'=>$item->url])}}">{{$item->category_name}}</a>
                        </li>
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
                                    @if ($subcategory_selected!=null)
                                    {{$subcategory_selected->category_name}}
                                    @else
                                    {{$item->categoryproduct->category_name}}
                                    @endif
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

                        {{--<div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/img/products/product-2.jpg" alt="">
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Coat</div>
                                    <a href="#">
                                        <h5>Guangzhou sweater</h5>
                                    </a>
                                    <div class="product-price">
                                        $13.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/img/products/product-3.jpg" alt="">
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Shoes</div>
                                    <a href="#">
                                        <h5>Guangzhou sweater</h5>
                                    </a>
                                    <div class="product-price">
                                        $34.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/img/products/product-4.jpg" alt="">
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Coat</div>
                                    <a href="#">
                                        <h5>Microfiber Wool Scarf</h5>
                                    </a>
                                    <div class="product-price">
                                        $64.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/img/products/product-5.jpg" alt="">
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Shoes</div>
                                    <a href="#">
                                        <h5>Men's Painted Hat</h5>
                                    </a>
                                    <div class="product-price">
                                        $44.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/img/products/product-6.jpg" alt="">
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Shoes</div>
                                    <a href="#">
                                        <h5>Converse Shoes</h5>
                                    </a>
                                    <div class="product-price">
                                        $34.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/img/products/product-7.jpg" alt="">
                                    <div class="sale pp-sale">Sale</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Towel</div>
                                    <a href="#">
                                        <h5>Pure Pineapple</h5>
                                    </a>
                                    <div class="product-price">
                                        $64.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/img/products/product-8.jpg" alt="">
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Coat</div>
                                    <a href="#">
                                        <h5>2 Layer Windbreaker</h5>
                                    </a>
                                    <div class="product-price">
                                        $44.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/img/products/product-9.jpg" alt="">
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Shoes</div>
                                    <a href="#">
                                        <h5>Converse Shoes</h5>
                                    </a>
                                    <div class="product-price">
                                        $34.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        --}}
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