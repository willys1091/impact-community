@extends('layout.main')
@section('title', 'Artikel - Arif Furniture Indonesia')
@section('container')
<section class="blog-details spad py-0">
    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead d-flex">
        <div class="container h-100 py-5 my-auto">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light text-white">Artikel</h1>
                <p class="lead text-light">Kumpulan Artikel Berisi Tentang Informasi, Edukasi, Desain Furnitur, Desain
                    Interior & Eksterior Rumah, Tips & Trik, Product Knowledge Mebel. Yang Akan Membantu Anda Sebelum &
                    Sesudah Membeli Furnitur & Perabotan Rumah Tangga.</p>
            </div>
        </div>
    </div>
</header>
<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="row">
                    @foreach ($blog as $item)
                    <div class="col-lg-4 col-sm-4">
                        <a href="{{route('blog_page',['url'=>$item->url])}}">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="{{asset('/img/blog/thumbnail/'.$item->thumbnail_img)}}" alt="">
                                </div>
                                <div class="bi-text">
                                    
                                        <h4>{{$item->title}}</h4>
                                    @php
                                        $date=date_create($item->published);
                                    @endphp
                                    <p>Artikel <span>- {{date_format($date,"d F Y")}}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="col-lg-12 paginate-nav">
                        {{ $blog->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection