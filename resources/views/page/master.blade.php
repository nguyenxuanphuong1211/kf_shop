<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shop || KF Design</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
		============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		<!-- google fonts -->
		<link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{asset('page/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="{{asset('page/css/animate.css')}}">
		<!-- pe-icon-7-stroke -->
		<link rel="stylesheet" href="{{asset('page/css/pe-icon-7-stroke.min.css')}}">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{asset('page/css/jquery-ui.min.css')}}">
        <!-- Image Zoom CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('page/css/img-zoom/jquery.simpleLens.css')}}">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{asset('page/css/meanmenu.min.css')}}">
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="{{asset('page/lib/css/nivo-slider.css')}}" type="text/css" />
		<link rel="stylesheet" href="{{asset('page/lib/css/preview.css')}}" type="text/css" media="screen" />
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{asset('page/css/owl.carousel.css')}}">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="{{asset('page/css/font-awesome.min.css')}}">
		<!-- style css -->
		<link rel="stylesheet" href="{{asset('page/style.css')}}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{asset('page/css/responsive.css')}}">
		<!-- modernizr css -->
        <script src="{{asset('page/js/vendor/modernizr-2.8.3.min.js')}}"></script>

        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    </head>
    <body>
        {!! Toastr::render() !!}
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @include('page.partials.header')

        @yield('content')

        @include('page.partials.brand')

        @include('page.partials.service')

        @include('page.partials.footer')

		<!-- all js here -->
        
		<!-- jquery latest version -->
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
        <script src="{{asset('page/js/bootstrap.min.js')}}"></script>
        <!-- parallax js -->
        <script src="{{asset('page/js/parallax.min.js')}}"></script>
		<!-- owl.carousel js -->
        <script src="{{asset('page/js/owl.carousel.min.js')}}"></script>
        <!-- Img Zoom js -->
		<script src="{{asset('page/js/img-zoom/jquery.simpleLens.min.js')}}"></script>
		<!-- meanmenu js -->
        <script src="{{asset('page/js/jquery.meanmenu.js')}}"></script>
		<!-- jquery.countdown js -->
        <script src="{{asset('page/js/jquery.countdown.min.js')}}"></script>
		<!-- Nivo slider js
		============================================ -->
		<script src="{{asset('page/lib/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
		<script src="{{asset('page/lib/home.js')}}" type="text/javascript"></script>
		<!-- jquery-ui js -->
        <script src="{{asset('page/js/jquery-ui.min.js')}}"></script>
		<!-- sticky js -->
        <script src="{{asset('page/js/sticky.js')}}"></script>
		<!-- plugins js -->
        <script src="{{asset('page/js/plugins.js')}}"></script>
		<!-- main js -->
        <script src="{{asset('page/js/main.js')}}"></script>
        
        
<!-- ajax add to cart -->
        <script>
            $(document).ready(function(){
                $(".add_to_card").click(function(){
                    // alert(23456);
                    //$qty = $(this).find(".qty1").val();
                    $rowid = $(this).attr('id');
                    $name = 'add_product';
                    $.ajax({
                        type: "GET",
                        url: 'cart/add-cart-product/'+$rowid+'/'+$name,
                        data: {"id":$rowid, "name":$name},
                        success:function(data){
                            $("#cart").load("views.partials.cart");
                            $('#qtyspcart').text(data[0]);
                            $('#total_cart').text(data[1]);
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $(".qty").change(function(){

                    $qty = $(this).find(".qty1").val();
                    $rowid = $(this).attr('id');
                    $.ajax({
                        type: "GET",
                        url: 'update_qty_cart/'+$rowid+'/'+$qty,
                        data: {"id":$rowid, "qty":$qty},
                        success:function(data){

                           $('#price_pro'+$rowid).text(data[0]);
                           $('#total').text(data[2]);
                           $('#total1').text(data[2]);
                           $('#total_cart').text(data[2]);
                           $('#qtyspcart').text(data[1]);
                           $('.floatright').text(data[2]);
                        }
                    });
                });
                
            });
        </script>

     <!--    <script
  src="http://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script> -->
        <script src="{{asset('page/js/jsvalidate/jquery.validate.js')}}"></script>
    
<script type="text/javascript">
 
    $().ready(function() {
        $("#form-checkout").validate({
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone_number: "required",
                order_address: "required",
                note: {
                    required: true,
                    maxlength: 200
                },            },
            messages: {
                first_name: "Please enter a first name",
                last_name: "Please enter a last name",
                email: {
                    required: "Please enter a email",
                    email: "Please enter a valid email address"
                },
                phone_number: "Please enter a phone number",
                order_address: "Please enter a order address",
                note: {
                    required: "Please enter a note",
                    maxlength: "Please enter maxlegth 200"
                },
                
            }
        });
    });
</script>
        
    </body>
</html>
