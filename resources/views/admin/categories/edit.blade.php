@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit category</h1>
            </div>
        <!-- /.col-lg-12 -->
        </div>
    <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-7">
                                {!! Form::model($category, ['url'=>'admin-shop/category/edit/'.$category->id, 'method'=>'put']) !!}
                                    @include('admin.categories.form')
                                {!! Form::close() !!}
                            </div>
                        <!-- /.col-lg-6 (nested) -->
                        </div>
                    <!-- /.row (nested) -->
                    </div>
                <!-- /.panel-body -->
                </div>
            <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@stop
