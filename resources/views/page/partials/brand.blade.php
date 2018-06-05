<!-- brand section start -->
<section class="section-padding-top">
   <div class="brand-logo">
        <div class="barnd-bg">
            <div class="container">
                <div class="row text-center">
                    <div id="brand-logo" class="re-owl-carousel21 owl-carousel product-slider owl-theme">
                        @foreach($brands as $brand)
                        <div class="col-xs-12">
                            <div class="single-brand">
                                <a href="{{url('brand/'.$brand->alias)}}"><img src="{{asset('page/img/brand/'.$brand->image)}}" alt="" /></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- brand section end -->
