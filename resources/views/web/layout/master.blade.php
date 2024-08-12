<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Cooking Tutorial Blog</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<meta name="robots" content="INDEX,FOLLOW">
<link rel="canonical" href="{{ url()->current() }}">
<link rel="icon" type="image/x-icon" href=""/>

 {{-- <meta property="og:image" content="{{ asset('public/image/dish/' . $dish->image) }}"/>
<meta property="og:site_name" content="Cooking Tutorial Blog">
<meta property="og:title" content="{{ $dish->title }}"/>
<meta property="og:url" content="http://127.0.0.1:8000/public/image/dish/0Ml04_sandwish.jpg"/>
<meta property="og:type" content="article"/> --}}


@include('web.layout.style')

@stack('styles')
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tự động ẩn thông báo sau 5 giây
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = "opacity 0.5s ease-out";
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500); // Loại bỏ hoàn toàn khỏi DOM sau khi hiệu ứng mờ kết thúc
            });
        }, 5000);
    });
</script> --}}

</head>
<body>

<div id="wrapper">
    @include('web.layout.header')

    @yield('content')

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-fw<"></i></button>       
    @include('web.layout.footer')

</div><!-- end wrapper -->

@include('web.layout.script')
@stack('scripts')
</body>
</html>