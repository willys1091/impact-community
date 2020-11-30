@extends('layout.main-admin')
@section('title', 'Template - Arif Furniture')
@section('additional_head')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<style>
    .note-editor.note-airframe,
    .note-editor.note-frame {
        background: white;
    }
</style>
@endsection
@section('page-container')
<div class="image-box h-min100vh">
    <div class="container py-3">
        <h1>Template</h1>

        @if (session('status'))
        <div class="alert alert-success my-3" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <nav class="mt-3">
            <div class="nav nav-pills" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="pill" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">Overview</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="pill" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Add Template</a>

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row mt-2">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    {{--<th scope="col">Contain</th>--}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($template as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->name}}
                                        @if ($item->used==1)
                                        <span class="badge badge-success">Used</span>
                                        @endif
                                    </td>
                                    
                                    <td><a href="{{route('admin.postTemplate.edit',$item->id)}}"
                                            class="badge badge-warning">Edit</a>
                                            <form class="d-inline" action="{{route('admin.postTemplate.destroy',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="badge badge-danger">Delete</button>
                                            </form>
                                            
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">{!!$item->template!!}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade px-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <form method="post" action="{{route('admin.postTemplate.store')}}">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="inputname" aria-describedby="" placeholder="Enter name"
                            name="name" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-start">
                            <label class="mr-3">Used ?</label>
                            <label class="switch switch-3d switch-success">
                                <input type="checkbox" class="switch-input" id="sub_category_switch" name="switch_used">
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        {{--<textarea id="summernote" name="description"></textarea>--}}
                        <textarea class="form-control @error('description_text') is-invalid @enderror" name="description_text">{{old('description_text')}}</textarea>
                    <script>
                            CKEDITOR.replace( 'description_text' );
                    </script>
                    @error('description_text')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>



                </form>
            </div>


        </div>
    </div>

    @endsection