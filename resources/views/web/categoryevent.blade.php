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
                                        <h4> <a href="{{ route('web.categoryevent.slug', $categoryevent->slug) }}" title=""> {{ $categoryevent->name }} </a></h4>
                                    @endforeach
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div><!-- end trend-videos -->
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col -->

            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    @if (session('success'))
                    <div class = "alert alert-success"> {{ session('success') }}</div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                    <div class="row d-flex flex-wrap">
                        @foreach ($events as $event)
                            <div class="col-md-12 mb-4">
                                <div class="blog-box flex-grow-1">

                                    <div class="post-media">
                                      <h4><a href="{{ route('web.event', $event->slug) }}" title="{{ $event->title }}"></a></h4>
                                        <img src="{{ $event->imageUrl() }}" alt="{{ $event->title }}" class="event-image">
                                        <div class="hovereffect"></div><!-- end hover -->
                                    </div><!-- end post-media -->
                                    <div class="blog-meta big-meta text-center">
                                        <span class="color-green">
                                            <a class="bg-orange" href="{{ route('web.categoryevent', $event->categoryEvent->slug) }}" title="{{ $event->categoryEvent->name }}">
                                                {{ $event->categoryEvent->name }}
                                            </a>
                                        </span>
                                        <h4>
                                            <a href="{{ route('web.event', $event->slug) }}" title="{{ $event->title }}">
                                                {{ $event->title }}
                                            </a>
                                        </h4>
                                        <small>Ngày bắt đầu: {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}</small>
                                        <small>Ngày kết thúc: {{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</small>
                                        <small><i class="fa fa-globe fa-fw"></i> {{ $event->location }}</small> 
                                        <i class="fa fa-users"></i> {{ $event->users->count() }}
                                      
                                        <div class="container">
                                            @csrf
                                            @if(\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($event->end_date)))
                                                <p class="text-danger">Sự kiện đã kết thúc</p>
                                            @else
                                                @if(Auth::check())
                                                    <button type="button" class="button btn btn-info btn-lg" data-toggle="modal" data-target="#registerModal{{ $event->id }}">Đăng kí tham gia sự kiện</button>
                                                @else
                                                    <button type="button" class="button btn btn-info btn-lg" onclick="window.location='{{ route('web.auth.login') }}'">Đăng kí tham gia sự kiện</button>
                                                @endif

                                                <!-- Modal -->
                                                @if(Auth::check())
                                                <div class="modal fade" id="registerModal{{ $event->id }}" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Đăng kí sự kiện</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có đồng ý đăng kí sự kiện này không?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('web.event.register') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                                    <button type="submit" class="btn btn-primary">Đồng ý</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endif
                                        </div><!-- end container -->
                                    </div><!-- end blog-meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col-md-4 -->
                        @endforeach
                    </div><!-- end row -->
                </div><!-- end page-wrapper -->
                <hr class="invis3">
                <div class="row">
                    <div class="col-md-12">
                        {{-- {!! $events->links('pagination::bootstrap-4') !!} --}}
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
