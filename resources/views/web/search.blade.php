@extends('web.layout.master')

@section('content')
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="page-wrapper ">
                    <div class="blog-top clearfix">
                        <h4 class="search-title">Từ khóa tìm kiếm: {{$tukhoa}} <a href="#"></a></h4>
                    </div><!-- end blog-top -->
                    @foreach ($dish as $item)
                        <div class="blog-list clearfix">
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="{{ route('web.dish', $item->slug) }}" title="">
                                            <img src="{{ $item->imageUrl() }}" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->
                                <div class="blog-meta big-meta col-md-8">
                                    <h4 style="margin-left: 0px !important; padding: 12px 0px !important;"><a href="{{ route('web.dish', $item->slug) }}" title="">{{ $item->title }}</a></h4>
                                    <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">{{ $item->summary }}</p>
                                    <small class="firstsmall"><a class="bg-orange" href="{{ route('web.category', $item->category->slug) }}" title="">{{ $item->category->name }}</a></small>
                                    <small>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</small>
                                    <small>{{ $item->user->name }}</small>
                                    <small><i class="fa fa-eye"></i> {{ $item->view_count }}</small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div>
                        <hr class="invis">
                    @endforeach
                </div><!-- end page-wrapper -->
                <hr class="invis">
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
