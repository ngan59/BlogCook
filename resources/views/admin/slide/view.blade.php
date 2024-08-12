@extends('admin.layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Chi tiết Slide
                        <small>{{ $slide->name }}</small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chi Tiết Slide
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><strong>ID:</strong> {{ $slide->id }}</p>
                                    <p><strong>Tiêu đề Slide:</strong> {{ $slide->name }}</p>  
                                    <p><strong>Nội Dung Slide:</strong></p>
                                    <p>{!! $slide->description !!}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><strong>Hình Ảnh:</strong></p>
                                    <img src="{{ $slide->imageUrl() }}" alt="{{ $slide->title }}" class="img-responsive" style="max-width: 300px;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('admin.slide.edit', $slide->id) }}" class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('admin.slide.index') }}" class="btn btn-default">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
