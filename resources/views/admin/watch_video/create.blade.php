@extends('layout.main-admin')
@section('additional_head')
<!-- Select2 -->
<link rel="stylesheet" href="/assets_admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('additional_script')
<!-- Select2 -->
<script src="/assets_admin/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">

    function youtube_parser(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match && match[7].length == 11) ? match[7] : false;
    }

    function generate_URL(){
        var x = $("#FormTitle").val();
        var url = x.replace(/\ /g, '-').toLowerCase();
        $("#FormURL").val(url);
    }

    $("#GenerateLink").click(function () {
        var link = $('#FormYoutubeLink').val();
        link = youtube_parser(link);
        var api_key = "AIzaSyBP9SCeAaaXJTBthqJcPdyO1S5LVUXQwaA";
        var src = 'https://www.youtube.com/embed/' + link ;
        var img_src = 'https://i.ytimg.com/vi/' + link + '/maxresdefault.jpg';
        $("#videothumbnail").attr('src', src);
        //$("#imgthumbnail").attr('src', img_src);
        $('#FormYoutubeID').val(link);
        

        $.ajax({
            type: "GET",
            dataType: "json",
            //data:{name: name},
            url: "https://www.googleapis.com/youtube/v3/videos?id=" + link + "&key=" + api_key +
                "&fields=items(id,snippet(title),statistics)&part=snippet,statistics",
            success: function (data) {
                //alert('Get Success');
                console.log(data);
                $("#FormTitle").val(data['items'][0]['snippet']['title']);
                generate_URL();
                $(".embed-responsive").removeClass('d-none');
            }
        });

    });
    $("#FormTitle").change(function () {
        generate_URL();
    });

</script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
@endsection
@php
    $type = collect(request()->segments())->last();
@endphp
@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex flex-row justify-content-between">
                    <h1 class="m-0 text-dark">{{ $type == 'edit' ? 'Edit' : 'Add' }} Video</h1>
                        @if ($type=='edit')
                        <form action="{{route('admin.watchvideo.destroy', ['watchvideo'=>$watchvideo->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete
                                Data</button>
                        </form>
                        @endif
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Video Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ $type == 'edit' ? route('admin.watchvideo.update',['watchvideo'=>$watchvideo->id]) : route('admin.watchvideo.store') }}" method="POST">
                            @csrf
                            @if ($type == 'edit')
                            @method('put')
                            @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                        

                                        <div class="form-group">
                                            <label for="FormYoutubeLink">Youtube URL</label>
                                            
                                                
                                                <div class="input-group input-group">
                                                    <input type="text" class="form-control" id="FormYoutubeLink"
                                                placeholder="Enter Youtube URL">
                                                    <span class="input-group-append">
                                                      <button type="button" class="btn btn-primary" id="GenerateLink">Generate</button>
                                                    </span>
                                                  </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="FormYoutubeID">Youtube ID</label>
                                            <input readonly type="text" class="form-control" id="FormYoutubeID"
                                                placeholder="Enter Youtube ID" name="url_video" value="{{ $type == 'edit' ? $watchvideo->url_video : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="FormTitle">Title</label>
                                            <input type="text" class="form-control" id="FormTitle"
                                                placeholder="Enter Title" name="title" value="{{ $type == 'edit' ? $watchvideo->title : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Series</label>
                                            <select class="select2bs4" data-placeholder="Select Category" style="width: 100%;" name="series" id="select_category">
                                            <option value=""></option>
                                            @foreach ($series as $item)
                                            <option value="{{$item->id}}" {{ $type == 'edit' && $watchvideo->series == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                              {{--@if (isset($blog))
                                              @foreach ($category as $key=>$item)
                                              @foreach ($cat_selected as $key2=>$item2)
                                              @if ($item->id==$item2)
                                              <option value="{{$item->id}}" selected>{{$item->name}}</option>    
                                              @elseif($key >= $key2)
                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                              
                                              @endif
                                              @endforeach
                                              
                                              @endforeach
                                              @else
                                              @php
                                              $cat_selected = null;
                                              @endphp
                                               @foreach ($category as $key=>$item)
                                              
                                               <option value="{{$item->id}}">{{$item->name}}</option>
                                               
                                               @endforeach
                                              @endif--}}
                                              
                                             
                                                
                                            </select>
                                        </div>
                                        {{--<div class="form-group">
                                            <label for="FormSeries">Series</label>
                                            <input type="text" class="form-control" id="FormSeries"
                                                placeholder="Enter Title" name="series">
                                        </div>--}}
                                        <div class="form-group">
                                            <label for="FormURL">URL</label>
                                            <input type="text" class="form-control" id="FormURL"
                                                placeholder="Enter Title" name="url_web" value="{{ $type == 'edit' ? $watchvideo->url_web : '' }}">
                                        </div>

                                       
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="embed-responsive embed-responsive-16by9 {{ $type == 'edit' ? '' : 'd-none' }}">
                                            <iframe width="1280" height="640" id="videothumbnail"
                                                src="{{ $type == 'edit' ? 'https://www.youtube.com/embed/'.$watchvideo->url_video : '' }}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen=""></iframe>

                                        </div>
                                       
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection