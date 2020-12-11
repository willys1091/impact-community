@extends('layout.main-admin')
@section('additional_script')
<script src="https://cdn.jsdelivr.net/npm/venobox@1.9.1/venobox/venobox.min.js"></script>
<script type="text/javascript">
    $('.dropzone-wrapper').on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });
    $('.dropzone-wrapper').on('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });
    $('.dropzone-wrapper').on('drop', function (e) {
        
        $(this).removeClass('dragover');
    });
    $('.remove-preview').on('click', function () {
        var boxZone = $(this).parents('.preview-zone').find('.box-body');
        var previewZone = $(this).parents('.preview-zone');
        var dropzone = $(this).parents('.form-group').find('.dropzone');
        boxZone.empty();
        previewZone.addClass('hidden');
        reset(dropzone);
    });
    $("#GenerateLink").click(function () {
        var link = $('#FormYoutubeLink').val();
        link = youtube_parser(link);
        var api_key = "AIzaSyBP9SCeAaaXJTBthqJcPdyO1S5LVUXQwaA";
        var src = 'https://www.youtube.com/embed/' + link;
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
    $(document).ready(function () {
        var width_element = $(".file-container").width();
        $(".file-container").height(width_element);
        $('#mediaupload').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{url('admin/file/store')}}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    $("#file-manager-container").prepend('<div class="col-lg-1 col-md-4">' +
                        '<div class="file-container">' +
                        '<button class="btn h-100 w-100 p-0">' +
                        '   <img src="' + data.uploaded_image + '"' +
                        'class="img-thumbnail thumbnail-file-img" alt="" id="uploaded_image">' +
                        '</button>' +
                        '</div>' +
                        '</div>');
                    var width_element = $(".file-container").width();
                    $(".file-container").height(width_element);
                }
            })
        });
        $("#fileinput").change(function (event) {
            event.preventDefault();
            if ($('#fileinput').get(0).files.length === 0) {
                console.log("No files selected.");
                alert("no file");
            } else {
                $.ajax({
                    url: "{{url('admin/file/store')}}",
                    method: "POST",
                    data: new FormData($('#mediaupload')[0]),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        $('#message').addClass(data.class_name);
                        $("#file-manager-container").prepend(
                            '<div class="col-lg-1 col-md-4">' +
                            '<div class="file-container">' +
                            '<button type="button" class="btn w-100 h-100 p-0" data-toggle="modal" data-target="#exampleModal" data-whatever=\''+data.data +'\'>' +
                            '   <img src="' + data.uploaded_image + '"' +
                            'class="img-thumbnail thumbnail-file-img" alt="" id="">' +
                            '</button>' +
                            '</div>' +
                            '</div>');
                        var width_element = $(".file-container").width();
                        $(".file-container").height(width_element);
                        $('#mediaupload')[0].reset();
                    }
                })
            }
        });
    });
    var id_venobox = '';
    var var_venobox = '';
    $(function () {
        $('.venobox').on('click', function (event) {
            id_venobox = $(this).attr("id");
            url_venobox = $(this).attr("data-url");
            var img_src = $(this).find('.thumbnail-file-img').attr('src');
            $('#img-thumbnail-veno').attr('src', img_src);
            $('#FormURL').val(url_venobox);
        })
    });
    $(document).ready(function () {
        $('.venobox').venobox({
            titleattr: 'data-title',
            cb_post_open: function () {
                console.log('POST OPEN');
                console.log(id_venobox);
                console.log(url_venobox);
                
            },
        });
    });
</script>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var data = button.data('whatever')
  var data_type = button.data('type') 
  var modal = $(this)
  modal.find('.modal-title').text('Detail File')
  modal.find('.modal-body #mod_FormURL').val(data['directory'])
  if (data_type=='non-image') {
    modal.find('.modal-body #img-thumbnail-veno').attr('src', '/media/file.png')
  } else {
    modal.find('.modal-body #img-thumbnail-veno').attr('src', data['directory'])
  }
  
  modal.find('.modal-body #mod_name_file').val(data['name_file'])
  modal.find('.modal-body #mod_description').val(data['description'])
  modal.find('.modal-body #mod_alt_text').val(data['alt_text'])
  modal.find('.modal-body #mod_type_file').html('type file : ' + data['type_file'])
  modal.find('.modal-body #URL_post_edit').attr('action','/ici.admin/file/edit/'+ data['id'])
  
  
})
</script>
@endsection
@section('content-wrapper')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">File Manager</h1>
                    <div class="alert" id="message" style="display: none"></div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        
                        <form method="POST" id="mediaupload" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <i class="fa fa-file-o" aria-hidden="true"></i>
                                                    <p class="m-0">Choose an image file or drag it here.</p>
                                                </div>
                                                <input type="file" name="file" id="fileinput" class="dropzone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                     
                        <div class="card-body">
                            
                            <div class="mt-3">
                                <div class="row file" id="file-manager-container">
                                    @foreach ($file as $item)
                                    <div class="col-lg-1 col-md-4">
                                        <div class="file-container">
                                            
                                                @php $type_file = explode("/", $item->type_file); @endphp
                                                @if ($type_file[0]=='image')
                                                    <button type="button" class="btn w-100 h-100 p-0" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$item}}" data-type="image">
                                                    <img src="{{asset($item->directory)}}" class="img-thumbnail thumbnail-file-img" alt="">
                            
                                                @elseif($type_file[0]=='video')
                                                    <button type="button" class="btn w-100 h-100 p-0" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$item}}" data-type="image">
                                                    <video id="vid" width="100%" height="100%" autobuffer="false" autoplay="true" muted loop>
                                                        <source src="{{asset($item->directory)}}" type="video/mp4">
                                                    </video>   
                                                @else
                                                <button type="button" class="btn w-100 h-100 p-0" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$item}}" data-type="non-image">
                                                    <img src="{{asset('media/file.png')}}" class="img-thumbnail thumbnail-file-img" alt="">
                                                @endif
                                            </button>
                                           
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row h-100">
                <div class="col-lg-7 d-flex align-items-center">
                    <img src="" id="img-thumbnail-veno" class="img-fluid mx-auto" alt="">
                </div>
                <div class="col-lg-5">
                    <form method="POST" id="URL_post_edit" action="/file/edit/">
                        @csrf
                        <p><small id="mod_type_file"></small></p>
                        <hr>
                        <div class="form-group">
                            <label for="FormYoutubeID">Name File</label>
                            <input type="text" class="form-control" id="mod_name_file"
                                placeholder="Enter Youtube ID" name="name_file">
                        </div>
                        <div class="form-group">
                            <label for="FormTitle">Alt Text</label>
                            <input type="text" class="form-control" id="mod_alt_text" placeholder="Alternative Text" name="alt_text">
                        </div>
                        <div class="form-group">
                            <label for="FormSeries">Description</label>
                            <input type="text" class="form-control" id="mod_description" placeholder="Description" name="description">
                        </div>
                        <div class="form-group">
                            <label for="FormURL">URL</label>
                            <input type="text" class="form-control" id="mod_FormURL" placeholder="URL" name="url_web" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection