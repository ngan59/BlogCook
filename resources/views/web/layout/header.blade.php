<header class="tech-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="/web/images/version/cook-logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/category">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoryevent">Event</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/web/tech-category-03.html">Reviews</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact Us</a>
                    </li>
                </ul>

                {{-- @if (Illuminate\Support\Facades\Auth::check())
                <a class="btn custom-btn-primary mr-2" href="#">Đăng Bài Viết</a>
                @endif

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle custom-dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item" href="#">Đăng nhập</a>
                        <a class="dropdown-item" href="#">Đăng kí</a>

                        @if (Illuminate\Support\Facades\Auth::check())
                            <a class="dropdown-item" href="#">Đăng xuất</a>
                        @endif

                    </div>
                </div>
                
                <ul class="navbar-nav mr-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-android"> Đăng kí</i></a>
                        </li>
                        @if (Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-apple">Đăng xuất</i></a>
                        </li>
                        @endif
                    </ul> --}}

                {{-- Check if user is authenticated --}}
                @if (Illuminate\Support\Facades\Auth::check())
                {{-- Dropdown menu for authenticated users --}}
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle custom-dropdown-toggle" type="button"-
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> 
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('web.profile.index')}}">Thông tin người dùng</a>
                        <a class="dropdown-item" href="{{ route('manage.index') }}">Quản lý bài viết</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('web.auth.logout')}}">Đăng xuất</a>
                    </div>
                </div>
            @else
                {{-- Dropdown menu for guests --}}
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle custom-dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <span class="bold">Đăng nhập</span> / <span class="bold">Đăng kí</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item bold" href="/login">Đăng nhập</a>
                        <a class="dropdown-item bold" href="/register">Đăng kí</a>
                    </div>
                </div>
                @endif

                @if (Illuminate\Support\Facades\Auth::check())
                <a class="btn custom-btn-primary ml-2" href="{{ route('recipes.create') }}">Đăng Bài Viết</a>
                @endif
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
</div>
</nav>
</div><!-- end container-fluid -->
</header><!-- end market-header -->
