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
            jQuery('#post-content .gallery').masonry({
                itemSelector: '.gallery-item'
            });
        }

        jQuery('#post-content .gallery a[href$=".jpg"],#post-content .gallery a[href$=".JPG"],#post-content .gallery a[href$=".PNG"],#post-content .gallery a[href$=".pnh"]#post-content .gallery a[href$=".jpeg"],#post-content .gallery a[href$=".JPEG"]').fancybox({});
        jQuery('#post-content .gallery a').attr('rel','gallery');

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

    jQuery('.extra-menu nav .search a').click(function () {
        jQuery('.header-search-form').toggleClass('visible');
    });
    var project_slogan = jQuery('.project_slogan').remove().clone();
    jQuery('#our_projects .row.masonry > .column:first-child').after(project_slogan);


    jQuery('div#next-section .divider-icon span').click(function () {
        var parent_section = jQuery(this).closest('#next-section');
        var nextSection = parent_section.next();
        console.log(nextSection.offset()['top']);;
        $('html, body').animate({scrollTop: nextSection.offset()['top']+'px'},600);
    });

    $('#news_slider').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        nav: true,
    });

    jQuery('.resume-wrap form i.close-form').click(function (e) {
        e.preventDefault();
        jQuery('.resume-wrap').removeClass('active');
        jQuery('body').removeClass('form_active');
    })
    jQuery('#send_resume').click(function (e) {
        e.preventDefault();
        jQuery('.resume-wrap').addClass('active');
        jQuery('body').addClass('form_active');
        jQuery('#resume-form .overlay_massage').remove();
    })

    $(document).on('click','.file_wrap span.fa', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        jQuery('#file').val('');
        jQuery('.res_chose_file').text(jQuery('.res_chose_file').attr('data-placeholder'));
        jQuery(this).remove();
        return false;
    });

    $('.res_chose_file').click(function () {
        $('#file').click();
    });

    $('#file').change(function (e) {
        validateFile(e.target.files[0]);
    });

    function validateFile(file) {
        var button = $('.res_chose_file');
        $('.file_wrap .error_validation').remove();

        if (file) {
            var fileTypeArr = ['application/msword', 'application/vnd.ms-excel', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.documen'];
            if (file.size < 20000000) {
                button.text(file.name);
                if (jQuery('.file_wrap span.fa').length == 0) {
                    jQuery('<span class="fa fa-close">').insertAfter(button);
                }
                $('.file_wrap .error_validation').remove();
            } else {

                switch (jQuery('html').attr('lang')) {
                    case 'ru-RU':
                    var message = 'Файл должен быть меньше 20Мб';
                    break;

                    case 'en-US':
                    var message = 'The file must be less than 20MB';
                    break;

                    default:
                    var message = 'Файл повинен бути менше 20Мб';
                }

                jQuery('<div class="error_validation text_r">'+message+'</div>').insertAfter('#file')
                return false;
            }
            if (fileTypeArr.indexOf(file.type) == -1 ) {
                switch (jQuery('html').attr('lang')) {
                    case 'ru-RU':
                    var message = 'Неправильный тип файла';
                    break;

                    case 'en-US':
                    var message = 'Invalid file type';
                    break;

                    default:
                    var message = 'Неправильний тип файлу';
                }

                jQuery('<div class="error_validation text_r">'+message+'</div>').insertAfter('#file')
                return false;
            }
        }
        return true;
    }

    
    // reCAPTCHA AJAX validation
    jQuery('#resume-form').submit(function (e) {
        e.preventDefault();
        var that = $(this)
        //var response = grecaptcha.getResponse(document.getElementById('g-recaptcha'));
        var response = grecaptcha.getResponse();

        jQuery('.recaptcha_wrap .error_validation').remove();

        if (response == '') {
            switch (jQuery('html').attr('lang')) {
                case 'ru-RU':
                var message = 'Пройдите валидацию';
                break;

                case 'en-US':
                var message = 'Please validate';
                break;

                default:
                var message = 'Пройдіть валідацію';
            }
            
            jQuery('<div class="error_validation">'+message+'</div>').insertAfter('#g-recaptcha')
            return false;
        } else {
            jQuery('.recaptcha_wrap .error_validation').remove();
        }

        var file = jQuery('#file').get(0).files[0]

        if (file) {
            var vaildate = validateFile(file);

            if (!vaildate) {
                return false;
            }
        }

        $(this).append('<div class="overlay_massage waiting"><i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i></div>');
        //var data = $(this).serialize();
        $.ajax({
          'type': "POST",
          'url': $(this).attr('action'),
          //'data': data+"&image="+data_image,
          'data': new FormData(this),
          cache: false,
          processData: false, // Не обрабатываем файлы (Don't process the files)
          contentType: false,
          'success': function (respond, textStatus, jqXHR) {
            $('.overlay_massage.waiting').fadeOut(0);
            that.append('<div class="overlay_massage"><div class="respond_message"><i class="fa fa-3x fa-thumbs-o-up"></i></div></div>');
            if( typeof respond.error === 'mail sended' ){
            }
            else{
                console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
            }
          },
          'error': function (respond) {
            $('.overlay_massage.waiting').fadeOut(0);
            that.append('<div class="overlay_massage"><div class="respond_message"><i class="fa fa-3x fa-thumbs-o-down"></i></div></div>');
            console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
          },
        });
    });


    

});