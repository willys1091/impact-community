@extends('layout.main-admin')
@section('additional_head')
<link rel="stylesheet" href="{{asset('assets_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" >
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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

<script src="{{asset('assets_admin/plugins/select2/js/select2.full.min.js')}}"></script>   
<script src="{{asset('app.js')}}"></script>
<script>
    $(document).ready(function () {
        $("#input-name").change(function () {
            var x = $("#input-name").val();
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
    $(function () {
        $("#parent_url").select2({
            placeholder: "Select a state",
            closeOnSelect: false,
        });

        $("#timepicker").datetimepicker({
            format: 'MM-DD-YYYY hh:mm'
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

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    });

    myDropzone.on("addedfile", function (file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function () {
            myDropzone.enqueueFile(file);
        };
    });

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function (progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });

    myDropzone.on("sending", function (file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1";
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function (progress) {
        document.querySelector("#total-progress").style.opacity = "0";
    });

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function () {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };
    document.querySelector("#actions .cancel").onclick = function () {
        myDropzone.removeAllFiles(true);
    };
    // DropzoneJS Demo Code End
</script>

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
        //e.preventDefault();
        //e.stopPropagation();
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
                    //$('#uploaded_image').attr('src',data.uploaded_image);
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
                            '<button class="btn h-100 w-100 p-0">' +
                            '   <img src="' + data.uploaded_image + '"' +
                            'class="img-thumbnail thumbnail-file-img" alt="" id="uploaded_image">' +
                            '</button>' +
                            '</div>' +
                            '</div>');
                        var width_element = $(".file-container").width();
                        $(".file-container").height(width_element);
                        $('#mediaupload')[0].reset();
                        //$('#uploaded_image').attr('src',data.uploaded_image);
                    }
                })
            }
        });
    });
    var id_venobox = '';
    var data_cat = {!! json_encode($category->toArray()) !!};
    console.log(data_cat);
    $(function () {
        $('.venobox').on('click', function (event) {
            id_venobox = $(this).attr("id");
            data_cat.forEach(myFunction)

            function myFunction(item, index, arr) {

                if (id_venobox == arr[index]['id']) {
                    alert("OK");
                    console.log(arr[index]['name']);
                    $('input[name=updatecategory_input-name]').val(arr[index]['name']);
                }
            }

            $('#updatecategory').attr('action', '{!!url('admin/categorycontent/store') !!}'+'/'+id_venobox);

        })
    });
    $(document).ready(function () {
        $('.venobox').venobox({
            titleattr: 'data-title',
            cb_post_open: function () {
                console.log('POST OPEN');
                console.log(id_venobox);
            },
        });
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
                    <h1 class="m-0 text-dark">Schedule Ibadah</h1>
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
                <div class="col-lg-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $type == 'edit' ? 'Edit' : 'Add' }}</h3>
                        </div>
                        <form class="p-3" method="post" action="{{ $type == 'edit' ? url('admin/schedule/'.$Schedule->id) : url('admin/schedule/store') }}">@csrf 
                            @if ($type == 'edit') @method('put') @endif
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="input-name" aria-describedby="" placeholder="Enter name" name="name" value="{{ $type == 'edit' ? $Schedule->name : old('name') }}">
                                @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>


                            <div class="form-group">
                                <label>Waktu</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    @php
                                    if ($type == 'edit') {
                                        $d=strtotime($Schedule->time);
                                        $date = date("m-d-Y H:i:s", $d);
                                    }

                                    @endphp
                                  <input type="text" class="form-control datetimepicker-input" id="timepicker_schedule" name="time" placeholder="Enter Time" data-target="#timepicker" value="{{ $type == 'edit' ? $date : old('time') }}"/>
                                  <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                  </div>
                                  </div>
                              </div>

                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="inputurl"
                                    aria-describedby="" placeholder="Enter URL" name="url" value="{{ $type == 'edit' ? $Schedule->url : old('url') }}">
                                @error('url')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Time</th>
                                <th scope="col">URL</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($category as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{ date("d M Y - H:i:s", strtotime($item->time)) }}</td>
                                <td>{{$item->url}}</td>
                                <td>

                                    <a href="{{url('admin/schedule/'.$item->id.'/edit')}}" class="badge badge-primary">Details</a>
                                    <form action="{{url('admin/schedule/'.$item->id )}}" method="post">
                                        @csrf @method('delete')
                                        <button type="submit" class="badge badge-danger border-0"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
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
