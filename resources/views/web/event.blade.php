@extends('web.layout.master')

@section('content')
<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/categoryevent">Event</a></li>
                            <li class="breadcrumb-item active">{{ $event->title }}</li>
                        </ol>

                        <span class="color-orange">
                            <a href="{{ route('web.categoryevent', $event->categoryEvent->slug) }}" title="">
                                {{ $event->categoryEvent->name }}
                            </a>
                        </span>

                        <h3>{{ $event->title }}</h3>

                        <div class="blog-meta big-meta">
                            <small>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}</small>
                            {{-- <small>{{ $event->user->name }}</small> --}}
                            <small><i class="fa fa-users"></i> {{ $event->users->count() }}</small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="fb-button btn btn-primary">
                                        <i class="fa fa-facebook"></i>
                                        <span class="down-mobile">Share on Facebook</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#" class="gp-button btn btn-primary">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li> --}}
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <img src="{{ $event->imageUrl() }}" alt="" class="img-fluid">
                    </div><!-- end media -->

                    <div class="blog-content">
                        <div class="pp">
                            {{-- <p>{{ $event->summary }}</p> --}}
                            <p>{!! $event->description !!}</p>
                        </div><!-- end pp -->
                    </div><!-- end content -->
                    {{-- <div class="w3-container">        
                        <p><button class="w3-button w3-block w3-teal">Đăng kí sự kiện</button></p>
                                         
                        </div> --}}

                    <hr class="invis1">


                    <hr class="invis1">


                    <hr class="invis1">


                </div><!-- end page-wrapper -->
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
