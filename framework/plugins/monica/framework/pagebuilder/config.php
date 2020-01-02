<?php
// Visual Composer Settings
add_action( 'vc_before_init', 'monica_vcSetAsTheme' );
function monica_vcSetAsTheme() {
    vc_set_as_theme(true);
}
vc_set_default_editor_post_types( array( 'page', 'portfolio' ) );

function monica_vc_remove_woocommerce() {
    vc_remove_element('woocommerce_my_account');
    vc_remove_element('woocommerce_cart');
    vc_remove_element('woocommerce_checkout');
    vc_remove_element('woocommerce_ordmonica_tracking');
    vc_remove_element('add_to_cart');
    vc_remove_element('add_to_cart_url');
    vc_remove_element('product_page');
    vc_remove_element('product_category');
    vc_remove_element('product_categories');
    vc_remove_element('sale_products');
    vc_remove_element('best_selling_products');
    vc_remove_element('top_rated_products');
    vc_remove_element('product_attribute');
    vc_remove_element('vc_basic_grid');
    vc_remove_element('vc_basic_grid_filter');
    vc_remove_element('vc_carousel');
    vc_remove_element('vc_button');
    vc_remove_element('vc_button2');
    vc_remove_element('vc_cta_button');
    vc_remove_element('vc_cta_button2');
    vc_remove_element('vc_media_grid');
    vc_remove_element('vc_masonry_grid');
    vc_remove_element('vc_masonry_media_grid');
    vc_remove_element('vc_gitem');
    vc_remove_element('vc_gitem_animated_block');
    vc_remove_element('vc_gitem_block');
    vc_remove_element('vc_gitem_col');
    vc_remove_element('vc_gitem_post_data');
    vc_remove_element('vc_gitem_post_meta');
    vc_remove_element('vc_gitem_row');
    vc_remove_element('vc_gitem_zone');
    vc_remove_element('vc_gitem_zone_c');
    vc_remove_element('vc_gitem_zone_old');
    vc_remove_element('vc_images_carousel');
    vc_remove_element('vc_posts_grid');
    vc_remove_element('vc_posts_slider');
    vc_remove_element('vc_teasmonica_grid');
    vc_remove_element('vc_text_separator');
    vc_remove_element('vc_widget_sidebar');
    vc_remove_element('vc_wp_archives');
    vc_remove_element('vc_wp_calendar');
    vc_remove_element('vc_wp_categories');
    vc_remove_element('vc_wp_custommenu');
    vc_remove_element('vc_wp_links');
    vc_remove_element('vc_wp_meta');
    vc_remove_element('vc_wp_pages');
    vc_remove_element('vc_wp_posts');
    vc_remove_element('vc_wp_recentcomments');
    vc_remove_element('vc_wp_rss');
    vc_remove_element('vc_wp_search');
    vc_remove_element('vc_wp_tagcloud');
    vc_remove_element('vc_wp_text');
    vc_remove_element('vc_progress_bar');
    vc_remove_element('vc_pie');
    vc_remove_element('vc_tta_tour');
    vc_remove_element('vc_btn');
    vc_remove_element('vc_cta');
    vc_remove_element('vc_message');
    vc_remove_element('vc_facebook');
    vc_remove_element('vc_tweetmeme');
    vc_remove_element('vc_googleplus');
    vc_remove_element('vc_pinterest');
    vc_remove_element('vc_gmaps');
    vc_remove_element('vc_line_chart');
    vc_remove_element('vc_icon');
    vc_remove_element('vc_separator');
    vc_remove_element('vc_flickr');
    vc_remove_element('vc_custom_heading');
    vc_remove_element('vc_raw_html');
    vc_remove_element('vc_raw_js');
    vc_remove_element('vc_round_chart');
    vc_remove_element('vc_tta_pageable');
    vc_remove_element('vc_video');
    vc_remove_element('vc_gallery');
    vc_remove_element('vc_tour');
    vc_remove_param('vc_tta_tabs','style');
    vc_remove_param('vc_tta_tabs','shape');
    vc_remove_param('vc_tta_tabs','color');
    vc_remove_param('vc_tta_tabs','no_fill_content_area');
    vc_remove_param('vc_tta_tabs','spacing');
    vc_remove_param('vc_tta_tabs','gap');
    vc_remove_param('vc_tta_tabs','autoplay');
/*    vc_remove_param('vc_tta_tabs','active_section');*/
    vc_remove_param('vc_tta_tabs','pagination_style');
    vc_remove_param('vc_tta_tabs','pagination_color');
    vc_remove_param('vc_tta_tabs','tab_position');
    vc_remove_param('vc_tta_accordion','style');
    vc_remove_param('vc_tta_accordion','shape');
    vc_remove_param('vc_tta_accordion','color');
    vc_remove_param('vc_tta_accordion','no_fill');
    vc_remove_param('vc_tta_accordion','spacing');
    vc_remove_param('vc_tta_accordion','c_align');
    vc_remove_param('vc_tta_accordion','autoplay');
/*    vc_remove_param('vc_tta_accordion','active_section');*/
    vc_remove_param('vc_tta_accordion','gap');
    vc_remove_param('vc_tta_accordion','collapsible_all');
    vc_remove_param('vc_tta_accordion','c_icon');
    vc_remove_param('vc_tta_accordion','c_position');
    vc_remove_param('vc_row','full_width');
    vc_remove_param('vc_row','gap');
    vc_remove_param('vc_row','columns_placement');
    vc_remove_param('vc_row','content_placement');
    vc_remove_param('vc_row','video_bg_parallax');
    vc_remove_param('vc_row','parallax');
    vc_remove_param('vc_row','parallax_image');
    vc_remove_param('vc_row','equal_height');
    vc_remove_param('vc_row','video_bg');
    vc_remove_param('vc_row','video_bg_url');
    vc_remove_param('vc_row','full_height');
}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'monica_vc_remove_woocommerce', 11 );
// Hook for frontend editor.
add_action( 'vc_load_shortcode', 'monica_vc_remove_woocommerce', 11 );

