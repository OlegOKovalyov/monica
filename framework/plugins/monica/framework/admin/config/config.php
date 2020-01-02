<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $opt_name = "_monica_option";
    $cf7 = array();
    $args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
    if( $cf7Forms = get_posts( $args ) ){
        foreach($cf7Forms as $cf7Form){
            $cf7[$cf7Form->ID] = $cf7Form->post_title;
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'monica_theme' ),
        'page_title'           => esc_html__( 'Theme Options', 'monica_theme' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyBu4c6pGY_auWMszOX2agP4ja2VlEWsfeE',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => true,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,
        // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'disable_tracking'     => true,
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.vasca.net/monica/',
        'title' => esc_html__( 'Documentation', 'monica_theme' ),
    );
    $args['admin_bar_links'][] = array(
        'href'  => 'http://vascathemes.ticksy.com/',
        'title' => esc_html__( 'Support', 'monica_theme' ),
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/vascathemes',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/vascathemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $erlbs_columns = array('Disable',1,2,3,4,5,6,7,8,9,10,11,12);

    // Add content after the form.
    $args['footer_text'] = __( '', 'monica_theme' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General', 'monica_theme' ),
        'id'    => 'site-general',
        'desc'  => __( '', 'monica_theme' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Branding', 'monica_theme' ),
        'id'         => 'site-branding',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'media_favicon',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Site Favicon', 'monica_theme' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload any media using the WordPress native uploader. Minimum size 200x200 px', 'monica_theme' ),
            ),
            array(
                'id'       => 'media_white_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo for White Background', 'monica_theme' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload any media using the WordPress native uploader', 'monica_theme' ),
                'default'  => array( 'url' => get_template_directory_uri().'/assets/image/logo-black.png' ),
            ),
            array(
                'id'       => 'media_black_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo for Black Background', 'monica_theme' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload any media using the WordPress native uploader', 'monica_theme' ),
                'default'  => array( 'url' => get_template_directory_uri().'/assets/image/logo.png' ),
            ),
            array(
                'id'             => 'media_logo_dimensions',
                'type'           => 'dimensions',
                'subtitle'       => esc_html__( 'Enter your logo dimensions display for all devices', 'monica_theme' ),
                'units'          => array( 'px' ),
                'units_extended' => 'true',
                'title'          => esc_html__( 'Logo Dimensions', 'redux-framework-demo' ),
                'default'        => array(
                    'width'  => 133,
                    'height' => 25,
                ),
                'output' => '.site-logo img',
            ),
            array(
                'id'        => 'spacing_logo',
                'output'        => array('.logo-area'),
                'type'      => 'spacing',
                'mode'      => 'margin',
                'title'     => esc_html__('Logo Spacing', 'monica_theme'),
                'units'         => 'px',
                'right' => false,
                'left' => false,
                'default' => array(
                    'margin-top' => '0px',
                    'margin-bottom' => '0px',
                ),
                'subtitle'       => esc_html__( 'Margin top and bottom in pixel', 'monica_theme' ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'monica_theme' ),
        'id'         => 'site-social',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'text-facebook',
                'type'      => 'text',
                'title'     => esc_html__('Facebook URL', 'monica_theme'),
                'subtitle'  => esc_html__('Enter your Facebook username', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-twitter',
                'type'      => 'text',
                'title'     => esc_html__('Twitter URL', 'monica_theme'),
                'subtitle'  => esc_html__('Enter your Twitter username', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-linkedin',
                'type'      => 'text',
                'title'     => esc_html__('LinkedIn URL', 'monica_theme'),
                'subtitle'  => esc_html__('This must be a URL.', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-googleplus',
                'type'      => 'text',
                'title'     => esc_html__('Google Plus URL', 'monica_theme'),
                'subtitle'  => esc_html__('This must be a URL.', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-youtube',
                'type'      => 'text',
                'title'     => esc_html__('Youtube URL', 'monica_theme'),
                'subtitle'  => esc_html__('This must be a URL.', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-flickr',
                'type'      => 'text',
                'title'     => esc_html__('Flickr URL', 'monica_theme'),
                'subtitle'  => esc_html__('This must be a URL.', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-vimeo',
                'type'      => 'text',
                'title'     => esc_html__('Vimeo URL', 'monica_theme'),
                'subtitle'  => esc_html__('This must be a URL.', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-dribbble',
                'type'      => 'text',
                'title'     => esc_html__('Dribbble URL', 'monica_theme'),
                'subtitle'  => esc_html__('This must be a URL.', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-pinterest',
                'type'      => 'text',
                'title'     => esc_html__('Pinterest URL', 'monica_theme'),
                'subtitle'  => esc_html__('This must be a URL.', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'text-instagram',
                'type'      => 'text',
                'title'     => esc_html__('Instagram URL', 'monica_theme'),
                'subtitle'  => esc_html__('This must be a URL.', 'monica_theme'),
                'validate'  => 'url',
            ),
            array(
                'id'        => 'checkbox-rss',
                'type'      => 'checkbox',
                'title'     => esc_html__('Show RSS Link', 'monica_theme'),
                'default'   => '1',
            ),
        )
    ) );

    // -> START Layout
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Layout', 'monica_theme' ),
        'id'    => 'site-layouts',
        'icon'  => 'el el-view-mode',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Layout', 'monica_theme' ),
        'id'         => 'site-layout',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'switch-fixed-preloader',
                'type'      => 'switch',
                'title'     => esc_html__('Preloader', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
            ),
            array(
                'id'        => 'select_layout_style',
                'type'      => 'button_set',
                'title'     => esc_html__('Layout Style', 'monica_theme'),
                'subtitle'      => esc_html__('Choose your layout style', 'monica_theme'),
                'options'   => array(
                    'fullwidth'    => 'Full Width',
                    'container'    => 'Boxed',
                    'margin'        => 'Margin',
                ),
                'default'   => 'fullwidth',
            ),
            array(
                'required' => array(array('select_layout_style', '!=', 'fullwidth')),
                'id'       => 'site_bg',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Layout Background', 'monica_theme' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload any media using the WordPress native uploader', 'monica_theme' ),
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header', 'monica_theme' ),
        'id'         => 'site-header',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'switch-header-cart',
                'type'      => 'switch',
                'title'     => esc_html__('Cart Menu', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
                'subtitle'  => esc_html__( 'Enable cart menu fuction', 'monica_theme' ),
            ),

            array(
                'id'        => 'switch-header-search',
                'type'      => 'switch',
                'title'     => esc_html__('Search Menu', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
                'subtitle'  => esc_html__( 'Enable header search', 'monica_theme' ),
            ),

            array(
                'id'        => 'switch-header-social',
                'type'      => 'switch',
                'title'     => esc_html__('Header Social', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
                'subtitle'  => esc_html__( 'Display Social Media Link', 'monica_theme' ),
            ),

            array(
                'id'        => 'switch-header-notice',
                'type'      => 'switch',
                'title'     => esc_html__('Header Notice', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
            ),

            array(
                'required'  => array(array('switch-header-notice', '=', '1')),
                'id'        => 'text-header-phone',
                'type'      => 'text',
                'title'     => esc_html__('Phone Number', 'monica_theme'),
                'default'   => '0123 456 789'
            ),

            array(
                'required'  => array(array('switch-header-notice', '=', '1')),
                'id'        => 'text-header-email',
                'type'      => 'text',
                'title'     => esc_html__('Email', 'monica_theme'),
                'default'   => 'hello@example.com'
            ),

            array(
                'required'  => array(array('switch-header-notice', '=', '1')),
                'id'        => 'text-header-time',
                'type'      => 'text',
                'title'     => esc_html__('Working Time', 'monica_theme'),
                'default'   => '08 AM - 05 PM'
            ),

        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Heading', 'monica_theme' ),
        'id'         => 'site-heading',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'select_page_heading_size',
                'type'      => 'button_set',
                'title'     => esc_html__('Page Heading Size', 'monica_theme'),
                'subtitle'      => esc_html__('Choose your page heading layout size', 'monica_theme'),
                'options'   => array(
                    'small'     => 'Small',
                    'medium'    => 'Medium',
                    'large'     => 'Large',
                ),
                'default'   => 'small',
            ),

            array(
                'id'        => 'select_page_heading_bgcolor',
                'type'      => 'button_set',
                'title'     => esc_html__('Page Heading Background Color', 'monica_theme'),
                'subtitle'      => esc_html__('Choose your page heading background color', 'monica_theme'),
                'options'   => array(
                    'white'     => 'White',
                    'gray'      => 'Gray',
                    'black'     => 'Black',
                    'bg'        => 'Custom Background'
                ),
                'default'   => 'gray',
            ),

            array(
                'required' => array(array('select_page_heading_bgcolor', '=', 'bg')),
                'id'       => 'media_heading_bg',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Page Heading Background', 'monica_theme' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload any media using the WordPress native uploader', 'monica_theme' ),
            ),

            array(
                'required'  => array(array('select_page_heading_bgcolor', '=', 'bg')),
                'id'        => 'select_page_heading_text_color',
                'type'      => 'button_set',
                'title'     => esc_html__('Page Heading Text Color', 'monica_theme'),
                'subtitle'      => esc_html__('Choose your page heading text color', 'monica_theme'),
                'options'   => array(
                    'white'     => 'White',
                    'black'     => 'Black',
                ),
                'default'   => 'white',
            ),

        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer', 'monica_theme' ),
        'id'         => 'site-footer',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'switch_footer_widget',
                'type'      => 'switch',
                'title'     => esc_html__('Use Footer Widget ?', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => false,
            ),
            array(
                'id'        => 'select_footer_widget_1_width',
                'required'  => array(array('switch_footer_widget', '=', true)),
                'title'     => esc_html__('Footer Widget 1 Width', 'monica_theme'),
                'subtitle'  => esc_html__('Select your footer widget 1 width.', 'monica_theme'),
                'type'          => 'slider',
                'default'       => 4,
                'min'           => 0,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label'
            ),
            array(
                'id'        => 'select_footer_widget_2_width',
                'required'  => array(array('switch_footer_widget', '=', true)),
                'title'     => esc_html__('Footer Widget 2 Width', 'monica_theme'),
                'subtitle'  => esc_html__('Select your footer widget 2 width.', 'monica_theme'),
                'type'          => 'slider',
                'default'       => 4,
                'min'           => 0,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label'
            ),
            array(
                'id'        => 'select_footer_widget_3_width',
                'required'  => array(array('switch_footer_widget', '=', true)),
                'title'     => esc_html__('Footer Widget 3 Width', 'monica_theme'),
                'subtitle'  => esc_html__('Select your footer widget 3 width.', 'monica_theme'),
                'type'          => 'slider',
                'default'       => 4,
                'min'           => 0,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label'
            ),
            array(
                'id'        => 'select_footer_widget_4_width',
                'required'  => array(array('switch_footer_widget', '=', true)),
                'title'     => esc_html__('Footer Widget 4 Width', 'monica_theme'),
                'subtitle'  => esc_html__('Select your footer widget 4 width.', 'monica_theme'),
                'type'          => 'slider',
                'default'       => 4,
                'min'           => 0,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label'
            ),
            array(
                'id'        => 'select_footer_widget_5_width',
                'required'  => array(array('switch_footer_widget', '=', true)),
                'title'     => esc_html__('Footer Widget 5 Width', 'monica_theme'),
                'subtitle'  => esc_html__('Select your footer widget 5 width.', 'monica_theme'),
                'type'          => 'slider',
                'default'       => 4,
                'min'           => 0,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label'
            ),
            array(
                'id'        => 'select_footer_widget_6_width',
                'required'  => array(array('switch_footer_widget', '=', true)),
                'title'     => esc_html__('Footer Widget 6 Width', 'monica_theme'),
                'subtitle'  => esc_html__('Select your footer widget 6 width.', 'monica_theme'),
                'type'          => 'slider',
                'default'       => 4,
                'min'           => 0,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label'
            ),
            array(
                'id'        => 'editor_footer_copyright',
                'type'      => 'editor',
                'title'     => esc_html__('Footer Copyright Text', 'monica_theme'),
                'default'   => 'MONICA WordPress Theme by VASCA',
            ),
        ),
    ) );

    // -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Content', 'monica_theme' ),
        'id'    => 'site-content',
        'desc'  => __( '', 'monica_theme' ),
        'icon'  => 'el el-file'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'monica_theme' ),
        'id'         => 'site-archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'select_archive_style',
                'type'      => 'button_set',
                'title'     => esc_html__('Main Post Layout', 'monica_theme'),
                'subtitle'      => esc_html__('Choose your Default Blog Layout', 'monica_theme'),
                'options'   => array(
                    'default'   => 'Normal',
                    'medium'    => 'Medium',
                    'masonry'   => 'Masonry',
                ),
                'default'   => 'default',
            ),
            array(
                'id'        => 'select_archive_columns',
                'required'  => array(array('select_archive_style', '!=', 'normal')),
                'type'      => 'button_set',
                'title'     => esc_html__('Main Post Columns', 'monica_theme'),
                'subtitle'      => esc_html__('Select columns to display', 'monica_theme'),
                'options'   => array(
                    '3'         => '4 Columns',
                    '4'         => '3 Columns',
                    '6'         => '2 Columns',
                ),
                'default'   => '4',
            ),
            array(
                'id'        => 'select_post_sidebar',
                'type'      => 'button_set',
                'title'     => esc_html__('Main Blog Sidebar', 'monica_theme'),
                'subtitle'      => esc_html__('Choose your default blog sidebar', 'monica_theme'),
                'options'   => array(
                    'sidebar-content'       => 'Left Sidebar',
                    'content-sidebar'       => 'Right Sidebar',
                    'fullwidth'             => 'Full Width',
                ),
                'default'   => 'content-sidebar',
            ),
            array(
                'id'        => 'text_excerptlength',
                'type'      => 'text',
                'title'     => esc_html__('Blog Excerpt Length', 'monica_theme'),
                'subtitle'  => esc_html__('Default: 30', 'monica_theme'),
                'desc'      => esc_html__('Used for blog page, archives & search results.', 'monica_theme'),
                'validate'  => 'numeric',
                'default'   => '30',
            ),
            array(
                'id'        => 'switch_comment_posts',
                'type'      => 'switch',
                'title'     => esc_html__('Show Comment ?', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
            ),
            array(
                'id'        => 'switch_recent_posts',
                'type'      => 'switch',
                'title'     => esc_html__('Show Recent Posts ?', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
            ),
            array(
                'id'        => 'switch_post_author',
                'type'      => 'switch',
                'title'     => esc_html__('Show Author Box ?', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'monica_theme' ),
        'id'         => 'site-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'select_page_sidebar',
                'type'      => 'button_set',
                'title'     => esc_html__('Main Page Sidebar', 'monica_theme'),
                'subtitle'      => esc_html__('Choose your default blog sidebar', 'monica_theme'),
                'options'   => array(
                    'content-sidebar'       => 'Left Sidebar',
                    'fullwidth'              => 'Full Width',
                ),
                'default'   => 'content-sidebar',
            ),
            array(
                'id'        => 'switch_comment_page',
                'type'      => 'switch',
                'title'     => esc_html__('Show Comment ?', 'monica_theme'),
                'on'        => 'Enabled',
                'off'       => 'Disabled',
                'default'   => true,
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Portfolio', 'monica_theme' ),
        'id'         => 'site-portfolio',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'select_portfolio_columns',
                'type'      => 'button_set',
                'title'     => esc_html__('Portfolio Columns', 'monica_theme'),
                'subtitle'      => esc_html__('Choose default portfolio columns', 'monica_theme'),
                'options'   => array(
                    '3'       => '4 Columns',
                    '4'       => '3 Columns',
                    '6'       => '6 Columns',
                ),
                'default'   => '3',
            ),
            array(
                'id'        => 'select_portfolio_container',
                'type'      => 'button_set',
                'title'     => esc_html__('Portfolio Wrap', 'monica_theme'),
                'subtitle'      => esc_html__('Choose default portfolio columns', 'monica_theme'),
                'options'   => array(
                    'container-full'       => 'Full Width',
                    'container'            => 'Fixed',
                ),
                'default'   => 'container',
            ),
            array(
                'id'        => 'select_portfolio_row',
                'type'      => 'button_set',
                'title'     => esc_html__('Portfolio Gutter Style', 'monica_theme'),
                'subtitle'      => esc_html__('Choose default portfolio style', 'monica_theme'),
                'options'   => array(
                    'nospace'       => 'No Margin',
                    'normal'        => 'Normal',
                ),
                'default'   => 'nospace',
            ),
            array(
                'id'        => 'select_portfolio_style',
                'type'      => 'button_set',
                'title'     => esc_html__('Portfolio Style', 'monica_theme'),
                'subtitle'      => esc_html__('Choose default portfolio style', 'monica_theme'),
                'options'   => array(
                    'overlay'               => 'Overlay',
                    'title-bottom'          => 'Title',
                ),
                'default'   => 'overlay',
            ),
            array(
                'id'        => 'text_portfolioslug',
                'type'      => 'text',
                'title'     => esc_html__('Portfolio Slug', 'material'),
                'desc'      => esc_html__('Enter the URL Slug for your Portfolio (Default: portfolio-item) <br /><strong>Go save your permalinks after changing this.</strong>', 'material'),
                'default'   => 'portfolio-item',
            ),
            array(
                'id'        => 'text_portfolio_category_slug',
                'type'      => 'text',
                'title'     => esc_html__('Custom Category Slug', 'material'),
                'desc'      => esc_html__('Enter the Category Taxonomy Slug for your Portfolio (Default: portfolio_category) <br /><strong>Go save your permalinks after changing this.</strong>', 'material'),
                'default'   => 'portfolio_category',
            ),
            array(
                'id'        => 'text_portfolio_tag_slug',
                'type'      => 'text',
                'title'     => esc_html__('Custom Tag Slug', 'material'),
                'desc'      => esc_html__('Enter the Tag Taxonomy Slug for your Portfolio (Default: portfolio_tag) <br /><strong>Go save your permalinks after changing this.</strong>', 'material'),
                'default'   => 'portfolio_tag',
            ),
        )
    ) );

    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Design', 'monica_theme' ),
        'id'    => 'site-design',
        'desc'  => __( '', 'monica_theme' ),
        'icon'  => 'el el-brush'
    ) );
    Redux::setSection( $opt_name, array(
        'title'         => esc_html__( 'Typography', 'monica_theme' ),
        'id'            => 'typography',
        'subsection'    => true,
        'fields'        => array(
            array(
                'id'        => 'typography-body',
                'type'      => 'typography',
                'title'     => esc_html__('Body Font', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the body font properties.', 'monica_theme'),
                'google'    => true,
                'text-align' => false,
                'all_styles'    => true,
                'output'        => array('body'),
                'default'   => array(
                    'color'         => '#666',
                    'font-size'     => '15px',
                    'line-height'   => '26.2px',
                    'font-family'   => 'Hind',
                    'font-weight'   => '400',
                ),
            ),
            array(
                'id'        => 'general-font',
                'type'      => 'typography',
                'title'     => esc_html__('General Fonts', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the heading font properties.', 'monica_theme'),
                'google'    => true,
                'text-align' => false,
                'all_styles'    => true,
                'output'        => array('.site-header ul ul li a'),
                'color' => false,
                'font-size' => false,
                'line-height' => false,
                'font-weight' => false,
                'default'   => array(
                    'font-family'   => 'Hind',
                ),
            ),
            array(
                'id'        => 'typography-heading',
                'type'      => 'typography',
                'title'     => esc_html__('Heading Fonts', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the heading font properties.', 'monica_theme'),
                'google'    => true,
                'text-align' => false,
                'all_styles'    => true,
                'output'        => array('.woocommerce-tabs ul.tabs.wc-tabs'),
                'color' => false,
                'font-size' => false,
                'line-height' => false,
                'font-weight' => false,
                'default'   => array(
                    'font-family'   => 'Poppins',
                ),
            ),
            array(
                'id'        => 'typography-h1',
                'type'      => 'typography',
                'title'     => esc_html__('Heading 1', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the H1 font properties.', 'monica_theme'),
                'google'    => true,
                'text-align' => false,
                'all_styles'    => true,
                'output'        => array('h1'),
                'default'   => array(
                    'color'         => '#000',
                    'font-size'     => '22px',
                    'line-height'   => '28px',
                    'font-family'   => 'Poppins',
                    'font-weight'   => '700',
                ),
            ),
            array(
                'id'        => 'typography-h2',
                'type'      => 'typography',
                'title'     => esc_html__('Heading 2', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the H2 font properties.', 'monica_theme'),
                'google'    => true,
                'text-align' => false,
                'all_styles'    => true,
                'output'        => array('h2'),
                'default'   => array(
                    'color'         => '#000',
                    'font-size'     => '20px',
                    'line-height'   => '26px',
                    'font-family'   => 'Poppins',
                    'font-weight'   => '700',
                ),
            ),
            array(
                'id'        => 'typography-h3',
                'type'      => 'typography',
                'title'     => esc_html__('Heading 3', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the H3 font properties.', 'monica_theme'),
                'google'    => true,
                'text-align' => false,
                'all_styles'    => true,
                'output'        => array('h3'),
                'default'   => array(
                    'color'         => '#000',
                    'font-size'     => '18px',
                    'line-height'   => '24px',
                    'font-family'   => 'Poppins',
                    'font-weight'   => '700',
                ),
            ),
            array(
                'id'        => 'typography-h4',
                'type'      => 'typography',
                'title'     => esc_html__('Heading 4', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the H4 font properties.', 'monica_theme'),
                'google'    => true,
                'output'        => array('h4'),
                'text-align' => false,
                'all_styles'    => true,
                'default'   => array(
                    'color'         => '#000',
                    'font-size'     => '16px',
                    'line-height'   => '22px',
                    'font-family'   => 'Poppins',
                    'font-weight'   => '700',
                ),
            ),
            array(
                'id'        => 'typography-h5',
                'type'      => 'typography',
                'title'     => esc_html__('Heading 5', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the H5 font properties.', 'monica_theme'),
                'google'    => true,
                'text-align' => false,
                'all_styles'    => true,
                'output'        => array('h5'),
                'default'   => array(
                    'color'         => '#000',
                    'font-size'     => '14px',
                    'line-height'   => '20px',
                    'font-family'   => 'Poppins',
                    'font-weight'   => '700',
                ),
            ),
            array(
                'id'        => 'typography-h6',
                'type'      => 'typography',
                'title'     => esc_html__('Heading 6', 'monica_theme'),
                'subtitle'  => esc_html__('Specify the H6 font properties.', 'monica_theme'),
                'google'    => true,
                'text-align' => false,
                'all_styles'    => true,
                'output'        => array('h6'),
                'default'   => array(
                    'color'         => '#000',
                    'font-size'     => '12px',
                    'line-height'   => '23px',
                    'font-family'   => 'Poppins',
                    'font-weight'   => '700',
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'         => esc_html__( 'Theme Color', 'monica_theme' ),
        'id'            => 'theme_color',
        'subsection'    => true,
        'fields'        => array(
            array(
                'id' => 'color-main-theme',
                'type' => 'color',
                'title' => esc_html__('Main Background Color', 'er'),
                'subtitle' => esc_html__('Pick a background color for the main site.', 'er'),
                'default' => '#FEFFDE',
                'validate' => 'color',
                'output' => array(
                    'border-bottom-color' => ( '.footer-widgets .widget .widget-title h4' ),
                    'background-color'    => ( '.site-header .extra-menu ul li.search a:hover,.site-header .extra-menu ul li.cart .cart-total,.entry-item:before,.entry-item.format-quote:before,.title-round h4:after,.widget .widget-title:after,.widget.widget-flickr .flickr_badge_image:before,.pricing-plan:hover,.progress-bar .progress-status,.team-member .team-member-info,.servicebox:hover' ),
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'         => esc_html__( 'Custom CSS', 'monica_theme' ),
        'id'            => 'theme_custom_css',
        'subsection'    => true,
        'fields'        => array(
            array(
                'id'       => 'ace_editor_custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Code', 'er' ),
                'subtitle' => esc_html__( 'Paste your CSS code here.', 'er' ),
                'mode'     => 'css',
                'theme'    => 'chrome',
                'default'  => "#yourid{\nmargin: 0 auto;\n}"
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'         => esc_html__( 'Sidebar', 'monica_theme' ),
        'id'            => 'theme_sidebar',
        'icon'          => 'el el-list',
        'fields'        => array(
            array(
                'id'        => 'multi_text_sidebar',
                'type'      => 'multi_text',
                'title'     => esc_html__('Sidebar Generator', 'monica_theme'),
                'subtitle'  => esc_html__('Enter the name of the sidebar you want to create', 'monica_theme')
            ),
        )
    ) );
    /*
     * <--- END SECTIONS
     */