<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="/css/front.css">
</head>
<body class="@yield('body_class')">
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
<script src="/js/front.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
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
<script src="/js/main.js"></script>
@yield('scripts-inc')
</body>
</html>