// deregister grid item
function monica_unregistmonica_theme_post_types() {
    global $wp_post_types;
    foreach( array( 'vc_grid_item' ) as $post_type ) {
        if ( isset( $wp_post_types[ $post_type ] ) ) {
            unset( $wp_post_types[ $post_type ] );
        }
    }
}
add_action( 'init', 'monica_unregistmonica_theme_post_types', 20 );

// Remove default layout settings
add_filter( 'vc_load_default_templates', 'monica_template_modify_array' );
function monica_template_modify_array($data) {
    return array();
}

// Changes row class name
function monica_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
  if ($tag=='vc_row' || $tag=='vc_row_inner' || $tag=='wpb_row') {
    $class_string = str_replace('vc_row-fluid', 'row', $class_string);
  }
  if ($tag=='vc_column' || $tag=='vc_column_inner' || $tag=='wpb_column' || $tag=='vc_column_container') {
    $class_string = str_replace('vc_', '', $class_string);
    $class_string = str_replace('custom_', 'vc_custom_', $class_string);
  }
  return $class_string;
}
add_filter('vc_shortcodes_css_class', 'monica_css_classes_for_vc_row_and_vc_column', 10, 2);

// Remove default CSS
function monica_vc_dr_styles(){
  wp_deregister_style( 'js_composer_front' );
  wp_deregister_script( 'wpb_composer_front_js' );
}
add_action( 'wp_print_styles', 'monica_vc_dr_styles' );

// Remove custom teaser box
if ( is_admin() ) {
  if ( ! function_exists('monica_remove_vc_custom_teaser') ) {
    function monica_remove_vc_custom_teaser(){
      $post_types = get_post_types( '', 'names' );
      foreach ( $post_types as $post_type ) {
        remove_meta_box('vc_teaser',  $post_type, 'side');
      }
    }
  }
add_action('do_meta_boxes', 'monica_remove_vc_custom_teaser');
}

