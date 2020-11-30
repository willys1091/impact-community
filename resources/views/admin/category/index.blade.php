@extends('layout.main-admin')
@section('title', 'Category - Arif Furniture')
@section('page-container')

<div class="image-box h-min100vh">
    <div class="container py-3">
        <h1>Categories</h1>
        <a href="{{route('admin.categoryProduct.create')}}"><button type="button" class="btn btn-success"><i
                    class="fa fa-plus-circle" aria-hidden="true"></i> Add
                Category</button></a>
        @if (session('status'))
        <div class="alert alert-success my-3" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <table class="table table-hover table-dark my-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Code</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">PIC</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($category as $item)
                @if ($item->sub_category==null)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item->category_name}}</td>
                    <td>{{$item->product_code}}</td>
                    <td><span class="badge badge-light">Parent Category</span></td>
                    <td style="width: 30%"><img src="{{asset('/img/category'.$item->pic)}}" alt=""></td>
                    <td><a href="{{route('admin.categoryProduct.edit',$item->id)}}" class="badge badge-light">Detail</a></td>
                </tr>
                @php
                    $i++;
                @endphp
                @foreach ($category as $item2)
                @if ($item2->sub_category==$item->id)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item2->category_name}}</td>
                    <td>{{$item2->product_code}}</td>
                    <td>{{$item->category_name}}</td>
                    <td style="width: 30%"><img src="{{asset('/img/category'.$item2->pic)}}" alt=""></td>
                    <td><a href="{{route('admin.categoryProduct.edit',$item2->id)}}" class="badge badge-light">Detail</a></td>
                </tr>
                @php
                    $i++;
                @endphp
                @endif
                @endforeach
                @endif
               
                @endforeach
            </tbody>
        </table>
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
                    <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="{{$product}}">Detail</button>
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

    {{--@foreach ($product as $item)
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
@endforeach--}}

</div>
</div>
</div>

@endsection