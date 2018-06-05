@extends('page.master')
@section('content')
<!-- pages-title-start -->
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">All products</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- pages-title-end -->
<!-- shop-style content section start -->
<section class="pages products-page section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3 col-sm-12">
                <div class="all-shop-sidebar">
                    <div class="top-shop-sidebar">
                        <h3 class="wg-title">SHOP BY</h3>
                    </div>
                    <div class="shop-one">
                        <h3 class="wg-title2">Categories</h3>
                        <ul>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ url('category/'.$category->alias) }}">{{ $category ->name }}</a>
                                <span class="count">( {{ count($category->products) }} )</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="shop-one">
                        <h3 class="wg-title2">Our Brand</h3>
                        <ul class="product-categories">
                            @foreach($brands as $brand)
                            <li class="cat-item">
                                <a href="{{ url('brand/'.$brand->alias) }}">{{ $brand ->name }}</a>
                                <span class="count">( {{ count($brand->products) }} )</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="shop-one re-shop-one">
                        <h3 class="wg-title2">Choose Price</h3>
                        <div class="widget shop-filter">
                            <div class="info_widget">
                                <div class="price_filter">
                                    <div id="slider-range"></div>
                                    <div id="amount">
                                        <input type="text" name="first_price" class="first_price" />
                                        <input type="text" name="last_price" class="last_price"/>
                                        <button class="button-shop" type="submit"><i class="fa fa-search search-icon"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-shop-sidebar an-shop">
                        <h3 class="wg-title">RECENT PRODUCTS</h3>
                        <ul>
                            @foreach($products ->take(5) as $product)
                           <li class="b-none">
                                <div class="tb-recent-thumbb">
                                    <a href="{{ url('view-detail-product/'.$product->alias) }}">
                                        <img class="attachment" src="{{asset('page/img/products/'.$product->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="tb-recentb">
                                    <div class="tb-beg">
                                        <a href="{{ url('view-detail-product/'.$product->alias) }}">{{ $product ->name }}</a>
                                    </div>
                                    <div class="tb-product-price font-noraure-3">
                                        @if(isset($product->promotion_price))
                                        <span class="price-left" style="color:#EF6644;">${{ $product ->promotion_price }}</span>
                                        @else
                                        <span class="price-left" style="color:#EF6644;">${{ $product ->unit_price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                       </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-8 col-lg-9 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="features-tab">
                          <!-- Nav tabs -->
                            <div class="shop-all-tab">
                                <div class="two-part">
                                    <ul class="nav tabs" role="tablist">
                                        <li class="vali">View as:</li>
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-align-justify"></i></a></li>
                                    </ul>
                                </div>
                                <div class="re-shop">
                                   <div class="sort-by">
                                        <div class="shop6">
                                            <label>Sort By :</label>
                                            <select id="dynamic_select">
                                                <option value="">Default sorting</option>
                                                <option value="{{ url('products/sort-by-name=asc') }}">Alphabetically: A-Z</option>
                                                <option value="{{ url('products/sort-by-name=desc') }}">Alphabetically: Z-A</option>
                                                <option value="{{ url('products/sort-by-price=asc') }}">Sort by price: low to high</option>
                                                <option value="{{ url('products/sort-by-price=desc') }}">Sort by price: high to low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="shop5">
                                        <label>Show :</label>
                                        <select>
                                            <option value="">12</option>
                                            <option value="">24</option>
                                            <option value="">36</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                          <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="shop-tab">
                                            @foreach($products as $product)
                                            <!-- single-product start -->
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        @if($product->deals ==1)
                                                        <div class="pro-type">
                                                            <span>sale</span>
                                                        </div>
                                                        @endif
                                                        <a href="{{ url('view-detail-product/'.$product->alias) }}">
                                                            <img src="{{asset('page/img/products/'.$product->image)}}" alt="{{ $product->name }}" />
                                                            <img class="secondary-image" alt="{{ $product->name }}" src="{{asset('page/img/products/'.$product->image)}}">
                                                        </a>
                                                    </div>
                                                    <div class="product-dsc">
                                                        <h3><a href="{{ url('view-detail-product/'.$product->alias) }}">{{ $product->name }}</a></h3>
                                                        <div class="star-price">
                                                            @if(isset($product->promotion_price))
                                                            <span class="price-left" style="color:#EF6644;">${{ $product ->promotion_price }}</span>&nbsp&nbsp&nbsp&nbsp
                                                            <span class="price-right" style="color:grey; text-decoration: line-through;">${{ $product->unit_price }}</span>
                                                            @else
                                                            <span class="price-left" style="color:#EF6644;">${{ $product ->unit_price }}</span>
                                                            @endif
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
                                                        <a data-placement="top" data-toggle="tooltip" href="{{ url('/view-detail-product/'.$product->alias)}}" data-original-title="View detail"><i class="fa fa-search-plus "></i></a>
                                                        <a class="add_to_card" href="{{ url('cart/add-cart-product/'.$product->id)}}" id="{{ $product->id }}" name="{{ $product->name }}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product end -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="li-item">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="tb-product-item-inner tb2 pct-last">
                                                    @if($product->deals ==1)
                                                    <div class="pro-type">
                                                        <span>sale</span>
                                                    </div>
                                                    @endif
                                                    <div class="re-img">
                                                        <a href="{{ url('view-detail-product/'.$product->alias) }}"><img alt="" src="{{asset('page/img/products/'.$product->image)}}"></a>
                                                    </div>
                                                    <div class="actions-btn">
                                                        <a data-original-title="Quick View" data-toggle="modal" data-trigger="hover" data-target="#quick-view" data-placement="top" href="#">
                                                        <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <div class="f-fix">
                                                    <div class="tb-beg">
                                                        <a href="{{ url('view-detail-product/'.$product->alias) }}">{{ $product->name }}</a>
                                                    </div>
                                                    <div class="tb-product-wrap-price-rating">
                                                        <div class="tb-product-price font-noraure-3">
                                                            @if(isset($product->promotion_price))
                                                            <span class="price-left" style="color:#EF6644;">${{ $product ->promotion_price }}</span>&nbsp&nbsp&nbsp&nbsp
                                                            <span class="price-right" style="color:grey; text-decoration: line-through;">${{ $product->unit_price }}</span>
                                                            @else
                                                            <span class="price-left" style="color:#EF6644;">${{ $product ->unit_price }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <p class="desc">{{ $product->description_brief }}</p>
                                                    <div class="last-cart l-mrgn ns">
                                                        <a class="las4" href="#">Add To Cart</a>
                                                    </div>
                                                    <div class="tb-product-btn">
                                                        <a href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa fa-retweet"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="shop-all-tab-cr shop-bottom">
                                <div class="two-part">
                                    <div class="shop5 page">
                                        <div class="pagination-box" style="text-align: center;">
                                            {{$products->links()}}
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
</section>
<!-- shop-style  content section end -->
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
                                                            <li><a data-toggle="tab" href="#sin-pro-1"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-2"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-3"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-4"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a></li>
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
                                                            <li><a data-toggle="tab" href="#sin-pro-5"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-6"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-7"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-8"> <img src="img/quick-view/10.jpg" alt="quick view" /> </a></li>
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
<script>
    $(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>
@stop
