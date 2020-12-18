@extends('layout.main-admin')
@section('title', 'FAQ - Arif Furniture')
@section('page-container')
<div class="image-box h-min100vh">
    <div class="container py-3">
        <h1>FAQ</h1>

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
                    aria-controls="nav-profile" aria-selected="false">Add FAQ</a>

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
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($faq as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->question}}</td>
                                    <td>{{$item->answer}}</td>
                                    <td><a href="{{route('admin.fAQ.edit',$item->id)}}"
                                            class="badge badge-warning">Edit</a>
                                            <form class="d-inline" action="{{route('admin.fAQ.destroy',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="badge badge-danger">Delete</button>
                                            </form>
                                            
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade px-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <form method="post" action="{{route('admin.fAQ.store')}}">
                    @csrf

                    <div class="form-group">
                        <label>Question</label>
                        <textarea class="form-control @error('question') is-invalid @enderror" id="input-question"
                        aria-describedby="" placeholder="Enter question" name="question" rows="3">{{old('question')}}</textarea>
                        @error('question')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <textarea class="form-control @error('answer') is-invalid @enderror" id="input-answer"
                        aria-describedby="" placeholder="Enter answer" name="answer" rows="3">{{old('answer')}}</textarea>
                        @error('answer')
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