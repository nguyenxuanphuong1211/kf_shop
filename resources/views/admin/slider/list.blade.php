@extends('admin.master') @section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Slider</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> List of slider <a href="{{ url('admin-shop/slide/add') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add slide</button></a></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title 1</th>
                            <th>Title 2</th>
                            <th>Title 3</th>
                            <th>Link</th>
                            <th>Tool</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title 1</th>
                            <th>Title 2</th>
                            <th>Title 3</th>
                            <th>Link</th>
                            <th>Tool</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($slides as $index=> $slide)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td><img style="height: 60px; width: 100px;" src="{{asset('page/img/slider/'.$slide ->image)}}" alt=""></td>
                            <td>{{ $slide ->title_1 }}</td>
                            <td>{{ $slide ->title_2 }}</td>
                            <td>{{ $slide ->title_3 }}</td>
                            <td>{{ $slide ->link }}</td>
                            <td>
                                <a href="{{url('admin-shop/slide/edit')}}/{{ $slide->id }}"><i class="fa fa-edit"></i> Edit</a><br>
                                <a style="color: red;" href="{{url('admin-shop/slide/delete')}}/{{ $slide->id }}" onclick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
