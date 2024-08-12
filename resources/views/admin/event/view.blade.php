@extends('admin.layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Chi tiết Thông Tin Sự Kiện
                        <small>{{ $event->name }}</small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chi Tiết Sự Kiện
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><strong>ID:</strong> {{ $event->id }}</p>
                                    <p><strong>Tiêu Đề:</strong> {{ $event->title }}</p>  
                                    <p><strong>Slug:</strong> {{ $event->slug }}</p>  
                                    <p><strong>Danh Mục:</strong> {{ $event->categoryevent->name }}</p>
                                    <p><strong>Ngày Bắt Đầu:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }}</p>
                                    <p><strong>Ngày Kết Thúc:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}</p>
                                    <p><strong>Nội Dung:</strong></p>
                                    <p>{!! $event->description !!}</p>  
                                </div>
                                <div class="col-lg-6">
                                    <p><strong>Hình Ảnh:</strong></p>
                                    <img src="{{ $event->imageUrl() }}" alt="{{ $event->title }}" class="img-responsive" style="max-width: 300px;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('admin.event.index') }}" class="btn btn-default">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
