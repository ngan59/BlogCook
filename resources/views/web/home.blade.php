@extends('web.layout.master')

@section('content')
    <!-- Carousel/Slider Section -->
    <section class="section first-section">
        <div class="carousel-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">

                    @foreach ($slides as $key => $slide)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                            @if ($key == 0) class="active @endif"></li>
                    @endforeach

                </ol>
                <div class="carousel-inner">
                    @foreach ($slides as $key => $slide)
                        <div class="carousel-item @if ($key == 0) active @endif">
                            <img src="{{ asset('/image/slide/' . $slide->image) }}" class="d-block w-100 custom-image"
                                alt="Slide Image">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="custom-name">{{ $slide->name }}</p>
                                <h5 class="custom-description">{{ $slide->description }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>



    <!-- Highlighted Dishes Section -->
    {{-- <section class="section">
        <div class="container-fluid">
            <div class="masonry-blog row justify-content-center clearfix">
                @foreach ($highlight as $key => $dish)
                    @if ($key == 0)
                        <div class="first-slot">
                        @elseif ($key == 1)
                            <div class="second-slot">
                            @elseif ($key == 2)
                                <div class="last-slot">
                    @endif

                    <div class="masonry-box post-media">
                        <img src="{{ $dish->imageUrl() }}" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange">
                                        <a href="{{ route('web.category', $dish->category->slug) }}"
                                            title="">{{ $dish->category->name }}</a>
                                    </span>
                                    <h4
                                        style="font-size:20px; white-space: unset; width: 300px !important; overflow: hidden; text-overflow: ellipsis;">
                                        <a href="{{ route('web.dish', $dish->slug) }}"
                                            title="">{{ $dish->title }}</a>
                                    </h4>
                                    <small>{{ \Carbon\Carbon::parse($dish->created_at)->format('d-m-Y') }}</small>
                                    <small>{{ $dish->user->name }}</small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->

            </div><!-- end .first-slot/.second-slot/.last-slot -->
            @endforeach
        </div><!-- end masonry -->
        </div><!-- end container-fluid -->
    </section> --}}

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="page-wrapper">
                        <div class="blog-top clearfix">
                            <h4 class="pull-left">Công thức gần đây <a href="#"><i
                                        class="fa fa-cutlery food fa-spin"></i></a></h4>
                        </div><!-- end blog-top -->
                        @foreach ($new as $dish)
                            <div class="blog-list clearfix">
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="{{ route('web.dish', $dish->slug) }}" title="">
                                                <img src="{{ $dish->imageUrl() }}" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4 style="margin-left: 0px !important; padding: 12px 0px !important;"><a
                                                href="{{ route('web.dish', $dish->slug) }}"
                                                title="">{{ $dish->title }}</a></h4>
                                        <p
                                            style="  display: -webkit-box; -webkit-line-clamp: 3;  -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $dish->summary }}</p>

                                        <small class="firstsmall"><a class="bg-orange"
                                                href="{{ route('web.category', $dish->category->slug) }}"
                                                title="">{{ $dish->category->name }}</a></small>
                                        <small>{{ \Carbon\Carbon::parse($dish->created_at)->format('d-m-Y') }}</small>
                                        <small>{{ $dish->user->name }}</small>
                                        <small><i class="fa fa-eye"></i> {{ $dish->view_count }}</small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div>

                            <hr class="invis">
                        @endforeach
                    </div><!-- end page-wrapper -->

                    <hr class="invis">
                    {{ $new->links('pagination::bootstrap-4') }}
                </div><!-- end col -->

                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget">
                            <form class="input-group custom-search-form" method="get" action="{{ route('web.search') }}">
                                <input type="text" class="form-control" name="tukhoa" placeholder="Tìm kiếm...">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default" style="border-radius: 0 5px 5px 0">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Các bài viết nổi bật</h2>
                            <div class="trend-videos">
                                @foreach ($highlight as $item)
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="{{ route('web.dish', $item->slug) }}" title="">
                                                <img src="{{ $item->imageUrl() }}" alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span class="videohover"></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="{{ route('web.dish', $item->slug) }}"
                                                    title="">{{ $item->title }}</a></h4>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                    <hr class="invis">
                                @endforeach
                            </div><!-- end videos -->
                        </div><!-- end widget -->

                    </div><!-- end row -->
                </div><!-- end container -->
                <style>
                    .food {
                        color: #76a4bf;
                        font-size: 24px;
                    }
                </style>
    </section>
@endsection
