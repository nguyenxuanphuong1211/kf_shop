@extends('admin.master') @section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{ $category->name }}'s products</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> {{ $category->name }}'s products <a href="{{ route('add-product') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add product</button></a></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Promotion Price</th>
                            <th>Featured</th>
                            <th>Sale</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Promotion Price</th>
                            <th>Featured</th>
                            <th>Sale</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($products_cate as $index=> $product_cate)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td><a style="overflow: hidden; width:100px;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;" target="_blank" href="{{ url('view-detail-product/'.$product_cate->alias) }}">{{ $product_cate ->name }}</a></td>
                            <td> <img src="{{asset('page/img/products/'.$product_cate ->image)}}" style="height:90px; width:60px;"> </td>
                            <td>{{ $product_cate ->category->name }}</td>
                            <td>{{ $product_cate ->brand->name }}</td>
                            <td>{{ $product_cate ->quantity }}</td>
                            <td>${{ $product_cate ->unit_price }}</td>
                            <td>${{ $product_cate ->promotion_price}}</td>
                            <td>@if($product_cate->hot==1) Yes @else No @endif</td>
                            <td>@if($product_cate->deals==1) Yes @else No @endif</td>
                            <td><a href="{{url('admin-shop/product/edit')}}/{{ $product_cate->id }}"><i class="fa fa-edit"></i> edit</a></td>
                            <td><a href="{{url('admin-shop/product/delete')}}/{{ $product_cate->id }}" onclick="return confirm('Are you sure ?');"><i class="fa fa-edit" ></i> delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@stop
