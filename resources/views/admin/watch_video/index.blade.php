@extends('layout.main-admin')
@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Video Series</h1>
                    <a href="{{route('admin.watchvideo.create')}}"><button type="button" class="btn btn-success"><i
                                class="fa fa-plus-circle" aria-hidden="true"></i> Add
                            Series</button></a>
                    @if (session('status'))
                    <div class="alert alert-success my-3" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                @foreach ($video as $item)
                <div class="col-lg-3 col-md-6 mb-4">
                    <a href="{{route('admin.watchvideo.edit', ['watchvideo' => $item->id])}}">
                        <img src="https://i.ytimg.com/vi/{{$item->url_video}}/maxresdefault.jpg"
                            alt="" class="rounded img-fluid">
                        </a>
                        <h5 class="m-0"><a href="{{route('admin.watchvideo.edit', ['watchvideo' => $item->id])}}">
                            <strong>{{$item->title}}</strong> 
                         </a></h5>
                         <p class="m-0"><a href="#">
                             {{$item->seriesCat->name}}
                         </a></p>
                </div>
                @endforeach
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


@endsection