<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <p>Hello: <b>{{ $first_name }}</b> <b>{{ $last_name }}</b></p>
            <p>Phone Number: <b>{{ $phone_number }}</b></p>
            <p>Email: <b>{{ $email }}</b></p>
            <hr>
            <h3>Order Information</h3>
            <h4>Order code: <b>{{ $order_code }}</b></h4>

            <table class="table table-bordered" id="mytable" border="1px">
                <tr>
                    <th class="myth">ID Order</th>
                    <th class="myth">Date Order</th>
                    <th class="myth">Total</th>
                    <th class="myth">Order Address</th>
                </tr>
                <tr>
                    <td>{{$bill_id}}</td>
                    <td>{{$date_order}}</td>
                    <td>{{number_format($total)}}</td>
                    <td>{{$address}}</td>
                </tr>
            </table>
            <p>Thank you for your purchase at KF Shop, staff will contact you soonest.</p>
            <p>Best regards!!!</p>
        </div>
    </body>
</html>
