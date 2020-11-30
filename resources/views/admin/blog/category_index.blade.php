@extends('layout.main-admin')
@section('additional_head')
<!-- Select2 -->
<link rel="stylesheet" href="/assets_admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
<!-- Select2 -->
<script src="/assets_admin/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(document).ready(function () {
        /*$('#summernote').summernote({
            placeholder: 'Enter news content',
            tabsize: 2,
            height: 300
        });*/

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
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $(".select2").select2({
            placeholder: "Select a state",
            closeOnSelect: false,
        });

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false;

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
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
                url: "{{route('admin.file.store')}}",
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
                    url: "{{route('admin.file.store')}}",
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
            //var img_src = $(this).find('.thumbnail-file-img').attr('src');
            //alert( '{!!route('admin.categorycontent.store') !!}'+'/'+id_venobox);
            data_cat.forEach(myFunction)

            function myFunction(item, index, arr) {
                
                if (id_venobox == arr[index]['id']) {
                    alert("OK");
                    console.log(arr[index]['name']);
                    $('input[name=updatecategory_input-name]').val(arr[index]['name']);
                    //$('#updatecategory_description').val(arr[index]['description']);
                    //$('#updatecategory_input-url').val(arr[index]['url']);
                    //$('#updatecategory_input-parent_url').val(arr[index]['parent']);
                }
            }

            
            $('#updatecategory').attr('action', '{!!route('admin.categorycontent.store') !!}'+'/'+id_venobox);
            //thumbnail-file-img
            //img-thumbnail-veno
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
                    <h1 class="m-0 text-dark">Category Content</h1>
                    <a href="{{route('admin.content.create')}}"><button type="button" class="btn btn-success"><i
                                class="fa fa-plus-circle" aria-hidden="true"></i> Add
                            Article</button></a>
                    @if (session('status'))
                    <div class="alert alert-success my-3" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $type == 'edit' ? 'Edit' : 'Add' }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="p-3" method="post" action="{{ $type == 'edit' ? route('admin.categorycontent.update', $categorycontent->id) : route('admin.categorycontent.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($type == 'edit')
                            @method('put')
                            @endif
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="input-name" aria-describedby="" placeholder="Enter name" name="name"
                                    value="{{ $type == 'edit' ? $categorycontent->name : old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    name="description" id="input-description" placeholder="Enter description"
                                    rows="3">{{ $type == 'edit' ? $categorycontent->description : old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control select2" style="width: 100%;" id="parent_url" name="parent">
                                    <option></option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control select2" style="width: 100%;" id="type" name="type">
                                    <option></option>
                                    <option value="info">Information</option>
                                    <option value="quotes">Quotes</option>
                                    <option value="job">Job</option>
                                    <option value="city">City</option>
                                    <option value="church">Church</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="inputurl"
                                    aria-describedby="" placeholder="Enter URL" name="url" value="{{ $type == 'edit' ? $categorycontent->url : old('url') }}">
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
                                <th scope="col">Description</th>
                                <th scope="col">Type</th>
                                <th scope="col">URL</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->url}}</td>
                                <td>
                                    {{--<a class="badge badge-primary venobox" data-vbtype="inline" href="#inline-content"
                                        data-title="Here your description" id="{{$item->id}}">Edit</a>--}}

                                    <a href="{{route('admin.categorycontent.edit', ['categorycontent'=>$item->id])}}"
                                    class="badge badge-primary">Details</a>
                                    <form action="{{route('admin.categorycontent.destroy', ['categorycontent'=>$item->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="badge badge-danger border-0"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
{{--Veno Box Content--}}
<div id="inline-content" style="display:none;">
    <div class="p-3 h-100">
        <form class="p-3" method="post" action="{{route('admin.categorycontent.store') }}"
            enctype="multipart/form-data" id="updatecategory">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="updatecategory_input-name"
                    aria-describedby="" placeholder="Enter name" name="updatecategory_input-name" value="">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    id="updatecategory_input-description" placeholder="Enter description" rows="3">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Parent</label>
                <select class="form-control select2" style="width: 100%;" id="updatecategory_parent_url" name="parent">
                    <option></option>
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="updatecategory_inputurl"
                    aria-describedby="" placeholder="Enter URL" name="url" value="{{old('url')}}">
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
@endsection