// Add theme icon
add_filter( 'vc_iconpicker-type-themify', 'vc_iconpickmonica_type_themify' );
function vc_iconpickmonica_type_themify( $icons ) {
    $themify_icons = array(
        'Arrows & Direction Icons' => array(
            array( 'ti-arrow-up' => 'Arrow up' ),
            array( 'ti-arrow-right' => 'Arrow right' ),
            array( 'ti-arrow-left' => 'Arrow left' ),
            array( 'ti-arrow-down' => 'Arrow down' ),
            array( 'ti-arrows-vertical' => 'Arrows vertical' ),
            array( 'ti-arrows-horizontal' => 'Arrows horizontal' ),
            array( 'ti-angle-up' => 'Angle up' ),
            array( 'ti-angle-right' => 'Angle right' ),
            array( 'ti-angle-left' => 'Angle left' ),
            array( 'ti-angle-down' => 'Angle down' ),
            array( 'ti-angle-double-up' => 'Angle double up' ),
            array( 'ti-angle-double-right' => 'Angle double right' ),
            array( 'ti-angle-double-left' => 'Angle double left' ),
            array( 'ti-angle-double-down' => 'Angle double down' ),
            array( 'ti-move' => 'Move' ),
            array( 'ti-fullscreen' => 'Fullscreen' ),
            array( 'ti-arrow-top-right' => 'Arrow top right' ),
            array( 'ti-arrow-top-left' => 'Arrow top left' ),
            array( 'ti-arrow-circle-up' => 'Arrow circle up' ),
            array( 'ti-arrow-circle-right' => 'Arrow circle right' ),
            array( 'ti-arrow-circle-left' => 'Arrow circle left' ),
            array( 'ti-arrow-circle-down' => 'Arrow circle down' ),
            array( 'ti-arrows-corner' => 'Arrows corner' ),
            array( 'ti-split-v' => 'Split v' ),
            array( 'ti-split-v-alt' => 'Split v alt' ),
            array( 'ti-split-h' => 'Split h' ),
            array( 'ti-hand-point-up' => 'Hand point up' ),
            array( 'ti-hand-point-right' => 'Hand point right' ),
            array( 'ti-hand-point-left' => 'Hand point left' ),
            array( 'ti-hand-point-down' => 'Hand point down' ),
            array( 'ti-back-right' => 'Back right' ),
            array( 'ti-back-left' => 'Back left' ),
            array( 'ti-exchange-vertical ' => 'Exchange vertical' ),
        ),
        'Web App Icons' => array(
            array( 'ti-wand' => 'Wand'),
            array( 'ti-save' => 'Save'),
            array( 'ti-save-alt' => 'Save alt'),
            array( 'ti-direction' => 'Direction'),
            array( 'ti-direction-alt' => 'Direction alt'),
            array( 'ti-user' => 'User'),
            array( 'ti-link' => 'Link'),
            array( 'ti-unlink' => 'Unlink'),
            array( 'ti-trash' => 'Trash'),
            array( 'ti-target' => 'Target'),
            array( 'ti-tag' => 'Tag'),
            array( 'ti-desktop' => 'Desktop'),
            array( 'ti-tablet' => 'Tablet'),
            array( 'ti-mobile' => 'Mobile'),
            array( 'ti-email' => 'Email'),
            array( 'ti-star' => 'Star'),
            array( 'ti-spray' => 'Spray'),
            array( 'ti-signal' => 'Signal'),
            array( 'ti-shopping-cart' => 'Shopping cart'),
            array( 'ti-shopping-cart-full' => 'Shopping cart full'),
            array( 'ti-settings' => 'Settings'),
            array( 'ti-search' => 'Search'),
            array( 'ti-zoom-in' => 'Zoom in'),
            array( 'ti-zoom-out' => 'Zoom out'),
            array( 'ti-cut' => 'Cut'),
            array( 'ti-ruler' => 'Ruler'),
            array( 'ti-ruler-alt-2' => 'Ruler alt 2'),
            array( 'ti-ruler-pencil' => 'Ruler pencil'),
            array( 'ti-ruler-alt' => 'Ruler alt'),
            array( 'ti-bookmark' => 'Bookmark'),
            array( 'ti-bookmark-alt' => 'Bookmark alt'),
            array( 'ti-reload' => 'Reload'),
            array( 'ti-plus' => 'Plus'),
            array( 'ti-minus' => 'Minus'),
            array( 'ti-close' => 'Close'),
            array( 'ti-pin' => 'Pin'),
            array( 'ti-pencil' => 'Pencil'),
            array( 'ti-pencil-alt' => 'Pencil alt'),
            array( 'ti-paint-roller' => 'Paint roller'),
            array( 'ti-paint-bucket' => 'Paint bucket'),
            array( 'ti-na' => 'Na'),
            array( 'ti-medall' => 'Medall'),
            array( 'ti-medall-alt' => 'Medall alt'),
            array( 'ti-marker' => 'Marker'),
            array( 'ti-marker-alt' => 'Marker alt'),
            array( 'ti-lock' => 'Lock'),
            array( 'ti-unlock' => 'Unlock'),
            array( 'ti-location-arrow' => 'Location arrow'),
            array( 'ti-layout' => 'Layout'),
            array( 'ti-layers' => 'Layers'),
            array( 'ti-layers-alt' => 'Layers alt'),
            array( 'ti-key' => 'Key'),
            array( 'ti-image' => 'Image'),
            array( 'ti-heart' => 'Heart'),
            array( 'ti-heart-broken' => 'Heart broken'),
            array( 'ti-hand-stop' => 'Hand stop'),
            array( 'ti-hand-open' => 'Hand open'),
            array( 'ti-hand-drag' => 'Hand drag'),
            array( 'ti-flag' => 'Flag'),
            array( 'ti-flag-alt' => 'Flag alt'),
            array( 'ti-flag-alt-2' => 'Flag alt 2'),
            array( 'ti-eye' => 'Eye'),
            array( 'ti-import' => 'Import'),
            array( 'ti-export' => 'Export'),
            array( 'ti-cup' => 'Cup'),
            array( 'ti-crown' => 'Crown'),
            array( 'ti-comments' => 'Comments'),
            array( 'ti-comment' => 'Comment'),
            array( 'ti-comment-alt' => 'Comment alt'),
            array( 'ti-thought' => 'Thought'),
            array( 'ti-clip' => 'Clip'),
            array( 'ti-check' => 'Check'),
            array( 'ti-check-box' => 'Check box'),
            array( 'ti-camera' => 'Camera'),
            array( 'ti-announcement' => 'Announcement'),
            array( 'ti-brush' => 'Brush'),
            array( 'ti-brush-alt' => 'Brush alt'),
            array( 'ti-palette' => 'Palette'),
            array( 'ti-briefcase' => 'Briefcase'),
            array( 'ti-bolt' => 'Bolt'),
            array( 'ti-bolt-alt' => 'Bolt alt'),
            array( 'ti-blackboard' => 'Blackboard'),
            array( 'ti-bag' => 'Bag'),
            array( 'ti-world' => 'World'),
            array( 'ti-wheelchair' => 'Wheelchair'),
            array( 'ti-car' => 'Car'),
            array( 'ti-truck' => 'Truck'),
            array( 'ti-timer' => 'Timer'),
            array( 'ti-ticket' => 'Ticket'),
            array( 'ti-thumb-up' => 'Thumb up'),
            array( 'ti-thumb-down' => 'Thumb down'),
            array( 'ti-stats-up' => 'Stats up'),
            array( 'ti-stats-down' => 'Stats down'),
            array( 'ti-shine' => 'Shine'),
            array( 'ti-shift-right' => 'Shift right'),
            array( 'ti-shift-left' => 'Shift left'),
            array( 'ti-shift-right-alt' => 'Shift right alt'),
            array( 'ti-shift-left-alt' => 'Shift left alt'),
            array( 'ti-shield' => 'Shield'),
            array( 'ti-notepad' => 'Notepad'),
            array( 'ti-server' => 'Server'),
            array( 'ti-pulse' => 'Pulse'),
            array( 'ti-printer' => 'Printer'),
            array( 'ti-power-off' => 'Power off'),
            array( 'ti-plug' => 'Plug'),
            array( 'ti-pie-chart' => 'Pie chart'),
            array( 'ti-panel' => 'Panel'),
            array( 'ti-package' => 'Package'),
            array( 'ti-music' => 'Music'),
            array( 'ti-music-alt' => 'Music alt'),
            array( 'ti-mouse' => 'Mouse'),
            array( 'ti-mouse-alt' => 'Mouse alt'),
            array( 'ti-money' => 'Money'),
            array( 'ti-microphone' => 'Microphone'),
            array( 'ti-menu' => 'Menu'),
            array( 'ti-menu-alt' => 'Menu alt'),
            array( 'ti-map' => 'Map'),
            array( 'ti-map-alt' => 'Map alt'),
            array( 'ti-location-pin' => 'Location pin'),
            array( 'ti-light-bulb' => 'Light bulb'),
            array( 'ti-info' => 'Info'),
            array( 'ti-infinite' => 'Infinite'),
            array( 'ti-id-badge' => 'Id badge'),
            array( 'ti-hummer' => 'Hummer'),
            array( 'ti-home' => 'Home'),
            array( 'ti-help' => 'Help'),
            array( 'ti-headphone' => 'Headphone'),
            array( 'ti-harddrives' => 'Harddrives'),
            array( 'ti-harddrive' => 'Harddrive'),
            array( 'ti-gift' => 'Gift'),
            array( 'ti-game' => 'Game'),
            array( 'ti-filter' => 'Filter'),
            array( 'ti-files' => 'Files'),
            array( 'ti-file' => 'File'),
            array( 'ti-zip' => 'Zip'),
            array( 'ti-folder' => 'Folder'),
            array( 'ti-envelope' => 'Envelope'),
            array( 'ti-dashboard' => 'Dashboard'),
            array( 'ti-cloud' => 'Cloud'),
            array( 'ti-cloud-up' => 'Cloud up'),
            array( 'ti-cloud-down' => 'Cloud down'),
            array( 'ti-clipboard' => 'Clipboard'),
            array( 'ti-calendar' => 'Calendar'),
            array( 'ti-book' => 'Book'),
            array( 'ti-bell' => 'Bell'),
            array( 'ti-basketball' => 'Basketball'),
            array( 'ti-bar-chart' => 'Bar chart'),
            array( 'ti-bar-chart-alt' => 'Bar chart alt'),
            array( 'ti-archive' => 'Archive'),
            array( 'ti-anchor' => 'Anchor'),
            array( 'ti-alert' => 'Alert'),
            array( 'ti-alarm-clock' => 'Alarm clock'),
            array( 'ti-agenda' => 'Agenda'),
            array( 'ti-write' => 'Write'),
            array( 'ti-wallet' => 'Wallet'),
            array( 'ti-video-clapper' => 'Video clapper'),
            array( 'ti-video-camera' => 'Video camera'),
            array( 'ti-vector' => 'Vector'),
            array( 'ti-support' => 'Support'),
            array( 'ti-stamp' => 'Stamp'),
            array( 'ti-slice' => 'Slice'),
            array( 'ti-shortcode' => 'Shortcode'),
            array( 'ti-receipt' => 'Receipt'),
            array( 'ti-pin2' => 'Pin2'),
            array( 'ti-pin-alt' => 'Pin alt'),
            array( 'ti-pencil-alt2' => 'Pencil alt2'),
            array( 'ti-eraser' => 'Eraser'),
            array( 'ti-more' => 'More'),
            array( 'ti-more-alt' => 'More alt'),
            array( 'ti-microphone-alt' => 'Microphone alt'),
            array( 'ti-magnet' => 'Magnet'),
            array( 'ti-line-double' => 'Line double'),
            array( 'ti-line-dotted' => 'Line dotted'),
            array( 'ti-line-dashed' => 'Line dashed'),
            array( 'ti-ink-pen' => 'Ink pen'),
            array( 'ti-info-alt' => 'Info alt'),
            array( 'ti-help-alt' => 'Help alt'),
            array( 'ti-headphone-alt' => 'Headphone alt'),
            array( 'ti-gallery' => 'Gallery'),
            array( 'ti-face-smile' => 'Face smile'),
            array( 'ti-face-sad' => 'Face sad'),
            array( 'ti-credit-card' => 'Credit card'),
            array( 'ti-comments-smiley' => 'Comments smiley'),
            array( 'ti-time' => 'Time'),
            array( 'ti-share' => 'Share'),
            array( 'ti-share-alt' => 'Share alt'),
            array( 'ti-rocket' => 'Rocket'),
            array( 'ti-new-window' => 'New window'),
            array( 'ti-rss' => 'Rss'),
            array( 'ti-rss-alt' => 'Rss alt'),
        ),
        'Control Icons' => array(
            array( 'ti-control-stop' => 'Control stop'),
            array( 'ti-control-shuffle' => 'Control shuffle'),
            array( 'ti-control-play' => 'Control play'),
            array( 'ti-control-pause' => 'Control pause'),
            array( 'ti-control-forward' => 'Control forward'),
            array( 'ti-control-backward' => 'Control backward'),
            array( 'ti-volume' => 'Volume'),
            array( 'ti-control-skip-forward' => 'Control skip forward'),
            array( 'ti-control-skip-backward' => 'Control skip backward'),
            array( 'ti-control-record' => 'Control record'),
            array( 'ti-control-eject' => 'Control eject'),
        ),
        'Text Editor' => array(
            array( 'ti-paragraph' => 'Paragraph'),
            array( 'ti-uppercase' => 'Uppercase'),
            array( 'ti-underline' => 'Underline'),
            array( 'ti-text' => 'Text'),
            array( 'ti-Italic' => 'Italic'),
            array( 'ti-smallcap' => 'Smallcap'),
            array( 'ti-list' => 'List'),
            array( 'ti-list-ol' => 'List ol'),
            array( 'ti-align-right' => 'Align right'),
            array( 'ti-align-left' => 'Align left'),
            array( 'ti-align-justify' => 'Align justify'),
            array( 'ti-align-center' => 'Align center'),
            array( 'ti-quote-right' => 'Quote right'),
            array( 'ti-quote-left' => 'Quote left'),
        ),
        'Layout' => array(
            array( 'ti-layout-width-full' => 'Layout width full'),
            array( 'ti-layout-width-default' => 'Layout width default'),
            array( 'ti-layout-width-default-alt' => 'Layout width default alt'),
            array( 'ti-layout-tab' => 'Layout tab'),
            array( 'ti-layout-tab-window' => 'Layout tab window'),
            array( 'ti-layout-tab-v' => 'Layout tab v'),
            array( 'ti-layout-tab-min' => 'Layout tab min'),
            array( 'ti-layout-slider' => 'Layout slider'),
            array( 'ti-layout-slider-alt' => 'Layout slider alt'),
            array( 'ti-layout-sidebar-right' => 'Layout sidebar right'),
            array( 'ti-layout-sidebar-none' => 'Layout sidebar none'),
            array( 'ti-layout-sidebar-left' => 'Layout sidebar left'),
            array( 'ti-layout-placeholder' => 'Layout placeholder'),
            array( 'ti-layout-menu' => 'Layout menu'),
            array( 'ti-layout-menu-v' => 'Layout menu v'),
            array( 'ti-layout-menu-separated' => 'Layout menu separated'),
            array( 'ti-layout-menu-full' => 'Layout menu full'),
            array( 'ti-layout-media-right' => 'Layout media right'),
            array( 'ti-layout-media-right-alt' => 'Layout media right alt'),
            array( 'ti-layout-media-overlay' => 'Layout media overlay'),
            array( 'ti-layout-media-overlay-alt' => 'Layout media overlay alt'),
            array( 'ti-layout-media-overlay-alt-2' => 'Layout media overlay alt 2'),
            array( 'ti-layout-media-left' => 'Layout media left'),
            array( 'ti-layout-media-left-alt' => 'Layout media left alt'),
            array( 'ti-layout-media-center' => 'Layout media center'),
            array( 'ti-layout-media-center-alt' => 'Layout media center alt'),
            array( 'ti-layout-list-thumb' => 'Layout list thumb'),
            array( 'ti-layout-list-thumb-alt' => 'Layout list thumb alt'),
            array( 'ti-layout-list-post' => 'Layout list post'),
            array( 'ti-layout-list-large-image' => 'Layout list large image'),
            array( 'ti-layout-line-solid' => 'Layout line solid'),
            array( 'ti-layout-grid4' => 'Layout grid4'),
            array( 'ti-layout-grid3' => 'Layout grid3'),
            array( 'ti-layout-grid2' => 'Layout grid2'),
            array( 'ti-layout-grid2-thumb' => 'Layout grid2 thumb'),
            array( 'ti-layout-cta-right' => 'Layout cta right'),
            array( 'ti-layout-cta-left' => 'Layout cta left'),
            array( 'ti-layout-cta-center' => 'Layout cta center'),
            array( 'ti-layout-cta-btn-right' => 'Layout cta btn right'),
            array( 'ti-layout-cta-btn-left' => 'Layout cta btn left'),
            array( 'ti-layout-column4' => 'Layout column4'),
            array( 'ti-layout-column3' => 'Layout column3'),
            array( 'ti-layout-column2' => 'Layout column2'),
            array( 'ti-layout-accordion-separated' => 'Layout accordion separated'),
            array( 'ti-layout-accordion-merged' => 'Layout accordion merged'),
            array( 'ti-layout-accordion-list' => 'Layout accordion list'),
            array( 'ti-widgetized' => 'Widgetized'),
            array( 'ti-widget' => 'Widget'),
            array( 'ti-widget-alt' => 'Widget alt'),
            array( 'ti-view-list' => 'View list'),
            array( 'ti-view-list-alt' => 'View list alt'),
            array( 'ti-view-grid' => 'View grid'),
            array( 'ti-upload' => 'Upload'),
            array( 'ti-download' => 'Download'),
            array( 'ti-loop' => 'Loop'),
            array( 'ti-layout-sidebar-2' => 'Layout sidebar 2'),
            array( 'ti-layout-grid4-alt' => 'Layout grid4 alt'),
            array( 'ti-layout-grid3-alt' => 'Layout grid3 alt'),
            array( 'ti-layout-grid2-alt' => 'Layout grid2 alt'),
            array( 'ti-layout-column4-alt' => 'Layout column4 alt'),
            array( 'ti-layout-column3-alt' => 'Layout column3 alt'),
            array( 'ti-layout-column2-alt' => 'Layout column2 alt'),
        ),
        'Brand Icons' => array(
            array( 'ti-flickr' => 'Flickr' ),
            array( 'ti-flickr-alt' => 'Flickr alt' ),
            array( 'ti-instagram' => 'Instagram' ),
            array( 'ti-google' => 'Google' ),
            array( 'ti-github' => 'Github' ),
            array( 'ti-facebook' => 'Facebook' ),
            array( 'ti-dropbox' => 'Dropbox' ),
            array( 'ti-dropbox-alt' => 'Dropbox alt' ),
            array( 'ti-dribbble' => 'Dribbble' ),
            array( 'ti-apple' => 'Apple' ),
            array( 'ti-android' => 'Android' ),
            array( 'ti-yahoo' => 'Yahoo' ),
            array( 'ti-trello' => 'Trello' ),
            array( 'ti-stack-overflow' => 'Stack overflow' ),
            array( 'ti-soundcloud' => 'Soundcloud' ),
            array( 'ti-sharethis' => 'Sharethis' ),
            array( 'ti-sharethis-alt' => 'Sharethis alt' ),
            array( 'ti-reddit' => 'Reddit' ),
            array( 'ti-microsoft' => 'Microsoft' ),
            array( 'ti-microsoft-alt' => 'Microsoft alt' ),
            array( 'ti-linux' => 'Linux' ),
            array( 'ti-jsfiddle' => 'Jsfiddle' ),
            array( 'ti-joomla' => 'Joomla' ),
            array( 'ti-html5' => 'Html5' ),
            array( 'ti-css3' => 'Css3' ),
            array( 'ti-drupal' => 'Drupal' ),
            array( 'ti-wordpress' => 'Wordpress' ),
            array( 'ti-tumblr' => 'Tumblr' ),
            array( 'ti-tumblr-alt' => 'Tumblr alt' ),
            array( 'ti-skype' => 'Skype' ),
            array( 'ti-youtube' => 'Youtube' ),
            array( 'ti-vimeo' => 'Vimeo' ),
            array( 'ti-vimeo-alt' => 'Vimeo alt' ),
            array( 'ti-twitter' => 'Twitter' ),
            array( 'ti-twitter-alt' => 'Twitter alt' ),
            array( 'ti-linkedin' => 'Linkedin' ),
            array( 'ti-pinterest' => 'Pinterest' ),
            array( 'ti-pinterest-alt' => 'Pinterest alt' ),
            array( 'ti-themify-logo' => 'Themify logo' ),
            array( 'ti-themify-favicon' => 'Themify favicon' ),
            array( 'ti-themify-favicon-alt' => 'Themify favicon alt' ),
        ),
    );
    return array_merge( $icons, $themify_icons );
}
add_filter( 'vc_iconpicker-type-etline', 'vc_iconpickmonica_type_etline' );
function vc_iconpickmonica_type_etline( $icons ) {
    $etline_icons = array(
        'Line Icons' => array (
            array( 'icon-mobile' => 'mobile' ),
            array( 'icon-laptop' => 'laptop' ),
            array( 'icon-desktop' => 'desktop' ),
            array( 'icon-tablet' => 'tablet' ),
            array( 'icon-phone' => 'phone' ),
            array( 'icon-document' => 'document' ),
            array( 'icon-documents' => 'documents' ),
            array( 'icon-search' => 'search' ),
            array( 'icon-clipboard' => 'clipboard' ),
            array( 'icon-newspaper' => 'newspaper' ),
            array( 'icon-notebook' => 'notebook' ),
            array( 'icon-book-open' => 'book-open' ),
            array( 'icon-browser' => 'browser' ),
            array( 'icon-calendar' => 'calendar' ),
            array( 'icon-presentation' => 'presentation' ),
            array( 'icon-picture' => 'picture' ),
            array( 'icon-pictures' => 'pictures' ),
            array( 'icon-video' => 'video' ),
            array( 'icon-camera' => 'camera' ),
            array( 'icon-printer' => 'printer' ),
            array( 'icon-toolbox' => 'toolbox' ),
            array( 'icon-briefcase' => 'briefcase' ),
            array( 'icon-wallet' => 'wallet' ),
            array( 'icon-gift' => 'gift' ),
            array( 'icon-bargraph' => 'bargraph' ),
            array( 'icon-grid' => 'grid' ),
            array( 'icon-expand' => 'expand' ),
            array( 'icon-focus' => 'focus' ),
            array( 'icon-edit' => 'edit' ),
            array( 'icon-adjustments' => 'adjustments' ),
            array( 'icon-ribbon' => 'ribbon' ),
            array( 'icon-hourglass' => 'hourglass' ),
            array( 'icon-lock' => 'lock' ),
            array( 'icon-megaphone' => 'megaphone' ),
            array( 'icon-shield' => 'shield' ),
            array( 'icon-trophy' => 'trophy' ),
            array( 'icon-flag' => 'flag' ),
            array( 'icon-map' => 'map' ),
            array( 'icon-puzzle' => 'puzzle' ),
            array( 'icon-basket' => 'basket' ),
            array( 'icon-envelope' => 'envelope' ),
            array( 'icon-streetsign' => 'streetsign' ),
            array( 'icon-telescope' => 'telescope' ),
            array( 'icon-gears' => 'gears' ),
            array( 'icon-key' => 'key' ),
            array( 'icon-paperclip' => 'paperclip' ),
            array( 'icon-attachment' => 'attachment' ),
            array( 'icon-pricetags' => 'pricetags' ),
            array( 'icon-lightbulb' => 'lightbulb' ),
            array( 'icon-layers' => 'layers' ),
            array( 'icon-pencil' => 'pencil' ),
            array( 'icon-tools' => 'tools' ),
            array( 'icon-tools-2' => 'tools-2' ),
            array( 'icon-scissors' => 'scissors' ),
            array( 'icon-paintbrush' => 'paintbrush' ),
            array( 'icon-magnifying-glass' => 'magnifying-glass' ),
            array( 'icon-circle-compass' => 'circle-compass' ),
            array( 'icon-linegraph' => 'linegraph' ),
            array( 'icon-mic' => 'mic' ),
            array( 'icon-strategy' => 'strategy' ),
            array( 'icon-beaker' => 'beaker' ),
            array( 'icon-caution' => 'caution' ),
            array( 'icon-recycle' => 'recycle' ),
            array( 'icon-anchor' => 'anchor' ),
            array( 'icon-profile-male' => 'profile-male' ),
            array( 'icon-profile-female' => 'profile-female' ),
            array( 'icon-bike' => 'bike' ),
            array( 'icon-wine' => 'wine' ),
            array( 'icon-hotairballoon' => 'hotairballoon' ),
            array( 'icon-globe' => 'globe' ),
            array( 'icon-genius' => 'genius' ),
            array( 'icon-map-pin' => 'map-pin' ),
            array( 'icon-dial' => 'dial' ),
            array( 'icon-chat' => 'chat' ),
            array( 'icon-heart' => 'heart' ),
            array( 'icon-cloud' => 'cloud' ),
            array( 'icon-upload' => 'upload' ),
            array( 'icon-download' => 'download' ),
            array( 'icon-target' => 'target' ),
            array( 'icon-hazardous' => 'hazardous' ),
            array( 'icon-piechart' => 'piechart' ),
            array( 'icon-speedometer' => 'speedometer' ),
            array( 'icon-global' => 'global' ),
            array( 'icon-compass' => 'compass' ),
            array( 'icon-lifesaver' => 'lifesaver' ),
            array( 'icon-clock' => 'clock' ),
            array( 'icon-aperture' => 'aperture' ),
            array( 'icon-quote' => 'quote' ),
            array( 'icon-scope' => 'scope' ),
            array( 'icon-alarmclock' => 'alarmclock' ),
            array( 'icon-refresh' => 'refresh' ),
            array( 'icon-happy' => 'happy' ),
            array( 'icon-sad' => 'sad' ),
            array( 'icon-facebook' => 'facebook' ),
            array( 'icon-twitter' => 'twitter' ),
            array( 'icon-googleplus' => 'googleplus' ),
            array( 'icon-rss' => 'rss' ),
            array( 'icon-tumblr' => 'tumblr' ),
            array( 'icon-linkedin' => 'linkedin' ),
            array( 'icon-dribbble' => 'dribbble' ),
        ),
    );
    return array_merge( $icons, $etline_icons );
}
add_action( 'vc_backend_editor_enqueue_js_css', 'monica_vpb_bk_icon' );
function monica_vpb_bk_icon(){
    wp_enqueue_style( 'el-icons', get_template_directory_uri().'/assets/css/icons.css', array(), '1.0' );
}