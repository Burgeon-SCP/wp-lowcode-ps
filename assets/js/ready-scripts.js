jQuery(document).ready(function($) {
    'use strict';

    /**
     * Parallax menu
     */
    $(window).load(function() {
        if ($('body').hasClass('header-sticky')) {
            var headerHeight = $('.lc-header-wrapper').outerHeight();
        } else {
            var headerHeight = 3;
        }
        $('.page-template-template-home .parallax-menu').onePageNav({
            currentClass: 'current',
            changeHash: false,
            scrollSpeed: 2200,
            scrollOffset: headerHeight,
            scrollThreshold: 0.5
        });
    });

    /**
     * Search icon at primary menu
     */
    $('.lc-search-icon').click(function() {
        $('.lc-head-search').find('.search-form').toggleClass('active-form');
        $('.lc-head-search').find('.search-form').fadeToggle();
    });

    /**
     * Map section
     */
    $('.lc-mag-caption').on('click', function() {
        $(this).toggleClass('active');
        $('.lc-map-frame').toggleClass('active');
        $('.lc-map-frame').fadeToggle();
    });

    /**
     * Nav toggle
     */
    $('.nav-toggle').click(function() {
        $('.nav-wrapper .menu').slideToggle('slow');
        $(this).parent('.nav-wrapper').toggleClass('active');
    });

    $('.nav-wrapper .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');
    $('.nav-wrapper .page_item_has_children').append('<span class="sub-toggle-children"> <i class="fa fa-angle-right"></i> </span>');

    $('.nav-wrapper .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });

    $('.nav-wrapper .sub-toggle-children').click(function() {
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });


    /**
     *Top up arrow
     */
    $("#scroll-up").hide();
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 800) {
                $('#scroll-up').fadeIn();
            } else {
                $('#scroll-up').fadeOut();
            }
        });
        $('a#scroll-up').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    /**
     *  Slider class
     */
    $(function() {
        // Configuration copied from responsive example class
        // https://kenwheeler.github.io/slick/
        $('.lc-slider').slick({
            autoplay: true,
            autoplaySpeed: 1500,
            centerMode: true,
            centerPadding: '10%',
            dots: false,
            infinite: true,
            nextArrow: '<button type="button" class="slick-prev">>></button>',
            prevArrow: '<button type="button" class="slick-next"><<</button>',
            speed: 450,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
});
