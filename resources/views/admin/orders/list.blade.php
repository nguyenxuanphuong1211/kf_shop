@extends('admin.master') @section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Orders</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> List of orders </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order code</th>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Note</th>
                            <th>Address</th>
                            <th>Order date</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Order code</th>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Note</th>
                            <th>Address</th>
                            <th>Order date</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($orders as $index=>$order)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $order->order_code }} <br><a href="{{ url('admin-shop/order/detail/'.$order->id) }}"><i class="fa fa-angle-double-right"></i> Detail</a></td>
                            <td>{{ $order ->customer->first_name }}</td>
                            <td>{{ $order ->customer->last_name }}</td>
                            <td>{{ $order ->customer->email }}</td>
                            <td>{{ $order ->customer->phone_number }}</td>
                            <td>{{ $order ->note }}</td>
                            <td>{{ $order ->order_address }}</td>
                            <td>{{ $order->date_order }}</td>
                            <td>${{ number_format($order->total) }}</td>
                            <td>@if($order->status==0) Undelivery @elseif($order->status==1) Delivery @else Cancelled @endif <br> <a href="#"><button class="btn btn-success" >Change</button></a>  </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
