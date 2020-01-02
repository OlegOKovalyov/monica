jQuery(document).ready(function($){
    "use strict";
    function monica_check_post(){
        var a = jQuery('#monica_theme_media_post_format_settings,#monica_theme_quotes_post_format_settings,#monica_theme_gallery_post_format_settings,#monica_theme_link_post_format_settings');
        jQuery(a).hide();
        if(jQuery('#post-format-video, #post-format-audio').is(':checked')) {
            a.hide();
            jQuery('#monica_theme_media_post_format_settings').show();
        } else if(jQuery('#post-format-quote').is(':checked')) {
            a.hide();
            jQuery('#monica_theme_quotes_post_format_settings').show();
        } else if(jQuery('#post-format-link').is(':checked')) {
            a.hide();
            jQuery('#monica_theme_link_post_format_settings').show();
        } else if(jQuery('#post-format-gallery').is(':checked')) {
            a.hide();
            jQuery('#monica_theme_gallery_post_format_settings').show();
        } else {
            a.hide();
        }
    }
    jQuery('#post-formats-select').click(function() {
        monica_check_post();
    });
    monica_check_post();

    function monica_check_page(){
        var a = jQuery('#monica_portfolio_page,#monica_blog_page');
        jQuery( a ).hide();
        if(jQuery('#page_template').val() == 'page-blog.php') {
            a.hide();
            jQuery('#monica_blog_page').show();
        } else if(jQuery('#page_template').val() == 'page-portfolio.php') {
            a.hide();
            jQuery('#monica_portfolio_page').show();
        }
    }
    jQuery('#page_template').click(function() {
        monica_check_page();
    });
    monica_check_page();
});