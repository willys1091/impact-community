@extends('layouts.main-admin')
@section('title', 'Anjulisamagata')
@section('container')
    <style>
    .card-flex{

    }
    h5{
        font-size:14px;
        
    }
    @media only screen and (min-width: 600px) {
        /* For tablets: */
        .card-flex{
            display: block;
        }

    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
        .card-flex{
            display: flex;
        }
    }
    </style>
    <div class="image-box">
        <div class="container py-3">
            <h1>Messages List</h1>
            <div class="my-3" style="width:100%;border-bottom: rgb(140, 140, 140,0.5) solid 0.2px;"></div>
            <div class="row">
            @foreach ($message as $item)
                <div class="col-md-6 p-2">
                    <div class="m-1">
                        <div class="row m-0">
                            <div class="card shadow-sm" style="width:100%">
                                <div class="card-body text-dark">
                                    <div class="tooltip-custom">
                                        <h4 class="limit-2">
                                        {{$item->subject}}
                                        </h4>
                                    </div>
                                    <div class="card-flex justify-content-start my-2">
                                        <h5 class="limit-2" style="overflow:visible;">
                                            {{$item->name}}
                                        </h5>
                                        <h5 class="d-none d-lg-block limit-2 mx-2">
                                            -
                                        </h5>
                                        <h5 class="limit-2" style="overflow:visible;">
                                            {{$item->email}}
                                        </h5>
                                    </div>
                                    <textarea class="form-control" name="message" id="Textarea" rows="4" required="" style="height: 244px;resize: none;" readonly>{{$item->message}}</textarea>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    
@endsection