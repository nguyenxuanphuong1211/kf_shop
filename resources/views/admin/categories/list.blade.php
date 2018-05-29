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
                            <td><a href="{{ url('admin-shop/category/list')}}/{{ $category->id }}">{{ $category ->name }}</a>  ({{ count($category->products) }} products)</td>
                            <td><a href="{{ url('admin-shop/category/edit')}}/{{ $category->id }}"><i class="fa fa-edit"></i> edit</a></td>
                            @if(count($category->products)==0)
                            <td><a style="color: red;" href="{{url('admin-shop/category/delete')}}/{{ $category->id }}" onclick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i> Delete</a></td>
                            @else
                            <td><i class="fa fa-ban  "></i> Cannot delete</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated at {{ $category->orderBy('updated_at', 'desc')->first()->updated_at->format('H:i:s d-M-Y') }}</div>
    </div>
</div>
@stop
