@extends('admin.master') @section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> List of categories <a href="{{ url('admin-shop/category/add') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Category</button></a></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($categories as $index=> $category)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $category ->name }}</td>
                            <td><a href="{{url('admin-shop/category/edit')}}/{{ $category->id }}"><i class="fa fa-edit"></i> edit</a></td>
                            <td><a href="{{url('admin-shop/category/delete')}}/{{ $category->id }}" onclick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i> Delete</a></td>
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
