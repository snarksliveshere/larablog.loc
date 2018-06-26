<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="/temp/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/temp/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/temp/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/temp/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/temp/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="/temp/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/temp/vendor/MagnificPopup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="/temp/css/util.css">
    <link rel="stylesheet" type="text/css" href="/temp/css/main.css">
</head>
<body class="@yield('body_class')">
{{--@include('partitials.top_nav')--}}
@include('partitials.header')
@yield('main_slider')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-info">

                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>


@yield('content')

@include('partitials.footer')

<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<script src="/temp/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="/temp/vendor/animsition/js/animsition.min.js"></script>
<script src="/temp/vendor/bootstrap/js/popper.js"></script>
<script src="/temp/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="/temp/vendor/slick/slick.min.js"></script>
<script src="/temp/js/slick-custom.js"></script>
<script src="/temp/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<script src="/temp/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function () { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
@yield('scripts-inc')
<script src="/temp/js/main.js"></script>
</body>
</html>