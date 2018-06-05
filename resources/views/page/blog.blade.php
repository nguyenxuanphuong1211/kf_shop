@extends('page.master') @section('content')
<!-- pages-title-start -->
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Blog</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- pages-title-end -->
<!-- Blog content section start -->
<section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                @foreach($blogs as $blog)
                <div class="tb-post-item">
                    <a href="{{ url('blog/'.$blog->alias) }}">
                        <div class="tb-thumb">
                            <img src="{{asset('page/img/blog/'.$blog->thumbnail)}}" alt="">
                        </div>
                    </a>
                    <div class="tb-content7">
                        <a href="{{ url('blog/'.$blog->alias) }}"><h4 class="tb-titlel" style="font-weight: bold;">{{ $blog->title }}</h4></a>
                        <div class="blog-info">
                            <span class="author-name">
                                <i class="fa fa-clock-o"></i>
                                {{ $blog->created_at->format('d-M-Y') }}
                            </span>
                        </div>
                        <div class="tb-excerpt"> {{ $blog->description }} </div>
                    </div>
                </div>
                @endforeach
                <!-- pagination box -->
                <div class="pagination-box" style="text-align: center;">
                    {{$blogs->links()}}
                </div>
                <!-- End Pagination box -->

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
                        @foreach($blogs->take(5) as $blog)
                        <li>
                            <div class="tb-recent-thumbb">
                                <a href="{{ url('blog/'.$blog->alias) }}">
                                    <img class="attachment" src="{{asset('page/img/blog/'.$blog->thumbnail)}}" alt="">
                                </a>
                                <div class="recent-thumb-overlay"></div>
                            </div>
                            <div class="tb-recentb">
                                <div class="tb-postb">
                                    <a href="{{ url('blog/'.$blog->alias) }}"><p>{{ $blog->title }}</p></a>
                                </div>
                                <div class="tb-postd">
                                    <span class="author-name">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $blog->created_at->format('d-M-Y') }}
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

@endsection
