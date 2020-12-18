@extends('layout.main-admin')
@section('title', 'Category - Arif Furniture')
@section('page-container')

<div class="image-box h-min100vh">
    <div class="container py-3">
        <h1>Categories</h1>
        <a href="{{route('admin/categoryProduct/create')}}"><button type="button" class="btn btn-success"><i
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
        
<div class="row">

</div>
</div>
</div>

@endsection