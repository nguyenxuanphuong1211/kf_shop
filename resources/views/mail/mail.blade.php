<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <p>Hello: <b>{{ $first_name }}</b> <b>{{ $last_name }}</b></p>
            <p>Phone Number: <b>{{ $phone_number }}</b></p>
            <p>Email: <b>{{ $email }}</b></p>
            <hr>
            <h3>Order Information</h3>
            <h4>Order code: <b>{{ $order_code }}</b></h4>
            <p>ID Order: <b>{{$bill_id}}</b></p>
            <p>Date Order: <b>{{$date_order}}</b></p>
            <p>Total: <b>{{number_format($total)}}</b></p>
            <p>Order Address: <b>{{$address}}</b></p>
            <hr>
            <h1>VIEW DETAIL ORDER</h1>
        <div class="container">
            <table class="table table-striped" style=" text-align: center;">
                <thead >
                    <tr >
                        
                        <th style="border: 1px solid gray;">Name Product</th>
                        <th style="border: 1px solid gray;">Quantity</th>
                        <th style="border: 1px solid gray;">Unit Price</th>
                        <th style="border: 1px solid gray;">Price</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($billdetail->bill_detail as $bill_detail)
                        <tr >
                            
                            <td style="border: 1px solid gray;">{{ $bill_detail->product->name }}</td>
                            <td style="border: 1px solid gray;">{{ $bill_detail->quantity }}</td>
                            <td style="border: 1px solid gray;">{{ $bill_detail->unit_price }}</td>
                            <td style="border: 1px solid gray;">{{ $bill_detail->quantity * $bill_detail->unit_price }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <p>Total: <b>{{ $total }}</b></p>
            </table>
        </div>
            <p>Thank you for your purchase at KF Shop, staff will contact you soonest.</p>
            <p>Best regards!!!</p>
        </div>
    </body>
</html>
