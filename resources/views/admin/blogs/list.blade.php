@extends('admin.master') @section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Blogs</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> List of blogs <a href="{{ route('add-blog') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add blog</button></a></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Tool</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Tool</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($blogs as $index=> $blog)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td><a href="{{ url('blog/'.$blog->alias) }}">{{ $blog ->title }}</a></td>
                            <td><img style="height: 60px; width: 100px;" src="{{asset('page/img/blog/'.$blog ->thumbnail)}}" alt=""></td>
                            <td>
                                <a href="{{ url('admin-shop/blog/edit/'.$blog->id) }}"><i class="fa fa-edit"></i> Edit</a><br>
                                <a style="color: red;" href="{{ url('admin-shop/blog/delete/'.$blog->id) }}" onclick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i> Delete</a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
