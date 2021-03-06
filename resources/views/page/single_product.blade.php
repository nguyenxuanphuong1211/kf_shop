@extends('page.master')
@section('content')
<!-- pages-title-start -->
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Single Product</h2>
                    <p><a href="#">Home</a> | Single Product</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- pages-title-end -->
<!-- single peoduct content section start -->
<section class="single-product-area sit">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 col-sm-6 none-si-pro">
                        <div class="pro-img-tab-content tab-content">
                            <div class="tab-pane active" id="image-active">
                                <div class="simpleLens-big-image-container">
                                    <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="{{asset('page/img/products/'.$product->image)}}" href="{{asset('page/img/products/'.$product->image)}}">
                                        <img src="{{asset('page/img/products/'.$product->image)}}" alt="" class="simpleLens-big-image">
                                    </a>
                                </div>
                            </div>
                            @foreach($product->images as $image)
                            <div class="tab-pane " id="{{'image-'.$image->id}}">
                                <div class="simpleLens-big-image-container">
                                    <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="{{ asset('page/img/products/'.$image->name)}}" href="{{ asset('page/img/products/'.$image->name)}}">
                                        <img src="{{asset('page/img/products/'.$image->name)}}" alt="" class="simpleLens-big-image">
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="pro-img-tab-slider indicator-style2">
                            <div class="item"><a href="#image-active" data-toggle="tab"><img src="{{asset('page/img/products/'.$product->image)}}" alt="" /></a></div>
                            @foreach($product->images as $image)
                            <div class="item"><a href="{{'#image-'.$image->id}}" data-toggle="tab"><img src="{{ asset('page/img/products/'.$image->name)}}" alt="" /></a></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="cras">
                            <div class="product-name">
                                <h2>{{ $product->name }}</h2>
                            </div>
                            <div class="pro-rating cendo-pro">
                                <div class="pro_one">
                                    <img src="{{ asset('page/img/icon-img/stars-1.png')}}" alt="">
                                </div>
                                <p class="rating-links">
                                    <a href="#">1 Reviews</a>
                                </p>
                            </div>
                            <p class="availability in-stock">
                                Product Code: Product 3
                            </p>
                            <p class="availability in-stock2">
                                Availability:In stock
                            </p>
                            <div class="short-description">
                                <p>{{ $product->description_brief }}</p>
                            </div>
                            <div class="pre-box">
                                @if(isset($product->promotion_price))
                                <span class="special-price" style="color:#EF6644;">${{ $product ->promotion_price }} <h3 class="price" style="color:grey; text-decoration: line-through;">${{ $product->unit_price }}</h3> </span>

                                @else
                                <span class="special-price" style="color:#EF6644;">${{ $product ->unit_price }}</span>
                                @endif
                            </div>
                            <div class="add-to-box1">
                                <div class="add-to-box add-to-box2">
                                    <form action="{{url('cart/add_product_view')}}" method="GET">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <div class="add-to-cart">
                                            <div class="input-content">
                                                <label>Quantity:</label>
                                                <div class="quantity">
                                                    <div class="cart-plus-minus">
                                                      <input type="text" value="1" name="qty" class="cart-plus-minus-box">
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="product-icon">

                                                <br><br><br>
                                                <input class="btn btn-danger btn-cart" type="submit" value="add to cart">
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="s-cart-img">
                                <a href="#">
                                    <img alt="" src="{{ asset('page/img/icon-img/screenshot_2.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="text">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product Description</a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews (1)</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tab-con2">
                                <div role="tabpanel" class="tab-pane active" id="home">{!! $product->description_detail !!} </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <form class="form-horizontal">
                                        <div id="review">
                                            <table class="table table-striped table-bordered">
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <strong>demo</strong>
                                                    </td>
                                                    <td class="text-right">25/01/2016</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p class="text an-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet sem varius, fringilla erat a, blandit arcu. Cras sit amet justo eu erat imperdiet dictum ac eget nulla. Aliquam erat volutpat.</p>
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="text-right"></div>
                                        </div>
                                        <h2 class="write">Write a review</h2>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label" for="input-name">Your Name</label>
                                                <input id="input-name" class="form-control" type="text" value="" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label" for="input-review">Your Review</label>
                                                <textarea id="input-review" class="form-control" rows="5" name="text"></textarea>
                                                <div class="help-block">
                                                    <span class="text-danger">Note:</span>
                                                    HTML is not translated!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label">Rating</label>
                                                    Bad
                                                <input type="radio" value="1" name="rating">
                                                <input type="radio" value="2" name="rating">
                                                <input type="radio" value="3" name="rating">
                                                <input type="radio" value="4" name="rating">
                                                <input type="radio" value="5" name="rating">
                                                 Good
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label" for="input-captcha">Enter the code in the box below</label>
                                                <input id="input-captcha" class="form-control" type="text" value="" name="captcha">
                                            </div>
                                        </div>
                                        <div class="buttons si-button">
                                            <div class="pull-right">
                                                <button id="button-review" class="btn btn-primary" data-loading-text="Loading..." type="button">Continue</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="single-sidebar">
                    <div class="single-sidebar an-shop">
                        <h3 class="wg-title">RELATED PRODUCTS</h3>
                        <ul>
                            @foreach($product->category->products->where('id', '<>', $product->id) as $productresionship)
                           <li class="b-none7">
                                <div class="tb-recent-thumbb">
                                    <a href="{{ url('view-detail-product/'.$productresionship->alias) }}">
                                        <img class="attachment" src="{{ asset('page/img/products/'.$productresionship->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="tb-recentb7">
                                    <div class="tb-beg">
                                        <a href="{{ url('view-detail-product/'.$productresionship->alias) }}">{{ $productresionship->name }}</a>
                                    </div>
                                    <div class="tb-product-price font-noraure-3">
                                        @if(isset($productresionship->promotion_price))
                                        <span class="amount" style="color:#EF6644;">${{ number_format($productresionship ->promotion_price) }}</span>&nbsp&nbsp&nbsp&nbsp
                                        @else
                                        <span class="amount" style="color:#EF6644;">${{ number_format($productresionship ->unit_price) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                           @endforeach
                       </ul>
                    </div>
                    <div class="ro-info-box-wrap tpl3 st">
                        <div class="tb-image">
                            <img src="{{ asset('page/img/products/a1.jpg')}}" alt="">
                        </div>
                        <div class="tb-content">
                            <div class="tb-content-inner an-inner">
                                <h5>WOMEN'S FASHION</h5>
                                <h3>MID SEASON SALE</h3>
                                <h6>
                                    <a href="#">SHOP NOW</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
<!-- quick view end -->
@stop
