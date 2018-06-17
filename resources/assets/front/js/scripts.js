/* ---------------------------------------------
 common scripts
 --------------------------------------------- */
;(function ($) {
    'use strict'; // use strict to start

    /* === Stickit === */

    (function () {
        $("[data-sticky_column]").stickit({
            scope: StickScope.Parent,
            top: 0
        });
    }());


    /*=== single blog carousel =====*/
    (function () {
        $('.items').owlCarousel({
            items: 3,
            autoPlay: true,
            pagination: false
        });
    }());

    /* === Instagram Widget === */

    (function () {
        $('#widget-feature').owlCarousel({
            singleItem: true,
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            autoPlay: true,
            pagination: false
        });
    }());

    /* === Back To Top === */

    (function () {
        $(' a.back-to-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    }());


    /* === Footer Instagram === */

    (function () {
        $('#footer-instagram').owlCarousel({
            items: 8,
            navigation: false,
            autoPlay: false,
            pagination: false
        });
    }());
    /* === Search === */

    (function () {
        $('.top-search a').on('click', function (e) {
            e.preventDefault();
            $('.show-search').slideToggle('fast');
            $('.top-search a').toggleClass('sactive');
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // реализую функционал ТП
        var imagePathSrc = $('#image_path_src');
        var imagePathHref = $('#image_path_href');
        var productImagePath = imagePathSrc.data('src');

        $('.related li').click(function () {
            var id = $(this).data('id');
            var slug = $('.related').data('slug')
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: '/catalog/offers-ajax',
                data: {
                    '_token': token,
                    'id': id
                },
                success: function (data) {

                    for (var key in data) {
                        var selector = $('#' + key);
                        if (selector.length) {
                            selector.html(data[key]);
                        }
                        if (key == 'id') {
                            $('#related_id').attr('value', data[key]);
                        }
                        if (key == 'values') {
                            var string = '';
                            for (var ki in data[key]) {
                                string += '<tr>';
                                string += '<td>' + ki + '</td><td>' + data[key][ki] + '</td>';
                                string += '</tr>';
                            }
                            $('#related_offers').html(string);
                        }

                        if (key == 'imagePath') {
                            imagePathSrc.prop('src', data[key]);
                            imagePathHref.prop('href', data[key]);
                        }
                        if (productImagePath != imagePathSrc.prop('src') && !data['imagePath']) {

                            imagePathSrc.prop('src', productImagePath);
                            imagePathHref.prop('href', productImagePath);

                        }
                    }
                }
            })

        })

    }());


})(jQuery);



