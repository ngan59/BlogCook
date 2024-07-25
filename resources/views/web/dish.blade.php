@extends('web.layout.master')

@section('content')
    <section class="section single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">
                            @if (session('success'))
                                <div class = "alert alert-success"> {{ session('success') }}</div>
                            @endif
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/category">Blog</a></li>
                                <li class="breadcrumb-item active">{{ $dish->title }}</li>
                            </ol>

                            <span class="color-orange">
                                <a href="{{ route('web.category', $dish->category->slug) }}" title="">
                                    {{ $dish->category->name }}
                                </a>
                            </span>

                            <h3>{{ $dish->title }}</h3>

                            <div class="blog-meta big-meta">
                                <small>{{ \Carbon\Carbon::parse($dish->created_at)->format('d-m-Y') }}</small>
                                <small>{{ $dish->user->name }}</small>
                                <small><i class="fa fa-eye"></i> {{ $dish->view_count }}</small>
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="fb-button btn btn-primary">
                                            <i class="fa fa-facebook"></i>
                                            <span class="down-mobile"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="tw-button btn btn-primary">
                                            <i class="fa fa-twitter"></i>
                                            <span class="down-mobile"></span>
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

                        {{-- Bao cao --}}
                        @if (Illuminate\Support\Facades\Auth::check())
                            <div class="container">
                                <button type="button" class="baocao" class="btn btn-info btn-lg" data-toggle="modal"
                                    data-target="#myModal">Báo cáo công thức</button>

                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Báo cáo công thức</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="reportForm" action="{{ route('report.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_dish" value="{{ $dish->id }}">
                                                    <input type="hidden" name="id_comment"
                                                        value="{{ $comment->id ?? '' }}">
                                                    <div class="form-group">
                                                        <label for="reportReason">Lý do báo cáo:</label>
                                                        <select class="form-control" id="reportReason" name="reason"
                                                            required>
                                                            <option value="" disabled selected>Chọn lý do</option>
                                                            @foreach ($reasons as $reason)
                                                                <option value="{{ $reason->id }}">{{ $reason->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Gửi báo cáo</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <br>
                        {{--                                                 
                        <div class="form-group">
                            <label for="reporterEmail">Email của bạn:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $userEmail }}" readonly>
                        </div> --}}
                        <div class="single-post-media">
                            <img src="{{ $dish->imageUrl() }}" alt="" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">
                            <div class="pp">
                                <p>{{ $dish->summary }}</p>
                                <p>{!! $dish->description !!}</p>
                            </div><!-- end pp -->
                        </div><!-- end content -->

                        <div class="blog-title-area">
                            {{-- <div class="tag-cloud-single">
                            <span>Tags</span>
                            <small><a href="#" title="">lifestyle</a></small>
                            <small><a href="#" title="">colorful</a></small>
                            <small><a href="#" title="">trending</a></small>
                            <small><a href="#" title="">another tag</a></small>
                        </div><!-- end meta --> --}}
                        </div><!-- end title -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">Bạn cũng có thể thích</h4>
                            <div class="row">
                                @foreach ($relate as $item)
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="{{ route('web.dish', $item->slug) }}" title="">
                                                    <img src="{{ $item->imageUrl() }}" alt="" class="event-image">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="{{ route('web.dish', $item->slug) }}"
                                                        title="">{{ $item->title }}</a></h4>
                                                <small>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</small>
                                                <small>{{ $item->user->name }}</small>
                                                <small><i class="fa fa-eye"></i> {{ $item->view_counts }}</small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                @endforeach
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">{{ $dish->comments()->count() }} Bình luận</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comments-list">
                                        @foreach ($dish->comments as $comments)
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">{{ $comments->user->name }}
                                                        <small>{{ \Carbon\Carbon::parse($comments->created_at)->format('d-m-Y') }}</small>
                                                    </h4>
                                                    <p>{{ $comments->comment_description }}</p>
                                                    <div class="rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $comments->rating)
                                                                <span class="selected">&#9733;</span>
                                                            @else
                                                                <span>&#9734;</span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        @if (Illuminate\Support\Facades\Auth::check())
                            <div class="custombox clearfix">
                                <h4 class="small-title">Viết bình luận tại đây</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper" method="post"
                                            action="{{ route('web.dish.comment', $dish->id) }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="rating">Đánh giá</label>
                                                <div class="rating" id="rating"
                                                    style="cursor: pointer; font-size: 30px;">
                                                    <span data-value="1">&#9734;</span>
                                                    <span data-value="2">&#9734;</span>
                                                    <span data-value="3">&#9734;</span>
                                                    <span data-value="4">&#9734;</span>
                                                    <span data-value="5">&#9734;</span>
                                                </div>
                                                <input type="hidden" name="rating" id="rating-value" value="0">
                                                @error('rating')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <textarea class="form-control" name="comment_description" placeholder="Bình luận của bạn"></textarea>
                                                @error('comment_description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            
                            <h2 class="widget-title">Bài viết nổi bật</h2>
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
                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    @yield('script')
@endsection
