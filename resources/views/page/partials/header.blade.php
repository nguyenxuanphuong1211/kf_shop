<!-- header section start -->
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <div class="left-header clearfix">
                        <ul>
                            <li><p><i class="fa fa-phone" aria-hidden="true"></i>(+880) 1910 000251</p></li>
                            <li class="hd-none"><p><i class="fa fa-clock-o" aria-hidden="true"></i>Mon-fri : 9:00-19:00</p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8">
                    <!-- <div class="right-header">
                        <ul>
                            <li><a href="my-account.html"><i class="fa fa-user"></i>My account</a></li>
                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i>My cart</a></li>
                            <li><a href="wishlist.html"><i class="fa fa-heart"></i>My wishlist</a></li>
                            <li><a href="checkout.html"><i class="fa fa-usd"></i>Creck out</a></li>
                            <li><a href="login.html"><i class="fa fa-lock"></i>Login</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-one" id="sticky-menu">
        <div class="container relative">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-xs-4">
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{asset('page/img/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-10 col-md-10 col-xs-8 static">
                    <div class="all-manu-area">
                        <div class="mainmenu clearfix hidden-sm hidden-xs">
                            <nav>
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('products') }}">Shop</a>
                                        <ul>
                                            @foreach($categories as $category)
                                            <li><a href="{{ url('category/'.$category->alias) }}">{{ $category ->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <!-- <li><a href="shop.html">Shop</a>
                                        <div class="magamenu ">
                                            <ul class="again">
                                                <li class="single-menu colmd4">
                                                    <span>men’s wear</span>
                                                    <a href="#">shirts & top</a>
                                                    <a href="#">shoes</a>
                                                    <a href="#">dresses</a>
                                                    <a href="#">shwmwear</a>
                                                </li>
                                                <li class="single-menu colmd4">
                                                    <span>women’s wear</span>
                                                    <a href="#">shirts & tops</a>
                                                    <a href="#">shoes</a>
                                                    <a href="#">dresses</a>
                                                    <a href="#">shwmwear</a>
                                                </li>
                                                <li class="single-menu colmd4">
                                                    <span>accessories</span>
                                                    <a href="#">sunglasses</a>
                                                    <a href="#">leather</a>
                                                    <a href="#">belts</a>
                                                    <a href="#">rings</a>
                                                </li>
                                                <li class="single-menu colmd4 colmd5">
                                                    <a href="#">
                                                        <img alt="" srassetc="{{asset('page/img/maga-banner.png')}}">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li> -->
                                    <li><a href="{{ url('blogs') }}">Blog</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- mobile menu start -->
                        <div class="mobile-menu-area hidden-lg hidden-md">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('all-product') }}">Shop</a>
                                            <ul>
                                                @foreach($categories as $category)
                                                <li><a href="#">{{ $category ->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <!-- <li><a href="shop.html">Shop</a>
                                            <div class="magamenu ">
                                                <ul class="again">
                                                    <li class="single-menu colmd4">
                                                        <span>men’s wear</span>
                                                        <a href="#">shirts & top</a>
                                                        <a href="#">shoes</a>
                                                        <a href="#">dresses</a>
                                                        <a href="#">shwmwear</a>
                                                    </li>
                                                    <li class="single-menu colmd4">
                                                        <span>women’s wear</span>
                                                        <a href="#">shirts & tops</a>
                                                        <a href="#">shoes</a>
                                                        <a href="#">dresses</a>
                                                        <a href="#">shwmwear</a>
                                                    </li>
                                                    <li class="single-menu colmd4">
                                                        <span>accessories</span>
                                                        <a href="#">sunglasses</a>
                                                        <a href="#">leather</a>
                                                        <a href="#">belts</a>
                                                        <a href="#">rings</a>
                                                    </li>
                                                    <li class="single-menu colmd4 colmd5">
                                                        <a href="#">
                                                            <img alt="" srassetc="{{asset('page/img/maga-banner.png')}}">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li> -->
                                        <li><a href="{{ url('blogs') }}">Blog</a></li>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- mobile menu end -->
                        <div class="right-header re-right-header">
                            <ul>
                                <li class="re-icon tnm"><i class="fa fa-search" aria-hidden="true"></i>
                                    <form method="get" id="searchform" action="#">
                                        <input type="text" value="" name="s" id="ws" placeholder="Search product..." />
                                        <button type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </li>
                                <li><a href="{{ url('cart/view-detail-cart') }}"><i  class="fa fa-shopping-cart"></i><span id="qtyspcart" class="color1">{{ Cart::count() }}</span></a>
                                    <ul class="drop-cart">
                                        @foreach(\Cart::content() as $content)
                                        <li>
                                            <a  href="cart.html"><img src="{{asset('page/img/products/')}}" alt="" /></a>
                                            <div class="add-cart-text">
                                                <p><a href="#">{{ $content->name }}</a></p>
                                                <p>{{ $content->price }} x {{ $content->qty }}</p>
                                                <span>Color : Blue</span>
                                                <span>Size   : SL</span>
                                            </div>
                                            <!-- <div class="pro-close">
                                                <a href="{{ url('cart/delete-product-cart/'.$content->rowId) }}"><i class="pe-7s-close"></i></a>
                                            </div> -->
                                        </li>
                                        @endforeach
                                        <li class="total-amount clearfix">
                                            <span class="floatleft">total</span>
                                            <span class="floatright"><strong>= {{ \Cart::total() }}</strong></span>
                                        </li>
                                        <li>
                                            <!-- <div class="goto text-center">
                                                <a href="{{ url('cart/view-detail-cart') }}"><strong>go to cart &nbsp;<i class="pe-7s-angle-right"></i></strong></a>
                                            </div> -->
                                        </li>
                                        <li class="checkout-btn text-center">
                                            <a href="{{ url('cart/view-detail-cart') }}">Update/Check out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header section end -->
