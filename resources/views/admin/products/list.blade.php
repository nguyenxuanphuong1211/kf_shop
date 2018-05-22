@extends('admin.master') @section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Promotion Price</th>
                            <th>Unit</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Promotion Price</th>
                            <th>Unit</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($products as $index=> $product)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $product ->name }}</td>
                            <td>{{ $product ->image }}</td>
                            <td>{{ $product ->category->name }}</td>
                            <td>{{ $product ->brand->name }}</td>
                            <td>{{ $product ->quantity }}</td>
                            <td>{{ $product ->unit_price }}</td>
                            <td>{{ $product ->promotion_price}}</td>
                            <td>{{ $product ->unit}}</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@stop
