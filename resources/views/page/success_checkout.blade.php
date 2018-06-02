@extends('page.master')
@section('content')
   <div style="text-align: center; margin-top: 200px;">
   		<h3>Order Information</h3>
        <h5>order cone: <b>{{ $billtomail->order_code }}</b></h5>
        <h5>Total: <b>${{ number_format($billtomail->total) }}</b></h5>
        <h5>order_address: <b>{{ $billtomail->order_address }}</b></h5>
   </div>         
	<hr>
	<div class="container">
    <h2>VIEW DETAIL BILL</h2>
    <p>view detail order of you, view detail order sended to mail for you.</p>
    <table class="table">
        <thead>
            <tr>
                <th >Index</th>
                <th >Name Product</th>
                <th >Quantity</th>
                <th >Unit Price</th>
                <th ">Price</th>
            </tr>
        </thead>
        <tfoot>
		    <tr>
		    	<td>Total</td>
		    	<td><b>${{ number_format($billtomail->total) }}</b></td>
		    </tr>
		</tfoot>
        <tbody>
            @foreach($billdetail->bill_detail  as $index=>$bill_detail)
                <tr >
                    <td >{{ $index+1 }}</td>
                    <td >{{ $bill_detail->product->name }}</td>
                    <td >{{ $bill_detail->quantity }}</td>
                    <td >${{ number_format($bill_detail->unit_price) }}</td>
                    <td >${{ number_format($bill_detail->quantity * $bill_detail->unit_price) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
<p style="text-align: center;"><b>Payment is successful, please check e mail for order details.</b>
	<br>
	please, check mail to view detail order for you.
	<br>
	<a href="{{ url('/')}}">go to home page</a>
	</p>
@stop