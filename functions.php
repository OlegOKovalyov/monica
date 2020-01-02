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
	add_image_size( 'makeit_thumb', 360, 150, true );
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
		'fancy/jquery.fancybox',
		'owl.carousel'
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
		'functions',
		'isotope.pkgd.min',
		'jquery.fancybox.pack',
		'owl.carousel.min'
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
	wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );

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


add_action('admin_head', 'my_custom_css');

function my_custom_css() {
  echo '<style>
    .acf-field-page-link  {
	    max-width: 300px;
	}
  </style>';
}

function is_mobile () {
	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;
	if ($detect->isMobile()) {
		return true;
	} else {
		return false;
	}
}

add_action('init', 'register_post_types');// register new post type
function register_post_types(){
register_post_type( 'vacancies',
    array(
		'label'                  => 'Вакансії',
        'labels' => array(
            'name'               => __('Вакансії','monica_theme'),
            'singular_name'      => __('Вакансія','monica_theme'),
            'add_new'            => __( 'Додати Вакансії' ),
            'add_new_item'       => __( 'Додати нову Вакансію' ),
            'edit'               => __( 'Редагувати' ),
            'edit_item'          => __( 'Редагувати Вакінсію' ),
            'new_item'           => __( 'Нова Вакансія' ),
            'view'               => __( 'Переглянути Вакінсію' ),
            'view_item'          => __( 'Переглянути Вакінсію' ),
            'search_items'       => __( 'Знайти Вакансію' ),
            'not_found'          => __( 'Вакансій не знайдено' ),
            'not_found_in_trash' => __( 'Вакансій не знайдено в кошику' ),
            'parent'             => __( 'Батьківська Вакансія' )
        ),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => array('post','vacancies'),
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'has_archive'         => 'faq',
		'query_var'           => true,
		'supports'            => array( 'title', 'editor', 'excerpt' ),
    )
);
}

// add new role to edit cusom post vacancies
add_role( 'hr_vacancies', 'HR Vacancies',
	array(
		'read'             => true,  // true разрешает эту возможность
		'edit_vacancies'   => true,  // true разрешает редактировать посты
		'delete_vacancies' => true,  // false запрещает удалять посты
		'edit_others_vacancies'=> true,
		'publish_vacancies' => true,
		'edit_published_vacancies' => true,
		'delete_published_vacancies' => true,
		'upload_files'     => false,  // может загружать файлы
	) 
);
function add_theme_caps() {
    // gets the author role
    $role = get_role( 'administrator' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'edit_vacancies' );
    $role->add_cap( 'edit_others_vacancies' );
    $role->add_cap( 'delete_vacancies' );
    $role->add_cap( 'publish_vacancies' );
    $role->add_cap( 'edit_published_vacancies' );
    $role->add_cap( 'delete_published_vacancies' );


    /*$hr = get_role( 'hr_vacancies' );
    $hr->add_cap( 'read' );
    $hr->add_cap( 'edit_vacancies' );
    $hr->add_cap( 'edit_others_vacancies' );
    $hr->add_cap( 'delete_vacancies' );
    $hr->add_cap( 'publish_vacancies' );
    $hr->add_cap( 'edit_published_vacancies' );
    $hr->add_cap( 'delete_published_vacancies' );*/
}
add_action( 'admin_init', 'add_theme_caps');



function more_vacancies() {
    global $post;
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];

    $args = array(
        'post_type' => 'vacancies',
        'posts_per_page' => $ppp,
        'offset' => $offset
    );

    $query = new WP_Query( $args );

    // Цикл
    if ( $query->have_posts() ) { 
        ob_start();
        ?>
        <?php while ( $query->have_posts() ) {
            $query->the_post(); 
            ?>
            <article <?php post_class('vacancies-item'); ?>>
                <div class="vacancies-item-date">
                    <i class="fa fa-clock-o"></i>
                    <?php echo get_the_date('d.m.Y'); ?>
                </div>
                <h4>
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h4>
                <div class="vacancies-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <div class="entry-link heading-font">
                    <a href="<?php the_permalink() ?>"><?php _e('[:ua]читати далі[:ru]читать дальше[:en]read more[:]') ?></a>
                </div>
            </article>
            <?php
        }
		$vacancies_posts = ob_get_contents();
		ob_end_clean();
        $vacancies_count = wp_count_posts('vacancies')->publish - $offset - $ppp;

    } else {
    	$vacancies_posts = '';
    	$vacancies_count = '';
    }
    wp_reset_postdata();

    $data = array(
    	'posts' => $vacancies_posts,
    	'vacancies_count' => $vacancies_count
	);

    wp_send_json_success($data);
}
add_action('wp_ajax_nopriv_more_vacancies', 'more_vacancies'); 
add_action('wp_ajax_more_vacancies', 'more_vacancies');




add_action('wp_ajax_send_resume_form', 'send_resume_form');
add_action('wp_ajax_nopriv_send_resume_form', 'send_resume_form');
function send_resume_form () {
    $result = $_POST;

    $data = array();

    $error = false;
    $files = array();

    $uploaddir = wp_upload_dir(); // . - /wp-content/uploads/
    $uploaddir =$uploaddir['path'].'/sended_resumes/'; // create new folder with user email name
    // Create folder if there is any

    if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );

    // переместим файлы из временной директории в указанную
    $date_for_category = time();
    $len = count($_FILES);
    foreach( $_FILES as $file ){
        if( move_uploaded_file( $file['tmp_name'], $uploaddir . basename($file['name']) ) ){
            $filename = basename($file['name']);
            $files[] = realpath( $uploaddir . $file['name'] );
            $file_path = $uploaddir . basename($file['name']);

            //echo $file_path;
            // Check image file type
            // $wp_filetype = wp_check_filetype( $filename, null );

            // Set attachment data
            /*$attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title'     => sanitize_file_name( $filename ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );*/
            // Create the attachment
            //$attach_id = wp_insert_attachment( $attachment, $file_path, $testimonial_post );

            // Include image.php
            //require_once(ABSPATH . 'wp-admin/includes/image.php');

            // Define attachment metadata
            //$attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );

            // Assign metadata to attachment
            //wp_update_attachment_metadata( $attach_id, $attach_data );

        }
        else{
            $error = true;
            $file_path = '';
        }
    }
    $attachments = $file_path;
    $headers = 'From: '.$result['name'].' <'.$result['email'].'>';
    //$headers = 'From: My Name <myname@mydomain.com>' . "\r\n";
    //echo $attachments;
    //print_r($result);
    $message = $result['message'];
    $email_field = get_field('email', 5002);
    $mail = wp_mail("work@kormotech.com.ua, {$email_field}", 'Нове резюме від: '.$result['name'], $message, $headers, $attachments);

    if ($mail) {
        wp_die("mail sended");
    } else {
        wp_die("mail error");
    }

}

add_filter( 'woocommerce_prevent_admin_access', '__return_false' );
add_filter( 'woocommerce_disable_admin_bar', '__return_false' );


function true_load_posts(){
 
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; 
	$args['post_status'] = 'publish';

	query_posts( $args );

	if( have_posts() ) : ?>
 

	   	<?php while( have_posts() ): the_post();
 
			get_template_part( 'template/content-posts', get_post_format() );
 
		endwhile; ?>
	<?php
	endif;
	die();
}
 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');


