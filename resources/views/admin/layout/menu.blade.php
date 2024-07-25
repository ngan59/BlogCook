<ul class="nav" id="side-menu">
    {{-- <li class="sidebar-search">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /input-group -->
    </li> --}}
    <li>
        <a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
        {{-- <a href="#"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a> --}}

    </li>

    <li>
        <a href="#"><i class="fa fa-cube fa-fw"></i> Công thức món ăn<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.dish.index') }}">Danh sách công thức món ăn </a>
            </li>
            <li>
                <a href="{{ route('admin.dish.create') }}">Thêm công thức món ăn</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    <li>
        <a href="#"><i class="fa fa-tag fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.category.index') }}">Danh sách danh mục</a>
            </li>
            <li>
                <a href="{{ route('admin.category.create') }}">Thêm danh mục</a>
            </li>
        </ul>

        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-users fa-fw"></i> Quản lý người dùng<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.user.index') }}">Danh sách người dùng</a>
            </li>
            <li>
                <a href="{{ route('admin.user.create') }}">Thêm người dùng</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-sliders fa-fw"></i>Quản lý Slide<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.slide.index') }}">Danh sách Slide</a>
            </li>
            <li>
                <a href="{{ route('admin.slide.create') }}">Thêm Slide</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
        </li>
                        <li>
                        <a href="#"><i class="fa fa-comments fa-fw"></i> Quản lý bình luận<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('admin.comment.index') }}">Danh sách bình luận</a>
                                </li>
                                {{-- <li>
                                    <a href="#"></a>
                                </li> --}}
                            </ul>
        <!-- /.nav-second-level -->

    </li>
    <li>
        <a href="#"><i class="fa fa-tags fa-fw"></i> Quản lý danh mục báo cáo<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('admin.categoryreport.index') }}">Danh sách danh mục báo cáo</a>
                </li>
                <li>
                    <a href="{{ route('admin.categoryreport.create') }}">Thêm danh mục báo cáo</a>
                </li>
            </ul>
<!-- /.nav-second-level -->

</li>
    <li>
        <a href="#"><i class="fa fa-bug fa-fw"></i> Quản lý báo cáo<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.report.index') }}">Danh sách báo cáo</a>
            </li>
            {{-- <li>
                <a href="#">Thêm báo cáo</a>
            </li> --}}
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-gamepad fa-fw"></i> Danh mục sự kiện<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.categoryevent.index') }}">Danh sách danh mục sự kiện</a>
            </li>
            <li>
                <a href="{{ route('admin.categoryevent.create') }}">Thêm danh mục sự kiện</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-gift fa-fw"></i> Sự kiện<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.event.index') }}">Danh sách sự kiện</a>
            </li>
            <li>
                <a href="{{ route('admin.event.create') }}">Thêm sự kiện</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-user-secret fa-fw"></i> Người tham gia sự kiện<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.eventparticipants.index') }}">Danh sách người tham gia</a>
            </li>

        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="{{ route('admin.contact.index') }}"><i class="fa fa-phone fa-fw"></i> Liên hệ</a>

    </li>

</li>
<li>
    <a href="{{ route('web.home')}}"><i class="fa fa-arrow-right fa-fw"></i> Chuyển hướng đến Blog</a>

</li>
</ul>
