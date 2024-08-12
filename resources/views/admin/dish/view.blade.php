@extends('admin.layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Công Thức Món Ăn
                        <small>{{ $dish->title }}</small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chi Tiết Công Thức
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><strong>ID:</strong> {{ $dish->id }}</p>
                                    <p><strong>Tiêu Đề:</strong> {{ $dish->title }}</p>
                                    <p><strong>Slug:</strong> {{ $dish->slug }}</p>
                                    <p><strong>Danh Mục:</strong> {{ $dish->category->name }}</p>
                                    <p><strong>Tóm Tắt:</strong> {{ $dish->summary }}</p>
                                    <p><strong>Trạng Thái:</strong>
                                        @if ($dish->status == 1)
                                            <span class="label label-success">Đã Duyệt</span>
                                        @else
                                            <span class="label label-danger">Chưa Duyệt</span>
                                        @endif
                                    </p>
                                    <p><strong>Bài Viết Mới:</strong>
                                        @if ($dish->new_post)
                                            <span class="label label-info">Có</span>
                                        @else
                                            <span class="label label-default">Không</span>
                                        @endif
                                    </p>
                                    <p><strong>Bài Viết Nổi Bật:</strong>
                                        @if ($dish->highlight_post)
                                            <span class="label label-warning">Có</span>
                                        @else
                                            <span class="label label-default">Không</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><strong>Hình Ảnh:</strong></p>
                                    <img src="{{ $dish->imageUrl() }}" alt="{{ $dish->title }}" class="img-responsive"
                                        style="max-width: 300px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p><strong>Nội Dung:</strong></p>
                                    <p>{!! $dish->description !!}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('admin.dish.edit', $dish->id) }}" class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('admin.dish.index') }}" class="btn btn-default">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
