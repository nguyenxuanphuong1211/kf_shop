@extends('page.master')
@section('content')
<!-- pages-title-start -->
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Blog Details</h2>
                    <p><a href="#">Home</a> | Blog Details</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- pages-title-end -->
<!-- Blog content section start -->
<section class="blog-area bd-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="tb-post-item ma-nn">
                    <a href="#">
                        <div class="tb-thumb">
                            <img src="img/banner/14.jpg" alt="">
                            <span class="tb-publish font-noraure-3">Nov / 21</span>
                        </div>
                    </a>
                    <div class="tb-content7">
                        <div class="blog-info">
                            <span class="author-name">
                                <i class="fa fa-clock-o"></i>
                                {{ $blog->created_at->format('d-M-Y') }}
                            </span>
                        </div>
                        <h4 class="tb-titlel" style="font-weight: bold;">{{ $blog->title }}</h4>
                        <div class="blog-desc">
                            {!! $blog->content !!}
                        </div>
                        <div class="next-pre">
                            <a class="blog1" href="#"> <i class="fa fa-angle-left"></i> Previous</a>
                            <a class="blog2" href="#"><i class="fa fa-angle-right"></i> Next</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="widget_searchform_content active">
                    <form action="#">
                        <input type="text" value="" name="s" placeholder="Search">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <div class="zo-recent-posts">
                    <h3 class="wg-title">Latest Posts</h3>
                    <ul>
                        @foreach($blogs_last as $blog_last)
                        <li>
                            <div class="tb-recent-thumbb">
                                <a href="{{ url('blog/'.$blog_last->alias) }}">
                                    <img class="attachment" src="{{asset('page/img/blog/'.$blog_last->thumbnail)}}" alt="">
                                </a>
                                <div class="recent-thumb-overlay"></div>
                            </div>
                            <div class="tb-recentb">
                                <div class="tb-postb">
                                    <a href="{{ url('blog/'.$blog_last->alias) }}"><p>{{ $blog_last->title }}</p></a>
                                </div>
                                <div class="tb-postd">
                                    <span class="author-name">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $blog_last->created_at->format('d-M-Y') }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog content section end -->
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
                                                        <img src="img/quick-view/10.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-2">
                                                        <img src="img/quick-view/10.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-3">
                                                        <img src="img/quick-view/10.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-4">
                                                        <img src="img/quick-view/10.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="quick-thumb">
                                                    <div class="nav nav-tabs">
                                                        <ul>
                                                            <li>
                                                                <a data-toggle="tab" href="#sin-pro-1"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab" href="#sin-pro-2"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab" href="#sin-pro-3"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab" href="#sin-pro-4"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a>
                                                            </li>
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
                                                                    <li><span>size</span><strong>:</strong> <a href="#">SL</a> <a href="#">SX</a> <a href="#">M</a> <a href="#">XL</a></li>
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
                                                        <img src="img/quick-view/10.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-6">
                                                        <img src="img/quick-view/10.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-7">
                                                        <img src="img/quick-view/10.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-8">
                                                        <img src="img/quick-view/10.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="quick-thumb">
                                                    <div class="nav nav-tabs">
                                                        <ul>
                                                            <li>
                                                                <a data-toggle="tab" href="#sin-pro-5"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab" href="#sin-pro-6"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab" href="#sin-pro-7"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab" href="#sin-pro-8"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a>
                                                            </li>
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
                                                                    <li><span>size</span><strong>:</strong> <a href="#">SL</a> <a href="#">SX</a> <a href="#">M</a> <a href="#">XL</a></li>
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

@endsection
