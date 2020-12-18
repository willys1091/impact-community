@extends('layout.main')
@section('title', $product_detail->product_name.' - Arif Furniture')
@section('meta-description')
    Arif Furniture Jepara Indonesia - Menjual {{$product_detail->product_name}}. Berkualitas Export. Terpercaya dan Terjamin
@endsection
@section('keyword-tag')
    {{$product_detail->meta_keyword}}
@endsection
@section('container')

<!-- Product Shop Section Begin -->
<section class="product-shop spad p-5">
    <div class="container">

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-6 align-items-center d-flex">
                <img class="img-fluid" src="{{asset('/img/product/'.$product_detail->pic)}}" alt="">
            </div>

            <div class="col-md-5 offset-md-1 d-flex flex-column justify-content-center">
                <h3 class="mt-3"><b>{{$product_detail->product_name}}</b></h3>
                <a
                    href="{{route('category', ['category_name'=>$product_detail->categoryproduct['url']])}}">
                    <p class="m-0">{{$product_detail->categoryproduct['category_name']}}</p>
                </a>
                @if ($product_detail->meta_keyword!=null)
                <p class="tags-text">Tags :
                    @php
                        $tags = str_replace(", ",",",$product_detail->meta_keyword);
                        $tags = explode(",",$tags);
                    @endphp
                    @foreach ($tags as $item)
                    @if ($loop->last)
                    <a href="{{route('tags', ['tags'=>$item])}}">
                        {{$item}}
                        </a>
                    @else
                    <a href="{{route('tags', ['tags'=>$item])}}">
                        {{$item}},
                        </a>
                    @endif
                    @endforeach
                </p>
                @endif
                
                <div class="my-3">
                    <p class="m-0">Kode Produk : {{$product_detail->code_product}}</p>
                    <p>Stok :
                        @if ($product_detail->stock!=null)
                        {{$product_detail->stock}}
                        @else
                        Pre-Order (Custom Design)
                        @endif

                    </p>
                    <h5 class="mb-3">Harga</h5>


                    @if ($product_detail->price!=null)
                    <h4><b>{{$product_detail->price}} </b>
                    </h4>
                    @else
                    <a class="btn-success btn-lg my-3" target="_blank"
                        href="https://wa.me/6282241666995?text=Halo%2C%20Arif%20Furniture.%20Saya%20tertarik%20dengan%20produk%20{{$product_detail->code_product.'%20-%20'.$product_detail->product_name}}"><i
                            class="fa fa-whatsapp" aria-hidden="true"></i> Hubungi Kami</a>

                    @endif

                </div>

            </div>

        </div>
        <!-- /.row -->
        <div class="row my-3 mx-0">
            <div class="col rounded bg-dark p-3">
                <div class="d-lg-flex flex-lg-row text-light justify-content-between text-center">
                    <div class="item"><i class="fa fa-phone" aria-hidden="true"></i> Phone : +62 822-4166-6995</div>
                    <div class="item"><i class="fa fa-mobile" aria-hidden="true"></i> SMS : +62 822-4166-6995</div>
                    <div class="item"><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp +62 822-4166-6995</div>
                    <div class="item"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :
                        akhmadsyarif000@gmail.com</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 description-product">
                {!!$product_detail->description!!}
                <a class="btn-success btn w-100 wa-btn btn-lg my-3" target="_blank"
                        href="https://wa.me/6282241666995?text=Halo%2C%20Arif%20Furniture.%20Saya%20tertarik%20dengan%20produk%20{{$product_detail->code_product.'%20-%20'.$product_detail->product_name}}"><i
                            class="fa fa-whatsapp" aria-hidden="true"></i> Tertarik ? Hubungi Kami Sekarang</a>
            </div>

            <div class="border-left d-md-block d-none" style="width: 0px;"></div>

            <div class="col-md-3 d-md-block d-none" style="margin-left: -1px;">
                <hr class="d-md-none d-block">
                <div class="filter-widget">
                    <h6 class="fw-title mb-1"><a class="nodecor" href="{{route('category_product')}}">Semua Kategori</a>
                    </h6>
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
        </div>
        <div class="d-flex my-5">
            <div class="line-nav-secondary my-auto flex-grow-1">
            </div>
            <div class="px-4 mx-0 mx-md-3">
                <h3 class="text-center">Produk Lain dari {{$data['category_selected']}}</h3>
            </div>
            <div class="line-nav-secondary my-auto flex-grow-1">

            </div>
        </div>
        <div class="row">
            @foreach ($product_detail['similar'] as $item)
            <div class="col-lg-4 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">

                        <img src="{{asset('/img/product/'.$item->pic)}}" alt="">
                        <div class="sale pp-sale">Sale</div>

                        <ul>
                            <li class="w-icon active"><a target="_blank"
                                    href="https://wa.me/6282241666995?text=Halo%2C%20Arif%20Furniture.%20Saya%20tertarik%20dengan%20produk%20{{$item->product_name}}"><i
                                        class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                            <li class="quick-view"><a href="{{url('/product/'.$item->url)}}">View</a></li>

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
                            <a target="_blank"
                                href="https://wa.me/6282241666995?text=Halo%2C%20Arif%20Furniture.%20Saya%20tertarik%20dengan%20produk%20{{$item->product_name}}"><i
                                    class="fa fa-whatsapp" aria-hidden="true"></i> Hubungi Kami</a>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row d-md-none d-block">
            <div class="col produts-sidebar-filter">
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

        </div>
    </div>
</section>
<!-- Product Shop Section End -->
@endsection