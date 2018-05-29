@extends('admin.master') @section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Brands</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> List of brands <a href="{{ url('admin-shop/brand/add') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add brand</button></a></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($brands as $index=> $brand)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td><a href="{{ url('admin-shop/brand/list') }}/{{ $brand->id }}">{{ $brand ->name }}</a> ({{ count($brand->products) }} products)</td>
                            <td><img style="height: 60px; width: 100px;" src="{{asset('page/img/brand/'.$brand ->image)}}" alt=""></td>
                            <td><a href="{{url('admin-shop/brand/edit')}}/{{ $brand->id }}"><i class="fa fa-edit"></i> edit</a></td>
                            @if(count($brand->products)==0)
                            <td><a style="color: red;" href="{{url('admin-shop/brand/delete')}}/{{ $brand->id }}" onclick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i> Delete</a></td>
                            @else
                            <td><i class="fa fa-ban  "></i> Cannot delete</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated at {{ $brand->orderBy('updated_at', 'desc')->first()->updated_at->format('H:i:s d-M-Y') }}</div>
    </div>
</div>
@stop
