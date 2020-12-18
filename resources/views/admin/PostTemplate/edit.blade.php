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
        <form method="post" action="{{route('admin.postTemplate.update',$postTemplate->id)}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="inputname" aria-describedby="" placeholder="Enter name"
                    name="name" value="{{$postTemplate->name}}">
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
                        <input type="checkbox" class="switch-input" id="sub_category_switch" name="switch_used"
                        @if ($postTemplate->used==1)
                            checked
                        @endif
                        >
                        <span class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                {{--<textarea id="summernote" name="description"></textarea>--}}
                <textarea class="form-control @error('description_text') is-invalid @enderror" name="description_text">{{$postTemplate->template}}</textarea>
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

    @endsection