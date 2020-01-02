<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category deVOX
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( get_template_directory() . '/framework/cmb2/init.php' ) ) {
	require_once get_template_directory() . '/framework/cmb2/init.php';
	require_once get_template_directory() . '/framework/cmb2/cmb2-rgba.php';
	require_once get_template_directory() . '/framework/cmb2/includes/CMB2-Conditionals.php';
}

add_action( 'cmb2_init', 'monica_metabox' );
function monica_metabox() {

	$prefix = '_monica_';
	$blog_layout = monica_option_data('select_blog_sidebar') ? monica_option_data('select_blog_sidebar') : 'right-sidebar' ;
	$sidebar_item = $sidebar_item_alt = array();
	$sidebar_item['default-sidebar'] 		 = 'Default Sidebar';
	$sidebar_setting = monica_option_data('multi_text_sidebar');
	if ($sidebar_setting) {

		foreach ($sidebar_setting as $sidebar => $name) {

			if($name) {
				$sidebar_item[strtolower($name)] 		= $name;
			}

		}

	}

	$menu_item = array();
	$menu_nav = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
	$menu_item['default'] = esc_html__('Default','monica_theme');
	foreach ($menu_nav as $menu_nav_item) {
		$menu_item[$menu_nav_item->slug] = $menu_nav_item->name;
	}

	// Post Media Format Settings
	$monica_theme_post_media_meta = new_cmb2_box( array(
		'id'            => 'monica_theme_media_post_format_settings',
		'title'         => esc_html__( 'Media Post Format Settings', 'monica_theme' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true,
	) );
	$monica_theme_post_media_meta->add_field( array(
	    'name' => 'Media Thumbnail',
	    'desc' => '',
	    'id' => $prefix . 'post_media_thumbnail',
	    'type' => 'file',
	) );
	$monica_theme_post_media_meta->add_field( array(
		'name' => esc_html__( 'Media URL', 'monica_theme' ),
		'desc' => esc_html__( 'Insert custom media URL Video & Audio Posts. Vimeo, Youtube and Sound Cloud', 'monica_theme' ),
		'id'   => $prefix . 'post_format_media',
		'type' => 'oembed',
	) );
	$monica_theme_post_media_meta->add_field( array(
		'name' => esc_html__( 'Custom Media URL', 'monica_theme' ),
		'desc' => esc_html__( 'Insert custom media URL Video & Audio Posts', 'monica_theme' ),
		'id'   => $prefix . 'post_custom_format_media',
		'type' => 'file',
	) );

	// Post Quotes Format Settings
	$monica_theme_post_quotes_meta = new_cmb2_box( array(
		'id'            => 'monica_theme_quotes_post_format_settings',
		'title'         => esc_html__( 'Quotes Post Format Settings', 'monica_theme' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true,
	) );
	$monica_theme_post_quotes_meta->add_field( array(
		'name' => esc_html__( 'Quote Content', 'monica_theme' ),
		'id'   => $prefix . 'post_quotes',
		'type' => 'textarea_small',
	) );

	// Post Gallery Format Settings
	$monica_theme_post_gallery_meta = new_cmb2_box( array(
		'id'            => 'monica_theme_gallery_post_format_settings',
		'title'         => esc_html__( 'Gallery Post Format Settings', 'monica_theme' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true,
	) );
	$monica_theme_post_gallery_meta->add_field( array(
	    'name' => 'Gallery',
	    'desc' => '',
	    'id' => $prefix . 'post_gallery',
	    'type' => 'file_list',
	) );
	$monica_theme_post_gallery_meta->add_field( array(
		'name'    => esc_html__( 'Gallery Style', 'monica_theme' ),
		'id'      => $prefix . 'post_gallery_style',
		'type'    => 'radio_inline',
		'options' => array(
			'slide'   		=> esc_html__( 'Slider', 'monica_theme' ),
			'masonry' 		=> esc_html__( 'Masonry', 'monica_theme' ),
		),
		'default'		=> 'slide'
	) );

	// Post Link Format Settings
	$monica_theme_post_gallery_meta = new_cmb2_box( array(
		'id'            => 'monica_theme_link_post_format_settings',
		'title'         => esc_html__( 'Link Post Format Settings', 'monica_theme' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true,
	) );
	$monica_theme_post_gallery_meta->add_field( array(
		'name' => esc_html__( 'Post Link', 'monica_theme' ),
		'id'   => $prefix . 'post_link',
		'type' => 'text_url',
	) );


	// Heading Settings
	$monica_heading_meta = new_cmb2_box( array(
		'id'            => 'monica_heading_settings',
		'title'         => esc_html__( 'Heading Settings', 'monica_theme' ),
		'object_types'  => array( 'post','page','portfolio', 'product' ), // Post type
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true,
	) );
	$monica_heading_meta->add_field( array(
		'name' => esc_html__( 'Hidden Heading', 'monica_theme' ),
		'id'   => $prefix . 'hidden_heading',
		'type' => 'checkbox',
	) );
	$monica_heading_meta->add_field( array(
		'name' => esc_html__( 'Heading Title', 'monica_theme' ),
		'id'   => $prefix . 'custom_heading_title',
		'type' => 'text',
	) );
	$monica_heading_meta->add_field( array(
		'name' => esc_html__( 'Heading Description', 'monica_theme' ),
		'id'   => $prefix . 'custom_heading_desc',
		'type' => 'text',
	) );
	$monica_heading_meta->add_field( array(
		'name' 		=> esc_html__( 'Heading Size', 'monica_theme' ),
		'id'   		=> $prefix . 'custom_heading_size',
		'type' 		=> 'radio_inline',
	    'options'   => array(
            'small'     => 'Small',
            'medium'    => 'Medium',
            'large'     => 'Large',
        ),
        'default'   => monica_option_data( 'select_page_heading_size' ),
	) );
	$monica_heading_meta->add_field( array(
		'name' 		=> esc_html__( 'Background Color', 'monica_theme' ),
		'id'   		=> $prefix . 'custom_heading_bgcolor',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	        'white'     => 'White',
	        'gray'      => 'Gray',
	        'black'     => 'Black',
	        'bg'        => 'Custom Background'
	    ),
	    'default'  	 => monica_option_data( 'select_page_heading_bgcolor' ),
	) );
	$heading_bg = monica_option_data( 'media_heading_bg' );
	if ( $heading_bg && isset( $heading_bg['url'] )) {
		$heading_bg = $heading_bg['url'];
	} else {
		$heading_bg = '';
	}
	$monica_heading_meta->add_field( array(
		'name'    => esc_html__( 'Heading Background', 'monica_theme' ),
		'id'      => $prefix . 'custom_heading_background',
		'type'    => 'file',
		'default'  	 => $heading_bg,
		'attributes' => array(
            'data-conditional-id'       => $prefix . 'custom_heading_bgcolor',
            'data-conditional-value'    => 'bg',
        )
	) );
	$monica_heading_meta->add_field( array(
		'name'    => esc_html__( 'Heading Text Color', 'monica_theme' ),
		'id'      => $prefix . 'custom_heading_text_color',
		'type' 		=> 'radio_inline',
		'options'   => array(
	        'white'     => 'White',
	        'black'     => 'Black',
	    ),
	    'default'  	 => monica_option_data( 'select_page_heading_text_color'),
		'attributes' => array(
            'data-conditional-id'       => $prefix . 'custom_heading_bgcolor',
            'data-conditional-value'    => 'bg',
        )
	) );
	$monica_heading_meta->add_field( array(
		'name' 		=> esc_html__( 'Header Position', 'monica_theme' ),
		'id'   		=> $prefix . 'custom_header_position',
		'type' 		=> 'radio_inline',
	    'options'   => array(
            'default'     	=> 'Normal',
            'on-top'    	=> 'On Top',
        ),
        'default'   => 'default',
	) );
	$monica_heading_meta->add_field( array(
		'name' 		=> esc_html__( 'Header Color', 'monica_theme' ),
		'id'   		=> $prefix . 'custom_header_color',
		'type' 		=> 'radio_inline',
	    'options'   => array(
            'black-color'     	=> 'Black',
            'white-color'    	=> 'White',
        ),
        'default'   => 'black-color',
	) );

	// Page Meta
	$monica_page_meta = new_cmb2_box( array(
		'id'            => 'monica_page_sidebar_settings',
		'title'         => esc_html__( 'Sidebar Settings', 'monica_theme' ),
		'object_types'  => array( 'page', 'post' ),
		'context'       => 'side',
		'priority'      => 'low',
		'show_names'    => true,
	) );
	$monica_page_meta->add_field( array(
		'name'    => esc_html__( 'Choose Widgets Sidebar', 'monica_theme' ),
		'id'      => $prefix . 'radio_widget_sidebar',
		'type'    => 'radio',
		'options' => $sidebar_item,
		'default' => 'default-sidebar'
	) );
	$monica_page_meta->add_field( array(
		'name'    => esc_html__( 'Choose Sidebar Layout', 'monica_theme' ),
		'id'      => $prefix . 'radio_sidebar_layout',
		'type'    => 'radio',
		'options' => array(
			'sidebar-content' 		=> esc_html__( 'Left Sidebar', 'monica_theme' ),
			'content-sidebar' 		=> esc_html__( 'Right Sidebar', 'monica_theme' ),
			'fullwidth'   			=> esc_html__( 'Full Page', 'monica_theme' ),
		),
		'default'		=> monica_option_data( 'select_post_sidebar' )
	) );
	$monica_page_meta->add_field( array(
		'name'    => esc_html__( '100% Page Width', 'monica_theme' ),
		'id'      => $prefix . 'full_page_width',
		'type'    => 'checkbox',
		'desc'	  => 'Only use this setting when you edit with Page Builder.'
	) );

	// Portfolio Meta
	$monica_portfolio_meta = new_cmb2_box( array(
		'id'            => 'monica_portfolio_meta_settings',
		'title'         => esc_html__( 'Portfolio Settings', 'monica_theme' ),
		'object_types'  => array( 'portfolio' ),
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true,
	) );
	$monica_portfolio_meta->add_field( array(
		'name' 		=> esc_html__( 'Portfolio Layout', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_layout',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'normal'     			=> 'Default',
            'content-sidebar'    	=> 'Right Sidebar',
            'sidebar-content'    	=> 'Left Sidebar',
            'fullwidth'     		=> 'Full Width',
            'vs'     				=> 'Custom Layout',
        ),
        'default'   => 'normal',
	) );
	$monica_portfolio_meta->add_field( array(
		'name' 		=> esc_html__( 'Portfolio Format', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_format',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'normal'     => 'Normal',
            'media'    	 => 'Media',
            'gallery'    => 'Gallery',
            'slider'     => 'Slider',
        ),
        'default'   => 'normal',
	) );
	$monica_portfolio_meta->add_field( array(
		'name' 		=> esc_html__( 'Media Position', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_media_pos',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'top'    => 'Top Area',
            'con'    => 'Content Area',
        ),
        'default'   => 'top',
	) );
	$monica_portfolio_meta->add_field( array(
		'name' 		=> esc_html__( 'Section Style', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_section_style',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'fullwidth'    => 'Full Width',
            'container'    => 'Fixed Width',
        ),
        'default'   	=> 'container',
        'attributes' 	=> array(
            'data-conditional-id'       => $prefix . 'portfolio_media_pos',
            'data-conditional-value'    => 'top',
        )
	) );
	$monica_portfolio_meta->add_field( array(
		'name' 		=> esc_html__( 'Gutter Style', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_gutter_style',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'nospace'   => 'No Margin',
            'small'    	=> 'Small',
            'normal'    => 'Normal',
        ),
        'default'   => 'normal',
        'attributes' => array(
            'data-conditional-id'       => $prefix . 'portfolio_format',
            'data-conditional-value'    => 'gallery',
        )
	) );
	$monica_portfolio_meta->add_field( array(
		'name' 		=> esc_html__( 'Gallery Settings', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_gallery_col',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'6'     => '2 Columns',
            '4'    	=> '3 Columns',
            '3'    	=> '4 Columns',
            '2'     => '6 Columns',
        ),
        'default'   => '3',
        'attributes' => array(
            'data-conditional-id'       => $prefix . 'portfolio_format',
            'data-conditional-value'    => 'gallery',
        )
	) );
	$monica_portfolio_meta->add_field( array(
		'name' 		=> esc_html__( 'Number of Slider', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_slider_number',
		'type' 		=> 'text',
        'default'   => '4',
        'attributes' => array(
            'data-conditional-id'       => $prefix . 'portfolio_format',
            'data-conditional-value'    => 'slider',
        )
	) );
	$monica_portfolio_meta->add_field( array(
	    'name' => 'Upload your images',
	    'desc' => '',
	    'id' => $prefix . 'portfolio_format_gallery',
	    'type' => 'file_list',
	) );
	$monica_portfolio_meta->add_field( array(
	    'name' => 'Media Thumbnail',
	    'desc' => '',
	    'id' => $prefix . 'portfolio_format_media_thumbnail',
	    'type' => 'file',
	    'attributes' => array(
            'data-conditional-id'       => $prefix . 'portfolio_format',
            'data-conditional-value'    => 'media',
        )
	) );
	$monica_portfolio_meta->add_field( array(
		'name' => esc_html__( 'Media URL', 'monica_theme' ),
		'desc' => esc_html__( 'Insert custom media URL Video & Audio Posts. Vimeo, Youtube and Sound Cloud', 'monica_theme' ),
		'id'   => $prefix . 'portfolio_format_media',
		'type' => 'oembed',
		'attributes' => array(
            'data-conditional-id'       => $prefix . 'portfolio_format',
            'data-conditional-value'    => 'media',
        )
	) );
	$monica_portfolio_metag_group = $monica_portfolio_meta->add_field( array(
			'id'          => $prefix . 'portfolio_meta_group',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => esc_html__( 'Meta {#}', 'monica_theme' ), // {#} gets replaced by row number
				'add_button'    => esc_html__( 'Add Another Meta', 'monica_theme' ),
				'remove_button' => esc_html__( 'Remove Meta', 'monica_theme' ),
				'sortable'      => true,
			),
	) );
	$monica_portfolio_meta->add_group_field( $monica_portfolio_metag_group, array(
		'name'       => esc_html__( 'Meta Title', 'monica_theme' ),
		'id'         => 'title',
		'type'       => 'text',
	) );
	$monica_portfolio_meta->add_group_field( $monica_portfolio_metag_group, array(
		'name'       => esc_html__( 'Meta Content', 'monica_theme' ),
		'id'         => 'content',
		'type'    	 => 'textarea_small',
	) );

	// Portfolio Page
	$monica_portfolio_page_meta = new_cmb2_box( array(
		'id'            => 'monica_portfolio_page',
		'title'         => esc_html__( 'Portfolio Page Settings', 'monica_theme' ),
		'object_types'  => array( 'page' ),
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true,
	) );
	$monica_portfolio_page_meta->add_field( array(
		'name' 		=> esc_html__( 'Gutter', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_page_gutter',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'nospace'   => 'No Margin',
            'small'    	=> 'Small',
            'normal'   	=> 'Normal',
        ),
        'default'   => 'normal',
	) );
	$monica_portfolio_page_meta->add_field( array(
		'name' 		=> esc_html__( 'Columns', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_page_columns',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'6'   	=> '2 Columns',
            '4'    	=> '3 Columns',
            '3'   	=> '4 Columns',
            '2'   	=> '6 Columns',
        ),
        'default'   => '4',
	) );
	$monica_portfolio_page_meta->add_field( array(
		'name' 		=> esc_html__( 'Portfolio Item Style', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_page_pistyle',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'default'   	=> 'Default',
            'title-bottom'  => 'Text',
        ),
        'default'   => 'default',
	) );
	$monica_portfolio_page_meta->add_field( array(
		'name' 		=> esc_html__( 'Portfolio Style', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_page_pstyle',
		'type' 		=> 'radio_inline',
	    'options'   => array(
	    	'default'   	=> 'Default',
            'masonry'    	=> 'Masonry',
        ),
        'default'   => 'default',
	) );
	$monica_portfolio_page_meta->add_field( array(
		'name' 		=> esc_html__( 'Portfolio Number', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_page_pnumber',
		'type' 		=> 'text',
        'default'   => '12',
	) );
	$monica_portfolio_page_meta->add_field( array(
		'name' 		=> esc_html__( 'Portfolio Filter', 'monica_theme' ),
		'id'   		=> $prefix . 'portfolio_filter',
		'type' 		=> 'checkbox',
	) );
}