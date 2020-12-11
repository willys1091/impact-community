@extends('layout.main-admin')
@section('additional_head')
    <link rel="stylesheet" href="{{asset('assets_admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('additional_script')
    <script src="{{asset('assets_admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('app.js')}}"></script>
    <script type="text/javascript">
    
	$('.select2bs4').select2({
		theme: 'bootstrap4'
    });
    
    function youtube_parser(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        console.log(match);
        console.log(match.length);
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
        $('#FormYoutubeID').val(link);
        

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "https://www.googleapis.com/youtube/v3/videos?id=" + link + "&key=" + api_key +
                "&fields=items(id,snippet(title),statistics)&part=snippet,statistics",
            success: function (data) {
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
@endsection

@php $type = collect(request()->segments())->last(); @endphp
@section('content-wrapper')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex flex-row justify-content-between">
                    <h1 class="m-0 text-dark">{{ $type == 'edit' ? 'Edit' : 'Add' }} Video</h1>
                        @if ($type=='edit')

                            <form action="{{url('admin/watchvideo/'.$watchvideo->id)}}" method="post">@csrf @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header"><h3 class="card-title">Video Data</h3></div>
                        <form action="{{ $type == 'edit' ? url('admin/watchvideo/'.$watchvideo->id) : url('admin/watchvideo') }}" method="POST">
                            @if ($type == 'edit')  @method('patch') @endif @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="FormYoutubeLink">Youtube URL</label>  
                                            <div class="input-group input-group">
                                                <input type="text" class="form-control" id="FormYoutubeLink" placeholder="Enter Youtube URL">
                                                <span class="input-group-append">
                                                    <button type="button" class="btn btn-primary" id="GenerateLink">Generate</button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="FormYoutubeID">Youtube ID</label>
                                            <input readonly type="text" class="form-control" id="FormYoutubeID" placeholder="Enter Youtube ID" name="url_video" value="{{ $type == 'edit' ? $watchvideo->url_video : '' }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="FormTitle">Title</label>
                                            <input type="text" class="form-control" id="FormTitle" placeholder="Enter Title" name="title" value="{{ $type == 'edit' ? $watchvideo->title : '' }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Category Series</label>
                                            <select class="select2bs4" data-placeholder="Select Category" style="width: 100%;" name="series" id="select_category">
                                                <option value=""></option>
                                                @foreach ($series as $item)
                                                    <option value="{{$item->id}}" {{ $type == 'edit' && $watchvideo->series == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="FormURL">URL</label>
                                            <input type="text" class="form-control" id="FormURL" placeholder="Enter Title" name="url_web" value="{{ $type == 'edit' ? $watchvideo->url_web : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="embed-responsive embed-responsive-16by9 {{ $type == 'edit' ? '' : 'd-none' }}">
                                        <iframe width="1280" height="640" id="videothumbnail" src="{{ $type == 'edit' ? 'https://www.youtube.com/embed/'.$watchvideo->url_video : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer"><button type="submit" class="btn btn-primary">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection