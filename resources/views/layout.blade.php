<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="temp/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="temp/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="temp/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="temp/fonts/linearicons-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="temp/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="temp/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="temp/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="temp/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="temp/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="temp/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="temp/vendor/MagnificPopup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="temp/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="temp/css/util.css">
    <link rel="stylesheet" type="text/css" href="temp/css/main.css">
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

<script src="/temp/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="/temp/vendor/animsition/js/animsition.min.js"></script>
<script src="/temp/vendor/bootstrap/js/popper.js"></script>
<script src="/temp/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/temp/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function () {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<script src="/temp/vendor/daterangepicker/moment.min.js"></script>
<script src="/temp/vendor/daterangepicker/daterangepicker.js"></script>
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
<script src="/temp/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="/temp/vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2').on('click', function (e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function () {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function () {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function () {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>
<script src="/temp/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function () {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function () {
            ps.update();
        })
    });
</script>
<script src="/temp/js/main.js"></script>
</body>
</html>