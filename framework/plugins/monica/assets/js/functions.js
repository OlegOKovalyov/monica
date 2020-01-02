jQuery(document).ready(function($){

    /***********************************************
     * INIT
     ***********************************************/

    "use strict";
    var isMobile = false;
    if( /android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()) ) { isMobile = true; }


    /***********************************************
     * SITE MENU
     ***********************************************/

    jQuery('ul.sf-menu').superfish({
        animation:      {height:'show'},
        animationOut:   {height:'hide'},
        speed:          'fast',
        speedOut:       'fast',
        delay:          100,
        pathClass:      'current'
    });
    jQuery('ul.sf-menu li a').each(function(){
        jQuery( this ).hover( function() {
            jQuery('ul.sf-menu li a').addClass( 'deactive' );
            jQuery( this ).addClass( 'active' );
        }, function() {
            jQuery('ul.sf-menu li a').removeClass( 'deactive' );
            jQuery( this ).removeClass( 'active' );
        });
    });

    // Mobile Menus
    var navlist = jQuery('ul.sf-menu').clone();
    var submenu = '<span class="submenu"><i class="fa fa-angle-down"></i></span>';
    navlist.removeClass().addClass('mobile-menu');
    navlist.find('ul').removeAttr('style');
    navlist.find('li:has(> ul) > a').after(submenu);;
    navlist.find('.submenu').toggle(function() {
        jQuery(this).parent().addClass('over').find('>ul').slideDown(200);
    }, function() {
        jQuery(this).parent().removeClass('over').find('>ul').slideUp(200);
    });
    jQuery('.sb-slidebar .dl-trigger').after(navlist[0]);

    jQuery('.header-search-form .search a').on('click', function(e) {
        jQuery('.site-header').toggleClass("search-open"); //you can list several class names
        e.preventDefault();
    });

    /***********************************************
     * PARALLAX
     ***********************************************/
    function monica_skroll() {
        if( !isMobile ) {
            // Set parallax background
            jQuery( '.parallax' ).each(function() {
                jQuery(this).attr({
                    'data-bottom-top'   :   'transform:translate3d(0, -5%, 0)',
                    'data-top-bottom'   :   'transform:translate3d(0, 5%, 0)'
                });
            });

            // Set parallax text
            jQuery( '.parallax-text' ).each(function() {
                jQuery(this).attr({
                    'data-top'          :   'opacity: 1;transform:translate3d(0, 0%, 0)',
                    'data-top-bottom'   :   'opacity: .25;transform:translate3d(0, 50%,0)'
                });
            });

            // Main image parallax .featured-image
            jQuery( '.featured-image > img' ).attr({
                'data-top'          :   'transform:translate3d(0, 0%, 0)',
                'data-top-bottom'   :   'transform:translate3d(0, 30%,0)'
            });

            // Init skrollr
            skrollr.init({
                forceHeight: false
            });
        };

        // Section
        jQuery('.section').each(function(){
            var bg = jQuery(this);

            if(bg.data('bg')){
                bg.css('background-image','url('+bg.data('bg')+')');
            }
            if(bg.data('bgcolor')){
                bg.css('background-color',bg.data('bgcolor'));
            }
            if(bg.data('bgmark')){
                bg.append('<div class="section-bgwrap" />');
                bg.find('.section-bgwrap').css('background-color',bg.data('bgmark'));
            }

            bg.css('width',bg.data('width'));
            bg.css('min-height',bg.data('minheight'));
            bg.css('margin',bg.data('margin'));
            bg.css('padding',bg.data('padding'));
        });

        jQuery('.loader').css('opacity', 0);
            setTimeout(function() {
                jQuery('.loader').hide();
                jQuery('body').addClass('loaded')
        }, 600);

        // Masonry
        if ($.isFunction(  $.fn.masonry )) {
            jQuery('.row.layout-masonry').masonry({
                itemSelector: '.column'
            });
            jQuery('.image-masonry').masonry({
                itemSelector: '.masonry-item'
            });
            jQuery('.portfolio-masonry').masonry({
                itemSelector: '.isotope-item'
            });
        }

        // Match Height
        jQuery('.match-height, .layout-medium').each(function(){
            jQuery(this).find('.math, .column').matchHeight({
                byRow: true,
            });
        });
        jQuery('.vmh').each(function(){
            jQuery(this).find('.wpb_column').matchHeight({
                byRow: true,
            });
        });

        jQuery('.background-image.parallax').each(function(){
            var a = jQuery(this).find('img').prop('src');
            jQuery(this).css('background-image','url('+a+')');
        });
    }

    $.slidebars();

    jQuery(window).load(function(){
        var resizeTimer;
        jQuery(window).resize(function() {
          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(monica_skroll, 0);
        }).resize();
    });

    // Testimonials
    jQuery('.testimonial-slider').slick({
        infinite: true,
        adaptiveHeight: true,
        prevArrow: '<span class="prev"><i class="ti-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="ti-angle-right"></i></span>',
    });

    // Slider
    jQuery('.image-slider').slick({
        infinite: true,
        adaptiveHeight: true,
        prevArrow: '<span class="prev"><i class="ti-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="ti-angle-right"></i></span>',
    });

    // Slider
    jQuery('.slider').each(function(){
        var a = jQuery( this ).data( 'column' ),
            b = jQuery( this ).data( 'sts '),
            c = ( a != '') ? a : 3,
            d = ( b != '') ? b : 1;

        jQuery( this ).slick({
            infinite: true,
            slidesToShow: c,
            slidesToScroll: d,
            prevArrow: '<span class="prev"><i class="ti-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="ti-angle-right"></i></span>',
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
        });
    });

});