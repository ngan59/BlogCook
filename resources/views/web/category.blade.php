@extends('web.layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <h2 class="widget-title">
                                <div class="trend-videos">
                                    <div class="blog-box">

                                        <div class="blog-meta">
                                            @foreach ($categories as $category)
                                                <h4><a href="{{ route('web.category', $category->slug) }}"
                                                        title="">{{ $category->name }}</a></h4>
                                            @endforeach
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end videos -->
                        </div><!-- end widget -->


                    </div><!-- end sidebar -->
                </div><!-- end col -->

                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-grid-system">
                            <div class="row">
                                @forelse ($dishs as $dish)
                                    <div class="col-md-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="{{route('web.dish', $dish->slug) }}" title="">
                                                    <img src="{{ $dish->imageUrl() }}" alt=""  class="img-fluid">
                                                    <div class="hovereffect">
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                    <span class="color-orange"><a class="bg-orange" href="{{ route('web.category',$dish->category->slug)}}" title="" >{{ $dish->category->name }}</a></span>
                                                    <h4><a href="{{ route('web.dish', $dish->slug) }}" title="">{{ $dish->title }}</a></h4>
                                                    {{-- <p>{!! $dish->description !!}</p> --}}
                                                    <small>{{ \Carbon\Carbon::parse($dish->created_at)->format('d-m-Y') }}</small>
                                                    <small>{{ $dish->user->name }}</small>
                                                    <small><i class="fa fa-eye"></i> {{ $dish->view_count }}</small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    @empty
                                    <div class="col-md-12 text-center">
                                        <p>Hiện tại không có bài viết nào trong danh mục này.</p>
                                    </div><!-- end col -->
                                @endforelse
                                    
                            </div><!-- end row -->
                        </div><!-- end blog-grid-system -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis3">

                    <div class="row">
                        <div class="col-md-12">
                            {!!$dishs ->links('pagination::bootstrap-4') !!}
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    {{-- style="width:100%; height:200px; object-fit: cover;  display: block;" --}}
@endsection
