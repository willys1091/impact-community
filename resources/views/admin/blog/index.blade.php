@extends('layout.main-admin')
@section('title', 'Article - Arif Furniture')
@section('content-wrapper')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Content</h1>
                    <a href="{{url('admin/content/create')}}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Article</button></a>
                    @if (session('status'))
                        <div class="alert alert-success my-3" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Published</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($blog as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->title}}</td>
                                <td>{{$item->published}}</td>
                                <td><a href="{{url('admin/content/'.$item->id.'/edit')}}" class="badge badge-primary">Details</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection