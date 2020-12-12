@extends('layout.main-admin')
@section('title', 'Add Article')
@section('additional_head')
<link rel="stylesheet" href="{{ asset('assets_admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<style>
    .note-editor.note-airframe,
    .note-editor.note-frame {
        background: white;
    }
</style>
@endsection
@section('additional_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('assets_admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
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
                        $("#fileinput").val(null);
                        $('#inputimg_url').val(data.uploaded_image);
                        $('#blah').removeClass('d-none').attr('src', data.uploaded_image);
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        $('#message').addClass(data.class_name);
                        $("#file-manager-container").prepend(
                            '<div class="col-lg-1 col-md-4">' +
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
            }
        });
    $(document).ready(function () {
        $('#select_category').on('change', function() {
            if ($(this).find(":selected").val()=='9') {
                $('#child_category_form').removeClass('d-none');
            } else {
                $('#child_category_form').addClass('d-none');
            }
            
        });

        $("#input-title").change(function () {
            var x = $("#input-title").val();
            var url = x.replace(/\ /g, '-').toLowerCase();
            $("#inputurl").val(url);
        });
        $("#content-temp").change(function () {
            var content = $('#content-temp').val().split("\n");
            $("#hiddencontent").empty();
            for (let index = 0; index < content.length; index++) {
                var txt = $("<input type = 'hidden' name = 'content[]'/>").val(content[index]);
                $("#hiddencontent").append(txt);
            }
        });

        $("#startdate_datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
        $('.custom-file-input').on('change', function () {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('select[name=category]').change(function () {
            let code = $(this).val() + '-';
            $('input[name=code_product]').val(code);
        });

        $('.img-thumbnail').height($('.form-pic-preview').height() - 10);

    });
</script>
<script>
    $(function() {
        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

        $('[data-mask]').inputmask()

        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        $('#reservation').daterangepicker()

        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })

        $('#daterange-btn').daterangepicker({
            ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
        },

            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        $('#timepicker').datetimepicker({
            format: 'LT'
        })
    })
  
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });

     Dropzone.autoDiscover = false;

    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    var myDropzone = new Dropzone(document.body, { 
        url: "/target-url",
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, 
        previewsContainer: "#previews",
        clickable: ".fileinput-button"
    });

    myDropzone.on("addedfile", function (file) {
        file.previewElement.querySelector(".start").onclick = function () {
            myDropzone.enqueueFile(file);
        };
    });

    myDropzone.on("totaluploadprogress", function (progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });

    myDropzone.on("sending", function (file) {
        document.querySelector("#total-progress").style.opacity = "1";
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });

    myDropzone.on("queuecomplete", function (progress) {
        document.querySelector("#total-progress").style.opacity = "0";
    });

    document.querySelector("#actions .start").onclick = function () {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };
    document.querySelector("#actions .cancel").onclick = function () {
        myDropzone.removeAllFiles(true);
    };
</script>
@endsection
@php
    $type = collect(request()->segments())->last();
@endphp
@section('content-wrapper')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex flex-row justify-content-between">
                        <h1 class="m-0 text-dark">{{ $type == 'edit' ? 'Edit' : 'Create' }} Content</h1>
                        @if ($type=='edit')
                            <form action="{{url('admin/content/'.$blog->id)}}" method="post">@csrf @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> DeleteData</button>
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
                        <div class="card-header"><h3 class="card-title">Quick Example</h3></div>
                            <form class="p-3" method="post" action="{{$type == 'edit' ? url('admin/content/'.$blog->id) : url('admin/content') }}" enctype="multipart/form-data" id="mediaupload"> @csrf
                            @if ($type == 'edit') @method('put') @endif
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="input-title" aria-describedby="" placeholder="Enter Title" name="title" value="{{$type == 'edit' ? $blog->title : old('title')}}"> 
                                        @error('title')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Publish Date</label>
                                        <div class="start_date input-group mb-4">
                                            <input class="form-control start_date @error('published') is-invalid @enderror "type="text" placeholder="Enter Date" id="startdate_datepicker" name="published" value="{{$type == 'edit' ? $blog->published : old('published')}}">
                                            <div class="input-group-append">
                                                <span class="fa fa-calendar input-group-text start_date_calendar" aria-hidden="true "></span>
                                            </div>
                                            @error('published')
                                                <div class="invalid-feedback"> {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Select Category" style="width: 100%;" name="category[]" id="select_category">
                                            @if (isset($blog))
                                                @php $cat_selected = json_decode($blog->category); @endphp
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
                                                @php $cat_selected = null; @endphp
                                                @foreach ($category as $key=>$item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group {{isset($blog)?$blog->parent!=null?'': 'd-none' : 'd-none'}} " id="child_category_form">
                                        <label>Child Category</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Select Category" style="width: 100%;" name="parent">
                                            @if (isset($blog))
                                                @foreach ($city as $key=>$item)
                                                    @if ($item->id==$blog->parent)
                                                        <option value="{{$item->id}}" selected>{{$item->title}}</option>    
                                                    @else
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($city as $key=>$item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="inputurl" aria-describedby="" placeholder="Enter URL" name="url" value="{{$type == 'edit' ? $blog->url : old('url')}}">
                                        @error('url')
                                            <div class="invalid-feedback"> {{$message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc"><i class="fa fa-file-o" aria-hidden="true"></i><p class="m-0">Choose an image file or drag it here.</p></div>
                                            <input type="file" name="file" id="fileinput" class="dropzone">
                                        </div>
                                        <input type="text" class="form-control @error('img_url') is-invalid @enderror"
                                            id="inputimg_url" aria-describedby="" placeholder="Enter Image URL" name="img_url" value="{{$type == 'edit' ? $blog->thumbnail_img : old('img_url')}}">
                                            @if($type == 'edit')
                                                @php $ext = strtolower(pathinfo($type == 'edit' ? $blog->thumbnail_img : old('img_url'), PATHINFO_EXTENSION)) @endphp
                                                @if($ext=='3gp'||$ext=='wmv'||$ext=='ogg'||$ext=='mkv'||$ext=='flv'||$ext=='mp4'||$ext=='mov')
                                                    <video id="blah" width="100%" height="100%" autobuffer="false" autoplay="true" muted loop>
                                                        <source src="{{$type == 'edit' ? $blog->thumbnail_img : old('img_url')}}" type="video/mp4">
                                                    </video>   
                                                @elseif($ext=='png'||$ext=='jpeg'||$ext=='jpg'||$ext=='gif')
                                                    <img class="img-thumbnail img-contain w-100 {{$type == 'edit' ? '' : 'd-none'}}" id="blah" src="{{$type == 'edit' ? $blog->thumbnail_img : old('img_url')}}" alt="image" /> 
                                                @endif
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea name="description_text">{{$type == 'edit' ? $blog->content : old('description_text')}}</textarea>
                                        <script>
                                            CKEDITOR.replace('description_text', {
                                                filebrowserUploadUrl: "{{url('admin/file/ck_store')}}",
                                                filebrowserUploadMethod: 'form'
                                            });
                                        </script>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    function readUrl(input) {

        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#blah').removeClass('d-none').attr('src', e.target.result);
                $('.dummy-pic').addClass('d-none').removeClass('d-flex');
                let imgData = e.target.result;
                let imgName = input.files[0].name;
                input.setAttribute("data-title", imgName);
                console.log(e.target.result);
           }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#blah').addClass('d-none').attr('src', '');
            $('.dummy-pic').removeClass('d-none').addClass('d-flex');

        }
    }
</script>
@endsection