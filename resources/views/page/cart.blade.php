@extends('page.master')
@section('content')
<!-- pages-title-start -->
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Shopping Cart</h2>
                    <p><a href="#">Home</a> | Shopping Cart</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- pages-title-end -->
<!-- shopping-cart content section start -->
<div class="shopping-cart-area s-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="s-cart-all">
                    <div class="cart-form table-responsive">
                        <table id="shopping-cart-table" class="data-table cart-table">
                            <tr>
                                <th class="low1">Product</th>
                                <th class="low7">Quantity</th>
                                <th class="low7">Price</th>
                                <th class="low7">Total</th>
                            </tr>
                            @foreach(\Cart::content() as $content)
                            <tr>
                                <td class="sop-cart an-shop-cart">
                                    <a href="#"><img class="primary-image" alt="" src="{{ asset('page/img/products/'.$content->options->image)}}"</a>
                                    <a href="#">{{ $content->name }}</a>
                                </td>
                                <td class="sop-cart an-sh" >
                                    <div class=" ray qty " id="{{$content->rowId}}">
                                        <input class="input-text  qty1 text" name="qty1" type="number" size="4" title="Qty" value="{{ $content->qty }}" min="1" step="1">
                                    </div>
                                    <a class="remove" href="{{ url('cart/delete-product-cart/'.$content->rowId) }}">
                                        <span>x</span>
                                    </a>
                                </td>
                                <td class="sop-cart">
                                    <div class="tb-product-price font-noraure-3">
                                        <span class="amount">${{ $content->price }}</span>
                                    </div>
                                </td>
                                <td class="cen" >
                                    <span id="price_pro{{$content->rowId}}" class="amount">$ {{ $content->price * $content->qty }}</span>
                                </td>
                            </tr>
                            @endforeach
                            
                        </table>
                    </div>
                    <div class="last-check1">
                        <div class="yith-wcwl-share yit">
                            <p class="checkout-coupon an-cop">
                               <!-- <a href=""> <input type="submit" value="CONTINUE SHOPPING"></a> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="second-all-class">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="tb-tab-container2">
                        <ul class="etabs" role="tablist">
                            <li role="presentation" class="vc_tta-tab active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Estimate Shipping & Taxe</a></li>
                            <li class="vc_tta-tab " role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Use Coupon Code</a></li>
                        </ul>
                        <div class="tab-content another-cen">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="top-shopping4">
                                    <p class="shop9">Information Order</p>
                                    <p class="down-shop">Enter your destination to get a shipping estimate</p>
                                </div>
                                <form  action="{{url('cart/checkout')}}" method="GET" id="form-checkout" >
                                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                                    <p class="form-row form-row-wide">
                                        <label>
                                            <span class="required">* First Name</span>
                                        </label>
                                        <input type="text" placeholder="Enter First Name" name="first_name" >
                                    </p>
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <p class="form-row form-row-wide">
                                        <label>
                                            <span class="required">* Last Name</span>
                                        </label>
                                        <input type="text" placeholder="Enter Last Name" name="last_name" >
                                    </p>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <p class="form-row form-row-wide">
                                        <label>
                                            <span class="required">* Emai</span>
                                        </label>
                                        <input type="text" placeholder="Enter Email" name="email" >
                                        
                                    </p>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <p class="form-row form-row-wide">
                                        <label>
                                            <span class="required">* Phone Number</span>
                                        </label>
                                        <input type="text" placeholder="Enter Phone Number" name="phone_number" >
                                    </p>
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <p class="form-row form-row-wide">
                                        <label>
                                            <span class="required">* Order Address</span>
                                        </label>
                                        <input type="text" placeholder="Enter Order Address" name="order_address" >
                                    </p>
                                    @if ($errors->has('order_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('order_address') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <p class="form-row form-row-wide">
                                        <label class="control-label">Date Order </label><br>
                                        <input class="form-control" name="date_order" type="date" id="date" value="<?php echo date('Y-m-d'); ?>">
                                    </p>
                                    <br>
                                    <p class="form-row form-row-wide">
                                        <label class="control-label">Note </label><br>
                                        <textarea rows="3" cols="47" placeholder="Enter Note" name="note" ></textarea>
                                    </p>
                                    @if ($errors->has('note'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('note') }}</strong>
                                        </span>
                                    @endif
                                    <p class="checkout-coupon two">
                                        <input type="submit" value="Checkout">
                                    </p>
                                </form>        
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="2nd-copun-code">
                                    <form action="#">
                                        <p class="form-row form-row-wide">
                                            <label>
                                                Coupon:  
                                                <span class="required">*</span>
                                            </label>
                                            <input class="form-control again" type="text" name="name" required="" placeholder="Coupon code">
                                        </p>
                                        <p class="checkout-coupon full">
                                            <input type="submit" value="Apply Coupon">
                                        </p>
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="sub-total">
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal:</th>
                                    <td>
                                        <span id="total" class="amount">${{ \Cart::total() }}</span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total:</th>
                                    <td>
                                        <strong>
                                            <span id="total1" class="amount">${{ \Cart::total() }}</span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="wc-proceed-to-checkout">
                        <p class="return-to-shop">
                            <a class="button wc-backward" href="{{url('/')}}">Continue Shopping</a>
                        </p>
                        <!-- <input type="submit" value="Confirm Order"> -->
                        <!-- <a class="wc-forward" href="{{ url('checkout') }}"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shopping-cart  content section end -->
<!-- quick view start -->
<div class="quick-view modal fade in" id="quick-view">
	<div class="container">
		<div class="row">
			<div id="view-gallery" class="owl-carousel product-slider owl-theme">
				<div class="col-xs-12">
					<div class="d-table">
						<div class="d-tablecell">
							<div class="modal-dialog">
								<div class="main-view modal-content">
									<div class="modal-footer" data-dismiss="modal">
										<span>x</span>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-5">
											<div class="quick-image">
												<div class="single-quick-image tab-content text-center">
													<div class="tab-pane  fade in active" id="sin-pro-1">
														<img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="" />
													</div>
													<div class="tab-pane fade in" id="sin-pro-2">
														<img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="" />
													</div>
													<div class="tab-pane fade in" id="sin-pro-3">
														<img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="" />
													</div>
													<div class="tab-pane fade in" id="sin-pro-4">
														<img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="" />
													</div>
												</div>
												<div class="quick-thumb">
													<div class="nav nav-tabs">
														<ul>
															<li><a data-toggle="tab" href="#sin-pro-1"> <img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="quick view" /> </a></li>
															<li><a data-toggle="tab" href="#sin-pro-2"> <img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="quick view" /> </a></li>
															<li><a data-toggle="tab" href="#sin-pro-3"> <img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="quick view" /> </a></li>
															<li><a data-toggle="tab" href="#sin-pro-4"> <img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="quick view" /> </a></li>
														</ul>
													</div>
												</div>
											</div>							
										</div>
										<div class="col-xs-12 col-sm-7">
											<div class="quick-right">
												<div class="quick-right-text">
													<h3><strong>product name title</strong></h3>
													<div class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
														<i class="fa fa-star-o"></i>
														<a href="#">06 Review</a>
														<a href="#">Add review</a>
													</div>
													<div class="amount">
														<h4>$65.00</h4>
													</div>
													<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrames bled it make a type specimen book. It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
													<div class="row m-p-b">
														<div class="col-sm-12 col-md-6">
															<div class="por-dse responsive-strok clearfix">
																<ul>
																	<li><span>Availability</span><strong>:</strong> In stock</li>
																	<li><span>Condition</span><strong>:</strong> New product</li>
																	<li><span>Category</span><strong>:</strong> <a href="#">Men</a> <a href="#">Fashion</a> <a href="#">Shirt</a></li>
																</ul>
															</div>
														</div>
														<div class="col-sm-12 col-md-6">
															<div class="por-dse color">
																<ul>
																	<li><span>color</span><strong>:</strong> <a href="#">Red</a> <a href="#">Green</a> <a href="#">Blue</a> <a href="#">Orange</a></li>
																	<li><span>size</span><strong>:</strong>  <a href="#">SL</a> <a href="#">SX</a> <a href="#">M</a> <a href="#">XL</a></li>
																	<li><span>tag</span><strong>:</strong> <a href="#">Men</a> <a href="#">Fashion</a> <a href="#">Shirt</a></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="dse-btn">
														<div class="row">
															<div class="col-sm-12 col-md-6">
																<div class="por-dse clearfix">
																	<ul>
																		<li class="share-btn qty clearfix"><span>quantity</span>
																			<form action="#" method="POST">
																				<div class="plus-minus">
																					<a class="dec qtybutton">-</a>
																					<input type="text" value="02" name="qtybutton" class="plus-minus-box">
																					<a class="inc qtybutton">+</a>
																				</div>
																			</form>
																		</li>
																		<li class="share-btn clearfix"><span>share</span>
																			<a href="#"><i class="fa fa-facebook"></i></a>
																			<a href="#"><i class="fa fa-twitter"></i></a>
																			<a href="#"><i class="fa fa-google-plus"></i></a>
																			<a href="#"><i class="fa fa-linkedin"></i></a>
																			<a href="#"><i class="fa fa-instagram"></i></a>
																		</li>
																	</ul>
																</div>
															</div>
															<div class="col-sm-12 col-md-6">
																<div class="por-dse clearfix responsive-othre">
																	<ul class="other-btn">
																		<li><a href="#"><i class="fa fa-heart"></i></a></li>
																		<li><a href="#"><i class="fa fa-refresh"></i></a></li>
																		<li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
																	</ul>
																</div>
																<div class="por-dse add-to">
																	<a href="#">add to cart</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- single-product item end -->
				<div class="col-xs-12">
					<div class="d-table">
						<div class="d-tablecell">
							<div class="modal-dialog">
								<div class="main-view modal-content">
									<div class="modal-footer" data-dismiss="modal">
										<span>x</span>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-5">
											<div class="quick-image">
												<div class="single-quick-image tab-content text-center">
													<div class="tab-pane  fade in active" id="sin-pro-5">
														<img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="" />
													</div>
													<div class="tab-pane fade in" id="sin-pro-6">
														<img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="" />
													</div>
													<div class="tab-pane fade in" id="sin-pro-7">
														<img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="" />
													</div>
													<div class="tab-pane fade in" id="sin-pro-8">
														<img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="" />
													</div>
												</div>
												<div class="quick-thumb">
													<div class="nav nav-tabs">
														<ul>
															<li><a data-toggle="tab" href="#sin-pro-5"> <img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="quick view" /> </a></li>
															<li><a data-toggle="tab" href="#sin-pro-6"> <img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="quick view" /> </a></li>
															<li><a data-toggle="tab" href="#sin-pro-7"> <img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="quick view" /> </a></li>
															<li><a data-toggle="tab" href="#sin-pro-8"> <img src="{{ asset('page/img/quick-view/10.jpg')}}" alt="quick view" /> </a></li>
														</ul>
													</div>
												</div>
											</div>							
										</div>
										<div class="col-xs-12 col-sm-7">
											<div class="quick-right">
												<div class="quick-right-text">
													<h3><strong>product name title</strong></h3>
													<div class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
														<i class="fa fa-star-o"></i>
														<a href="#">06 Review</a>
														<a href="#">Add review</a>
													</div>
													<div class="amount">
														<h4>$65.00</h4>
													</div>
													<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrames bled it make a type specimen book. It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
													<div class="row m-p-b">
														<div class="col-sm-6">
															<div class="por-dse">
																<ul>
																	<li><span>Availability</span><strong>:</strong> In stock</li>
																	<li><span>Condition</span><strong>:</strong> New product</li>
																	<li><span>Category</span><strong>:</strong> <a href="#">Men</a> <a href="#">Fashion</a> <a href="#">Shirt</a></li>
																</ul>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="por-dse color">
																<ul>
																	<li><span>color</span><strong>:</strong> <a href="#">Red</a> <a href="#">Green</a> <a href="#">Blue</a> <a href="#">Orange</a></li>
																	<li><span>size</span><strong>:</strong>  <a href="#">SL</a> <a href="#">SX</a> <a href="#">M</a> <a href="#">XL</a></li>
																	<li><span>tag</span><strong>:</strong> <a href="#">Men</a> <a href="#">Fashion</a> <a href="#">Shirt</a></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="dse-btn">
														<div class="row">
															<div class="col-sm-6">
																<div class="por-dse">
																	<ul>
																		<li class="share-btn qty clearfix"><span>quantity</span>
																			<form action="#" method="POST">
																				<div class="plus-minus">
																					<a class="dec qtybutton">-</a>
																					<input type="text" value="02" name="qtybutton" class="plus-minus-box">
																					<a class="inc qtybutton">+</a>
																				</div>
																			</form>
																		</li>
																		<li class="share-btn clearfix"><span>share</span>
																			<a href="#"><i class="fa fa-facebook"></i></a>
																			<a href="#"><i class="fa fa-twitter"></i></a>
																			<a href="#"><i class="fa fa-google-plus"></i></a>
																			<a href="#"><i class="fa fa-linkedin"></i></a>
																			<a href="#"><i class="fa fa-instagram"></i></a>
																		</li>
																	</ul>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="por-dse clearfix">
																	<ul class="other-btn">
																		<li><a href="#"><i class="fa fa-heart"></i></a></li>
																		<li><a href="#"><i class="fa fa-refresh"></i></a></li>
																		<li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
																	</ul>
																</div>
																<div class="por-dse add-to">
																	<a href="#">add to cart</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- single-product item end -->
			</div>
		</div>
	</div>
</div>
</form>
<!-- quick view end -->
<!-- jquery latest version -->
<!-- <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script> -->
<!-- <script src="{{asset('page/js/vendor/jquery-1.12.0.min.js')}}"></script> -->


<!-- <script src="{{asset('page/js/jsvalidate/jquery.js')}}"></script> -->

@stop