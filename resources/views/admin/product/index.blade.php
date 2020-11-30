@extends('layout.main-admin')
@section('title', 'Product - Arif Furniture')
@section('page-container')



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-thumbnail my-3" id="img_detail" src="" alt="image" />
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="my-auto">
                            <h3 id="product_name"></h3>
                            <h5 id="code_product"></h5>
                            <hr>
                            <h6 class="m-0">Material :</h6>
                            <p id="material"></p>
                            <h6 class="m-0">Size :</h6>
                            <p id="size"></p>
                            <h6 class="m-0">Price :</h6>
                            <p id="price"></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes

  var modal = $(this)
  modal.find('.modal-title').text('Detail ' + recipient['product_name'])
  
  modal.find('.modal-body #img_detail').attr("src", "/img/product/"+recipient['pic']);
    $("#link_url").attr("href", "https://api.whatsapp.com/send?phone=6282322806428&text=Halo, Indoarteak! Saya minat dengan produk "+recipient['code_product']);
    modal.find('.modal-body #code_product').html(recipient['code_product']);
    modal.find('.modal-body #product_name').html(recipient['product_name']);
    modal.find('.modal-body #category').html(recipient['category']);
    modal.find('.modal-body #material').html(recipient['material']);
    modal.find('.modal-body #size').html(recipient['size']);
    
    if (recipient['price']!=null) {
        if (recipient['price']=='') {
            modal.find('.modal-body #price').html('Hubungi Kami');
        } else{
            modal.find('.modal-body #price').html(recipient['price']);
        }
        
    } else {
        if (recipient['price']!='') {
            modal.find('.modal-body #price').html(recipient['price']);
        }
        if (recipient['price']==null) {
            modal.find('.modal-body #price').html('Hubungi Kami');
        }
        //modal.find('.modal-body #price').html('Hubungi Kami');
    }
})
</script>
<div class="image-box h-min100vh">
    <div class="container py-3">
        <h1>Products</h1>
        <a href="{{route('admin.product.create')}}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                product</button></a>
        @if (session('status'))
        <div class="alert alert-success my-3" role="alert">
            {{ session('status') }}
        </div>
        @endif
        
        {{--@foreach ($category as $item)
        {{$item->category_name}}
        @foreach ($item->childs as $item2)
            {{--{{$item2['products']}}-/-}}
            @foreach ($item2['products'] as $item3)
                {{$item3['id']}}
            @endforeach
        @endforeach-/-}}
        @if (count($item->products)!=0)
        <h3 class="mt-3">{{$item->category_name}} {{$item->childs->products}}</h3>
        <hr>
        <div class="row ">

            {{--@foreach ($item->products as $product)
            <div class="col-md-4 my-2">
                <div class="card pi-pic">
                    <img src="{{asset($product->pic)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="limit-1">{{$product->product_name}}</b></h5>
                            <hr>
                            <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$product}}">Detail</button>
                            <a href="{{url()->current().'/'.$product->id.'/edit'}}" class="btn btn-success mx-1">Edit</a>
                            <form action="/ia-admin/product/{{$product->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger my-2">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach-/-}}
            
        </div>
        @endif

        @endforeach
        --}}
        <div class="row">

            @foreach ($product as $item)
            <div class="col-md-4 py-3 ">
                <div class="m-0 h-100 pi-pic bg-white rounded d-flex flex-column">
                    <img src="{{asset('/img/product/'.$item->pic)}}" class="card-img-top" alt="...">
                    <div class="pt-3 px-3 pb-0 my-auto">
                        <div class="text-center">
                            <h5><b>{{$item->product_name}}</b></h5>
                            <p>{{$item->categoryproduct['category_name']}}</p>
                            
                        </div>
                    </div>
                    
                    <div class="pb-2 px-3">
                        <hr class="m-1">
                        <a href="{{route('admin.product.edit', $item->id)}}" class="btn btn-success btn-sm">
                            <i class="fa fa-info" aria-hidden="true"></i>&nbsp; Detail</a>
                    </div>
                            
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>

@endsection
