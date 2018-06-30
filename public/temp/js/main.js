
(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }
    

    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });
                
        }
    });






    /*==================================================================
    [ +/- num product ]*/
    $('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 0) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });


    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });

    $(".fancybox").fancybox({
        buttons: ['close']
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
    var originalContent = $('.original_content').html();
    var originalDescription = $('.original_description').html();
    $('.related li').eq(0).addClass('active');
    $('.related li').click(function () {
        var id = $(this).data('id');
        var slug = $('.related').data('slug')
        var token = $('meta[name="csrf-token"]').attr('content');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
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
                    if(!data['content']){
                        $('#content').html(originalContent);
                    }
                    if(!data['description']){
                        $('#description').html(originalDescription);
                    }
                }
            }
        })

    })


})(jQuery);