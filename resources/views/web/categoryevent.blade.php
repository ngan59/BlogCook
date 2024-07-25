@extends('web.layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <h2 class="widget-title"></h2>
                            <div class="trend-videos">
                                <div class="blog-box">
                                    <div class="blog-meta">
                                        @foreach ($categoriesEvent as $categoryevent)
                                            <h4>
                                                <a href="{{ route('web.categoryevent', $categoryevent->slug) }}"
                                                    title="{{ $categoryevent->name }}">
                                                    {{ $categoryevent->name }}
                                                </a>
                                            </h4>
                                        @endforeach
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end trend-videos -->
                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col -->

                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        {{-- <h2 class="widget-title text-center mb-4">Các sự kiện đang diễn ra</h2>  --}}
                        <div class="row d-flex flex-wrap">
                            @foreach ($events as $event)
                                <div class="col-md-12 mb-4">
                                    <div class="blog-box flex-grow-1">
                                        <div class="post-media">
                                           <h4><a href="{{ route('web.event', $event->slug) }}" title="{{ $event->title }}  "></h4> 
                                                
                                                <img src="{{ $event->imageUrl() }}" alt="{{ $event->title }}" class="event-image">

                                                <div class="hovereffect"></div><!-- end hover -->
                                            </a>
                                        </div><!-- end post-media -->
                                        <div class="blog-meta big-meta text-center ">
                                            <span class="color-orange">
                                                <a class="bg-orange" href="{{ route('web.categoryevent', $event->categoryEvent->slug) }}" title="{{ $event->categoryEvent->name }}">
                                                    {{ $event->categoryEvent->name }}
                                                </a>
                                            </span>
                                            <h4>
                                                <a href="{{ route('web.event', $event->slug) }}"
                                                    title="{{ $event->title }}">
                                                    {{ $event->title }}
                                                </a>
                                            </h4>
                                            <small>{{ \Carbon\Carbon::parse($event->created_at)->format('d-m-Y') }}</small>
                                            <i class="fa fa-users"></i>

                                            {{-- Button for Event Registration --}}
                                            <div class="container "  method="post">
                                                @csrf
                                            <button type="button"  class="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#registerModal{{ $event->id }}">Đăng kí</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="registerModal{{ $event->id }}" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Đăng kí sự kiện</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('web.event.register') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                                    <div class="form-group">
                                                                        <label for="name"><b>Tên người dùng</b></label>
                                                                        <input type="text" class="form-control" placeholder="Nhập tên của bạn" name="name" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email"><b>Email</b></label>
                                                                        <input type="email" class="form-control" placeholder="Nhập email của bạn" name="email" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Đăng kí</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div><!-- end blog-meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col-md-4 -->
                            @endforeach
                        </div><!-- end row -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis3">

                    <div class="row">
                        <div class="col-md-12">
                            {{-- {!!$dishs ->links('pagination::bootstrap-4') !!} --}}
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
   
@endsection