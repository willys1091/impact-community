@extends('layout.main-admin')
@section('content-wrapper')
@inject('general', 'App\Http\Controllers\WatchVideosController')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Video Series</h1>
                    <a href="{{url('admin/watchvideo/create')}}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Video</button></a>
                    @if (session('status'))
                        <div class="alert alert-success my-3" role="alert">{{ session('status') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                @foreach ($video as $v)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <a href="{{url('admin/watchvideo/'.$v->id.'/edit')}}">
                            <img src="https://i.ytimg.com/vi/{{$v->url_video}}/maxresdefault.jpg" alt="" class="rounded img-fluid">
                        </a>
                        <h5 class="m-0 mt-2"><a href="{{url('admin/watchvideo/'.$v->id.'/edit')}}"><strong>{{$general->readmore($v->title,40)}}</strong></a></h5>
                        <p class="m-0"><a href="#">{{$v->seriesCat->name}}</a></p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection