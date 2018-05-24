@extends('page.master')
@section('content')
    <!-- slider-section-start -->
    <section class="slider-main-area">
        <div class="main-slider an-si">
            <div class="bend niceties preview-2 hm-ver-1">
                <div id="ensign-nivoslider-2" class="slides">
                    @foreach($slides as $slide)
                    <img src="{{asset('page/img/slider/'.$slide->image)}}" alt="" title="#{{ $slide->id }}"  />
                    @endforeach
                </div>
                @foreach($slides as $slide)
                <!-- direction 1 -->
                <div id="{{ $slide->id }}" class="t-cn slider-direction Builder">
                    <div class="slide-all">
                        <!-- layer 1 -->
                        <div class="layer-1">
                            <h2 class="title5">{{ $slide->title_1 }}</h2>
                        </div>
                        <!-- layer 2 -->
                        <div class="layer-2">
                            <h2 class="title6">{{ $slide->title_2 }}</h2>
                        </div>
                        <!-- layer 2 -->
                        <div class="layer-2">
                            <p class="title0">{{ $slide->title_3 }}</p>
                        </div>
                        <!-- layer 3 -->
                        <div class="layer-3">
                            <a class="min1" href="{{ $slide ->link }}">Shop Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- slider section end -->

    <!-- new-products section start -->
    <section class="featured-products single-products section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <h3>FEATURED PRODUCTS</h3>
                        <div class="section-icon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="product-tab nav nav-tabs">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#all">all shop</a></li>
                            @foreach($categories as $category)
                            <li><a data-toggle="tab" href="#{{ $category ->alias }}">{{ $category ->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row tab-content">
                <div class="tab-pane  fade in active" id="all">
                    <div id="tab-carousel-1" class="re-owl-carousel owl-carousel product-slider owl-theme">
                        @foreach($hot_products->where('hot','1') as $hot_product)
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="pro-type">
                                        <span>sale</span>
                                    </div>
                                    <a href="#">
                                        <img src="{{asset('page/img/products/'.$hot_product->image)}}" alt="Product Title" />
                                        <img class="secondary-image" alt="Product Title" src="{{asset('page/img/products/'.$hot_product->image)}}">
                                    </a>
                                </div>
                                <div class="product-dsc">
                                    <h3><a href="#">{{ $hot_product ->name }}</a></h3>
                                    <div class="star-price">
                                        <span class="price-left">$52.00</span>
                                        <span class="star-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="actions-btn">
                                    <a href="#" data-placement="top" data-target="#quick-view" data-trigger="hover" data-toggle="modal" data-original-title="Quick View"><i class="fa fa-eye"></i></a>
                                    <a data-placement="top" data-toggle="tooltip" href="{{ url('/view-detail-product/'.$hot_product->alias) }}" data-original-title="View detail"><i class="fa fa-search-plus "></i></a>
                                    <!-- <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Compare"><i class="fa fa-retweet"></i></a> -->
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- single product end -->
                        @endforeach
                    </div>
                </div>
                <!-- all shop product end -->
                @foreach($categories as $category)
                <div class="tab-pane  fade in" id="{{ $category ->alias }}">
                    <div id="tab-carousel-2" class="owl-carousel product-slider owl-theme">
                        @foreach($category ->products ->where('hot','1') as $product)
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{asset('page/img/products/'.$product ->image )}}" alt="Product Title" />
                                        <img class="secondary-image" alt="Product Title" src="{{asset('page/img/products/'.$product ->image )}}">
                                    </a>
                                </div>
                                <div class="product-dsc">
                                    <h3><a href="#">{{ $product ->name}}</a></h3>
                                    <div class="star-price">
                                        <span class="price-left">$52.00</span>
                                        <span class="star-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="actions-btn">
                                    <a href="#" data-placement="top" data-target="#quick-view" data-trigger="hover" data-toggle="modal" data-original-title="Quick View"><i class="fa fa-eye"></i></a>
                                    <a data-placement="top" data-toggle="tooltip" href="#" data-original-title="View detail"><i class="fa fa-search-plus "></i></a>
                                    <!-- <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Compare"><i class="fa fa-retweet"></i></a> -->
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- single product end -->
                        @endforeach
                    </div>
                </div>
                <!-- clothings product end -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- new-products section end -->
    <!-- testimonials section start -->

    <!-- testimonials section end -->
    <!-- new-products section start -->
    <section class="new-products single-products section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <h3>new product</h3>
                        <div class="section-icon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="new-products" class="owl-carousel product-slider owl-theme">
                    @foreach($new_products as $new_product)
                    <div class="col-xs-12">
                        <div class="single-product">
                            <div class="product-img">
                                <div class="pro-type">
                                    <span>sale</span>
                                </div>
                                <a href="#">
                                    <img src="{{asset('page/img/products/'.$new_product->image)}}" alt="Product Title" />
                                    <img class="secondary-image" alt="Product Title" src="{{asset('page/img/products/'.$new_product->image)}}">
                                </a>
                            </div>
                            <div class="product-dsc">
                                <h3><a href="#">{{ $new_product ->name }}</a></h3>
                                <div class="star-price">
                                    <span class="price-left">$52.00</span>
                                    <span class="star-right">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="actions-btn">
                                <a href="#" data-placement="top" data-target="#quick-view" data-trigger="hover" data-toggle="modal" data-original-title="Quick View"><i class="fa fa-eye"></i></a>
                                <a data-placement="top" data-toggle="tooltip" href="#" data-original-title="View detail"><i class="fa fa-search-plus "></i></a>
                                <!-- <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Compare"><i class="fa fa-retweet"></i></a> -->
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- single product end -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- new-products section end -->
    <!-- blog section start -->
    <section class="blog section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <h3>from the blog</h3>
                        <div class="section-icon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="blog" class="owl-carousel product-slider owl-theme re-blog">\
                    @foreach($blogs as $blog)
                    <div class="col-xs-12">
                        <div class="blog-container-inner">
                            <div class="post-thumb">
                                <a href="#"><img class="attachment-blog-list wp-post-image" alt="blog-2" src="{{asset('page/img/blog/'.$blog->thumbnail)}}"></a>
                            </div>
                            <div class="visual-inner">
                                <h2 class="blog-title">
                                    <a href="#">{{ $blog ->title }}</a>
                                </h2>
                                <div class="blog-meta">

                                    <span class="published">
                                        <i class="fa fa-clock-o"></i>
                                        Oct 31, 2014
                                    </span>
                                    <span class="published2">0 comment</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- single blog item end -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- blog section end -->
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
                                                            <img src="page/img/quick-view/10.jpg" alt="" />
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-2">
                                                            <img src="page/img/quick-view/10.jpg" alt="" />
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-3">
                                                            <img src="page/img/quick-view/10.jpg" alt="" />
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-4">
                                                            <img src="page/img/quick-view/10.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="quick-thumb">
                                                        <div class="nav nav-tabs">
                                                            <ul>
                                                                <li><a data-toggle="tab" href="#sin-pro-1"> <img src="page/img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-2"> <img src="page/img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-3"> <img src="page/img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-4"> <img src="page/img/quick-view/10.jpg" alt="quick view" /> </a></li>
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
                                                            <img src="page/img/quick-view/10.jpg" alt="" />
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-6">
                                                            <img src="page/img/quick-view/10.jpg" alt="" />
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-7">
                                                            <img src="page/img/quick-view/10.jpg" alt="" />
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-8">
                                                            <img src="page/img/quick-view/10.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="quick-thumb">
                                                        <div class="nav nav-tabs">
                                                            <ul>
                                                                <li><a data-toggle="tab" href="#sin-pro-5"> <img src="page/img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-6"> <img src="page/img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-7"> <img src="page/img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-8"> <img src="page/img/quick-view/10.jpg" alt="quick view" /> </a></li>
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
