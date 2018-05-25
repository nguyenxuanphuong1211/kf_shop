@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit product</h1>
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
                                {!! Form::model($product, ['url'=>'admin-shop/product/edit/'.$product->id,'files' => true,'method'=>'put']) !!}
                                    @include('admin.products.form')
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
