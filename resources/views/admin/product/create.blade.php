@extends('layout.main-admin')
@section('title', 'Add Product')
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

        $("#inputproduct_name").change(function () {
            var x = $("#inputproduct_name").val();
            var url = x.replace(/\ /g, '-').toLowerCase();
            $("#inputurl").val($("#inputcode_product").val() +'-'+url);
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

    });
</script>
@endsection
@section('page-container')
<div class="h-100vh bg-cover">
    <div class="container py-3">
        <div class="container py-3">
            <h1>Add Product</h1>
            <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="custom-select @error('category') is-invalid @enderror"
                                value="{{old('category')}}">
                                <option value="" selected>Choose Option</option>
                                @foreach ($category as $item)
                                @if ($item->sub_category==null)
                                <optgroup label="{{$item->category_name}}">
                                <option value="{{$item->product_code}}"><strong>{{$item->category_name}}</strong></option>
                                @foreach ($category as $subitem)
                                @if ($subitem->sub_category==$item->id)
                                <option value="{{$subitem->product_code}}">{{$subitem->category_name}}</option>
                                @endif
                                
                                @endforeach
                                </optgroup>
                                @endif
                                
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Code Product</label>
                            <input type="text" class="form-control @error('code_product') is-invalid @enderror"
                                id="inputcode_product" aria-describedby="" placeholder="Enter Code Product"
                                name="code_product" value="{{old('code_product')}}">
                            @error('code_product')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                id="inputproduct_name" aria-describedby="" placeholder="Enter Product Name"
                                name="product_name" value="{{old('product_name')}}">
                            @error('product_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    id="inputprice" aria-describedby="" placeholder="Enter Price" name="price"
                                    value="{{old('price')}}">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Stock</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror"
                                    id="inputstock" aria-describedby="" placeholder="Enter stock" name="stock"
                                    value="{{old('stock')}}">
                                @error('stock')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Material</label>
                                <input type="text" class="form-control @error('material') is-invalid @enderror"
                                    id="inputmaterial" aria-describedby="" placeholder="Enter material" name="material"
                                    value="{{old('material')}}">
                                @error('material')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Finishing</label>
                                <input type="text" class="form-control @error('finishing') is-invalid @enderror"
                                    id="inputfinishing" aria-describedby="" placeholder="Enter finishing" name="finishing"
                                    value="{{old('finishing')}}">
                                @error('finishing')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        {{--<div class="form-group">
                            <label>Material</label>
                            <input type="text" class="form-control @error('material') is-invalid @enderror"
                                id="inputmaterial" aria-describedby="" placeholder="Enter Material" name="material"
                                value="{{old('material')}}">
                        @error('material')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control @error('sizeL') is-invalid @enderror"
                                    placeholder="Length" value="{{old('sizeL')}}" name="sizeL">
                                @error('sizeL')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <input type="text" class="form-control @error('sizeW') is-invalid @enderror"
                                    placeholder="Width" value="{{old('sizeW')}}" name="sizeW">
                                @error('sizeW')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <input type="text" class="form-control @error('sizeH') is-invalid @enderror"
                                    placeholder="Height" value="{{old('sizeH')}}" name="sizeH">
                                @error('sizeH')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>--}}

                </div>
                <div class="col-md-6">
                    <div class="form-group h-100 d-flex mb-0  flex-column">
                        <label>Picture</label>
                        <div class="form-pic-preview border flex-grow-1">
                            <div class="w-100 h-100 d-flex dummy-pic">
                                <h1 class="m-auto"><i class="fa fa-picture-o" aria-hidden="true"></i></h1>
                            </div>
                            <img class="img-thumbnail img-contain w-100 d-none" id="blah" src="#" alt="image" />
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="file"
                                onchange="readUrl(this)">
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
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                        id="inputurl" aria-describedby="" placeholder="Enter URL"
                        name="url" value="{{old('url')}}">
                    @error('url')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="short_desc" id="" rows="3" class="form-control @error('short_desc') is-invalid @enderror" placeholder="Enter Description">{{old('short_desc')}}</textarea>
                    {{--<input type="text" class="form-control @error('short_desc') is-invalid @enderror"
                        id="inputshort_desc" aria-describedby="" placeholder="Enter Description"
                        name="short_desc" value="{{old('short_desc')}}">--}}
                    @error('short_desc')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    {{--<textarea id="summernote" name="description"></textarea>--}}
                    <textarea name="description_text">{{old('description_text')}}</textarea>
                <script>
                        CKEDITOR.replace( 'description_text' );
                </script>
                </div>
                <div class="form-group">
                    <label>Keyword Tag</label>
                    <textarea name="meta_keyword" id="" rows="3" class="form-control @error('meta_keyword') is-invalid @enderror" placeholder="Enter Keyword Tag">{{old('meta_keyword')}}</textarea>
                    {{--<input type="text" class="form-control @error('meta_keyword') is-invalid @enderror"
                        id="inputmeta_keyword" aria-describedby="" placeholder="Enter Description"
                        name="meta_keyword" value="{{old('meta_keyword')}}">--}}
                    @error('meta_keyword')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
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