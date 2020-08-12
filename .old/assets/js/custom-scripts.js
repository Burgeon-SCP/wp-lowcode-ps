jQuery(document).ready(function($) {
	'use strict';

    /**
     * Image lightbox
     */
    $("a[rel^='projectPretty']").prettyPhoto({
        social_tools: false,
        deeplinking: false,
        theme:'pp_default'
    });
    
    /**
     * Wow
     */
    if( $('body').hasClass('page-template-template-home') ) {
        new WOW().init();
    }

    /**
	 * Main Slider
	 */
	$('.frontSlider').bxSlider({
		auto:true,
		speed:1000,
		pause:6500,
		controls:false,
		mode:'fade',
        pager:true
	});

	/**
	 * Main slider height
	 */
	if( $('body').hasClass('home') ){
        /*reduceHeight = 75 ;
        if( $('#wpadminbar').length ) {
          reduceHeight = 92;
        }*/
        if( $('.lc-front-slider-wrapper').length ) {
            $(window).resize(function() {
                var wHeight = ( $(window).height() );
                $('.lc-front-slider-wrapper').find( '.bx-viewport' ).height(wHeight);
                $('.single-slide-wrap').height(wHeight);
            }).resize();
        }
    }
    /**
	 * Service section
	 */
	$('.service-tab-content .tab-pane').hide();
	$('.service-nav-tab li').first().addClass('active');
	$('.service-tab-content .tab-pane').first().addClass('active');
	$('.service-tab-content .tab-pane').first().show();
	$('.service-nav-tab li a').on('click', function(){
		var tabId = $(this).attr('data-tab');
		$('.service-tab-content .tab-pane').hide();
		$('.service-tab-content .tab-pane').removeClass('active');
		$('.service-nav-tab li').removeClass('active');
		$(this).parent('li').addClass('active');
		$('#'+tabId).show();
        $('#'+tabId).addClass('animated slideInRight');
		$('#'+tabId).addClass('active');
        $('#section-services').resize();
	});
    
    /**
     * Testimonials Section
     */
    $('.testiSlider').bxSlider();

    /**
     * Fact Counter
     */
    $('.lc-fact-number').counterUp({
        delay: 20,
        time: 2000
    });


    /**
     * Portfolio Section
     */
    $('#psProjects').lightSlider({
    	item:5,
    	loop:true,
    	slideMove:1,
    	speed:600,
        enableDrag: false,
        slideMargin: 0,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1
                  }
            }
        ],
        onSliderLoad: function() {
           $('.featuredSlider').removeClass( 'cS-hidden' );
       	}
    });
    
});
