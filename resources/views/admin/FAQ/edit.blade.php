@extends('layout.main-admin')
@section('title', 'FAQ - Arif Furniture')
@section('page-container')
<div class="image-box h-min100vh">
    <div class="container py-3">
        <h1>FAQQQQQ</h1>

        @if (session('status'))
        <div class="alert alert-success my-3" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="post" action="{{route('admin.fAQ.update',$fAQ->id)}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Question</label>
                <textarea class="form-control @error('question') is-invalid @enderror" id="input-question"
                aria-describedby="" placeholder="Enter question" name="question" rows="3">{{$fAQ->question}}</textarea>
                @error('question')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Answer</label>
                <textarea class="form-control @error('answer') is-invalid @enderror" id="input-answer"
                aria-describedby="" placeholder="Enter answer" name="answer" rows="3">{{$fAQ->answer}}</textarea>
                @error('answer')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>



        </form>
    </div>

    @endsection