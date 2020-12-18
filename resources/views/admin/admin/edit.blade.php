@extends('layout.main-admin')
@section('title', 'Edit Category')
@section('additional_head')
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


<script>
    $(document).ready(function () {
        /*$('#summernote').summernote({
            placeholder: 'Enter news content',
            tabsize: 2,
            height: 300
        });*/

        $("#inputcategory_name").change(function () {
            var x = $("#inputcategory_name").val();
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

        $('.img-thumbnail').height($('.form-pic-preview').height()-10);

        $('#sub_category_switch').click(function(){
            if($(this).prop("checked") == true){
                document.getElementById('exampleFormControlSelect1').disabled = false; 
                //$("fieldset").disabled = false;
            }
            else if($(this).prop("checked") == false){
                $("fieldset").disabled = false;
                document.getElementById('exampleFormControlSelect1').disabled = true; 
            }
        });

    });
</script>
@endsection
@section('page-container')
<div class="h-100vh bg-cover">
    <div class="container py-3">
        <div class="container py-3">
            <div class="d-flex flex-row justify-content-between">
                <h1>Edit Category</h1>
                <form action="{{route('admin.categoryProduct.destroy', $categoryProduct->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete Data</button>
                </form>
            </div>
            
            <form method="post" action="{{route('admin.categoryProduct.update', $categoryProduct->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                id="inputcategory_name" aria-describedby="" placeholder="Enter Product Name"
                                name="category_name" value="{{$categoryProduct->category_name}}">
                            @error('category_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control @error('url') is-invalid @enderror"
                                id="inputurl" aria-describedby="" placeholder="Enter URL"
                                name="url" value="{{$categoryProduct->url}}">
                            @error('url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Product Code</label>
                            <input type="text" class="form-control @error('product_code') is-invalid @enderror"
                                id="inputproduct_code" aria-describedby="" placeholder="Enter Code Product"
                                name="product_code" value="{{$categoryProduct->product_code}}">
                            @error('product_code')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label>Subcategory</label>
                                <label class="switch switch-3d switch-success mr-3">
                                    <input type="checkbox" class="switch-input" id="sub_category_switch" @if ($categoryProduct->sub_category!=null)
                                        checked
                                    @endif>
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                           
                                <select class="form-control" id="exampleFormControlSelect1" name="sub_category" @if ($categoryProduct->sub_category==null)
                                    disabled
                                    @endif>
                                    @foreach ($category as $item)
                                    @if ($categoryProduct->sub_category!=null && $categoryProduct->sub_category==$item->id)
                                    <option value="{{$item->id}}" selected>{{$item->category_name}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endif
                                        
                                    @endforeach
                                    
                                </select>
                            
                            
                        </div>
                        
                        
                </div>
                <div class="col-md-6">
                    <div class="form-group h-100 d-flex mb-0  flex-column">
                        <label>Picture</label>
                        <div class="form-pic-preview border flex-grow-1">
                            @if ($categoryProduct->pic!=null)
                            <div class="w-100 h-100 d-none dummy-pic">
                                <h1 class="m-auto"><i class="fa fa-picture-o" aria-hidden="true"></i></h1>
                            </div>
                            <img class="img-thumbnail img-contain w-100" id="blah" src="{{asset('/img/category/'.$categoryProduct->pic)}}" alt="{{$categoryProduct->product_name}}" />
                            @else
                            <div class="w-100 h-100 d-flex dummy-pic">
                                <h1 class="m-auto"><i class="fa fa-picture-o" aria-hidden="true"></i></h1>
                            </div>
                            <img class="img-thumbnail img-contain w-100 d-none" id="blah" src="{{asset('/img/category/'.$categoryProduct->pic)}}" alt="{{$categoryProduct->product_name}}" />
                            @endif
                            
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="file"
                                onchange="readUrl(this)">
                                <input type="hidden" name="pic_indicator" value="">
                            <label class="custom-file-label text-truncate" for="customFile">Choose file</label>
                        </div>
                        @error('file')
                        <span class="badge badge-danger">{{$message}}</span>
                        @enderror

                    </div>
                    


                </div>
        </div>
        <div class="row">
            <div class="col">    
                <button type="submit" class="btn btn-success">Update Data</button>
            </div>
        </div>
        </form>
    </div>
</div>
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
                $('.custom-file-label.text-truncate').text(imgName);
                $('input[name=pic_indicator]').val('yes');
                //alert($('input[name=pic_indicator]').val());
                //console.log(e.target.result);



            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#blah').attr('src', '{!!asset("/img/category/".$categoryProduct->pic)!!}');
            $('input[name=pic_indicator]').val('');
            $('.custom-file-label.text-truncate').text('Choose file');
            //$('.dummy-pic').removeClass('d-none').addClass('d-flex');

        }


    }
</script>
@endsection