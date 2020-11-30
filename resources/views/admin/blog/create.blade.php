@extends('layout.main-admin')
@section('title', 'Add Article')
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
<!-- Select2 -->
<script src="/assets_admin/plugins/select2/js/select2.full.min.js"></script>

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
                        //$('#mediaupload')[0].reset();
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
                        
                        //$('#uploaded_image').attr('src',data.uploaded_image);
                    }
                })
            }
        });
    $(document).ready(function () {
        /*$('#summernote').summernote({
            placeholder: 'Enter news content',
            tabsize: 2,
            height: 300
        });*/
        $('#select_category').on('change', function() {
            //alert( $(this).find(":selected").val() );
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
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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
    $('#daterange-btn').daterangepicker(
      {
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

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
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

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
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
                        <h1 class="m-0 text-dark">{{ $type == 'edit' ? 'Edit' : 'Create' }} Content</h1>
                        @if ($type=='edit')
                        <form action="{{route('admin.content.destroy', ['content'=>$blog->id])}}" method="post">
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
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                         
                            
                        <form class="p-3" method="post" action="{{$type == 'edit' ? route('admin.content.update', ['content'=>$blog->id]) : route('admin.content.store') }}" enctype="multipart/form-data" id="mediaupload">
                            @csrf
                            @if ($type == 'edit')
                            @method('put')
                            @endif
                            
                            
                            <div class="row">

                                <div class="col-md-8">

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="input-title" aria-describedby="" placeholder="Enter Title" name="title"
                                            value="{{$type == 'edit' ? $blog->title : old('title')}}">
                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Publish Date</label>
                                        <div class="start_date input-group mb-4">
                                            <input
                                                class="form-control start_date @error('published') is-invalid @enderror "
                                                type="text" placeholder="Enter Date" id="startdate_datepicker"
                                                name="published" value="{{$type == 'edit' ? $blog->published : old('published')}}">
                                            <div class="input-group-append">
                                                <span class="fa fa-calendar input-group-text start_date_calendar"
                                                    aria-hidden="true "></span>
                                            </div>
                                            @error('published')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Select Category" style="width: 100%;" name="category[]" id="select_category">
                                          @if (isset($blog))
                                          @php
                                          $cat_selected = json_decode($blog->category);
                                          @endphp
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
                                          @endif
                                          
                                         
                                            
                                        </select>
                                      </div>
                                      <div class="form-group @if (isset($blog))
                                          @if ($blog->parent!=null)
                                        
                                          @else
                                          d-none
                                          @endif
                                         
                                        @else
                                        d-none
                                        @endif
                                      " id="child_category_form">
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
                                        <input type="text" class="form-control @error('url') is-invalid @enderror"
                                            id="inputurl" aria-describedby="" placeholder="Enter URL" name="url"
                                            value="{{$type == 'edit' ? $blog->url : old('url')}}">
                                        @error('url')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>



                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        {{--<div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>--}}
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                                <p class="m-0">Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="file" id="fileinput" class="dropzone"
                                                {{--multiple="" accept="image/*"--}}>
                                        </div>
                                        <input type="text" class="form-control @error('img_url') is-invalid @enderror"
                                            id="inputimg_url" aria-describedby="" placeholder="Enter Image URL" name="img_url"
                                            value="{{$type == 'edit' ? $blog->thumbnail_img : old('img_url')}}">
                                            <img class="img-thumbnail img-contain w-100 {{$type == 'edit' ? '' : 'd-none'}}" id="blah" src="{{$type == 'edit' ? $blog->thumbnail_img : old('img_url')}}"
                                                alt="image" />
                                    </div>
                                    {{--<div class="form-group h-100 d-flex mb-0  flex-column">
                                        <label>Picture</label>
                                        <div class="form-pic-preview border flex-grow-1">
                                            <div class="w-100 h-100 d-flex dummy-pic">
                                                <h1 class="m-auto"><i class="fa fa-picture-o" aria-hidden="true"></i>
                                                </h1>
                                            </div>
                                            <img class="img-thumbnail img-contain w-100 d-none" id="blah" src="#"
                                                alt="image" />
                                        </div>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="file2"
                                                onchange="readUrl(this)">
                                            <label class="custom-file-label text-truncate" for="customFile">Choose
                                                file</label>
                                        </div>
                                        @error('file')
                                        <span class="badge badge-danger">{{$message}}</span>
                                        @enderror

                                    </div>--}}



                                </div>


                            </div>
                            <div class="row">
                                <div class="col">

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Content</label>
                                        {{--<textarea id="summernote" name="description"></textarea>--}}
                                        <textarea name="description_text">{{$type == 'edit' ? $blog->content : old('description_text')}}</textarea>
                                        <script>
                                            CKEDITOR.replace('description_text', {
                                                filebrowserUploadUrl: "{{route('admin.file.ck_store', ['_token' => csrf_token() ])}}",
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

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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