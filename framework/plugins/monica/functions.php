<?php

/**
 * Sets up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) )
	$content_width = 920;

/**
* Basic Theme Setup
*
* @since VASCA v1.0
*
*/
function monica_setup() {

	// Text domain translation
	load_theme_textdomain( 'monica_theme', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add HTML5 support
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Add post format
	add_theme_support( 'post-formats', array(
		'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// Add WooCommerce Support
	add_theme_support( 'woocommerce' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'header', esc_html__( 'Navigation Menu', 'monica_theme' ) );

	//Add theme support & image size
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'monica_thumb', 80, 80, true );
	add_image_size( 'monica_blog-normal', 750, 310, true );
	add_image_size( 'monica_blog-medium', 360, 180, true );
	add_image_size( 'monica_blog-masonry', 360 );
	add_image_size( 'monica_portfolio', 600, 600, true );
	add_image_size( 'monica_portfolio-masonry', 500 );


	// Use theme gallery style
	add_filter( 'use_default_gallery_style', '__return_false' );

}
add_action( 'after_setup_theme', 'monica_setup' );

/**
 * Enqueues scripts and styles for front end.
 *
 * @since deVOX 1.1
 *
 */
function monica_scripts_styles() {

	$monica_theme = wp_get_theme();
	$monica_ver = $monica_theme->get( 'Version' );

	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	$monica_theme_css = array (
		'bootstrap',
		'animate.min',
		'icons',
		'plugins',
		'main',
	);

	$monica_theme_js = array (
		'atext',
		'modernizr',
		'bootstrap.min',
		'skrollr.min',
		'slick.min',
		'superfish.min',
		'jquery.matchHeight-min',
		'jquery.mobile.custom.min',
		'timeline',
		'slidebars.min',
		'wow.min',
		'functions'
	);

	$monica_reg_js = array (
		'odemeter',
		'waypoint',
		'progress',
		'isotope.pkgd.min',
		'tweecool.min',
	);


	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		wp_enqueue_style( 'deovox-woocommerce', get_template_directory_uri().'/assets/css/woocommerce.css', array(), $monica_ver );
	}

	foreach ($monica_theme_css as $monica_theme_css_file) {
		wp_enqueue_style( $monica_theme_css_file, get_template_directory_uri().'/assets/css/'.$monica_theme_css_file.'.css', array(), $monica_ver );
	}
	wp_enqueue_style( 'vasca-style', get_stylesheet_uri(), array(), '1.0' );

	foreach ($monica_reg_js as $js_name) {
		wp_register_script( $js_name, get_template_directory_uri(). '/assets/js/'.$js_name.'.js', array(), false, true );
	};

	// Loads javascript & custom functions
	foreach ($monica_theme_js as $monica_theme_js_file) {
		wp_enqueue_script( $monica_theme_js_file, get_template_directory_uri(). '/assets/js/'.$monica_theme_js_file.'.js', array( 'jquery' ), false, true );
	}

	// Run JS for IE
	if(preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT'])):
		wp_enqueue_script( 'jquery.html5shiv', get_template_directory_uri(). '/assets/js/html5shiv.js', array(), false, false );
		wp_enqueue_script( 'jquery.respond', get_template_directory_uri(). '/assets/js/respond.min.js', array(), false, false );
	endif;

}
add_action( 'wp_enqueue_scripts', 'monica_scripts_styles' );

/**
 * Enqueues scripts and styles for back end.
 *
 * @since VASCA v1.0
 *
 */
function monica_load_custom_wp_admin_sc() {
	wp_enqueue_style( 'css.admin', get_template_directory_uri().'/assets/css/editor.css', array(), '1.0' );
    wp_enqueue_script( 'jquery.admin', get_template_directory_uri(). '/assets/js/editor.js', array(), false, false );
}
add_action( 'admin_enqueue_scripts', 'monica_load_custom_wp_admin_sc' );

/**
 * Registers widget areas.
 *
 * @since VASCA v1.0
 *
 */
function monica_register_sidebar($name,$id,$desc){
	register_sidebar( array(
		'name'          => $name,
		'id'            => $id,
		'description'   => $desc,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4></div>',
	) );
}
function monica_register_footer_widget($id){
	register_sidebar( array(
		'name'          => 'Footer '.$id,
		'id'            => 'footer-'.$id,
		'description'   => esc_html__( 'Appears in footer area.', 'monica_theme' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4></div>',
	) );
}

function monica_widgets_init() {

	monica_register_sidebar('Default Sidebar Widget Area','default-sidebar','Appears in sidebar area');

	if(monica_option_data('select_footer_widget_1_width')) {
		monica_register_footer_widget(1);
	}
	if(monica_option_data('select_footer_widget_2_width')) {
		monica_register_footer_widget(2);
	}
	if(monica_option_data('select_footer_widget_3_width')) {
		monica_register_footer_widget(3);
	}
	if(monica_option_data('select_footer_widget_4_width')) {
		monica_register_footer_widget(4);
	}
	if(monica_option_data('select_footer_widget_5_width')) {
		monica_register_footer_widget(5);
	}
	if(monica_option_data('select_footer_widget_6_width')) {
		monica_register_footer_widget(6);
	}

	$sidebar_setting = monica_option_data('multi_text_sidebar');
	if ($sidebar_setting) {

		foreach ($sidebar_setting as $sidebar => $name) {
			if ($name)
			monica_register_sidebar($name,strtolower($name),'Custom Widget Area '.$name);
		}

	}

}
add_action( 'widgets_init', 'monica_widgets_init' );


/**
 * Add Administrator Options Page
 *
 * @since VASCA v1.0
 *
 */
	require_once( get_template_directory() . '/framework/admin/ReduxCore/framework.php' );
	require_once( get_template_directory() . '/framework/admin/config/config.php' );

/**
 * Load Theme Library & Framework
 *
 * @since VASCA v1.0
 *
 */
$monica_lib_files = array (
	'cmb2/functions',
	'theme-functions',
	'theme-posts',
	'theme-plugins',
);
foreach ($monica_lib_files as $monica_lib_file) {
	require_once( get_template_directory() . '/framework/'.$monica_lib_file.'.php');
}

/* Load Theme Hook*/
require_once get_template_directory().'/template/theme-hook.php';


/**
 * Visual Composer Plugin Support
 *
 * @since VASCA v1.0
 *
 */

if (class_exists('WPBakeryVisualComposerAbstract')){
	require_once( get_template_directory() . '/framework/pagebuilder/config.php');
	require_once( get_template_directory() . '/framework/pagebuilder/map.php');
}

/**
 * WooCommerce
 *
 * @since VASCA v1.0
 *
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    require_once( get_template_directory() . '/framework/theme-woocommerce.php');
    if (class_exists('WPBakeryVisualComposerAbstract')){
	    require_once( get_template_directory() . '/framework/pagebuilder/woocommerce.php');
	}
}