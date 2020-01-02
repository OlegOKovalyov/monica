<?php

// Post Categories
$categories = get_categories();
$monica_cat = array();
foreach ($categories as $category) {
   $monica_cat[$category->cat_name] = $category->cat_ID;
}

// Animation
$animate_list = array('disable','bounce','flash','pulse','rubberBand','shake','swing','tada','wobble','jello','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','bounceOut','bounceOutDown','bounceOutLeft','bounceOutRight','bounceOutUp','fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig','fadeOut','fadeOutDown','fadeOutDownBig','fadeOutLeft','fadeOutLeftBig','fadeOutRight','fadeOutRightBig','fadeOutUp','fadeOutUpBig','flip','flipInX','flipInY','flipOutX','flipOutY','lightSpeedIn','lightSpeedOut','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','rotateOut','rotateOutDownLeft','rotateOutDownRight','rotateOutUpLeft','rotateOutUpRight','slideInUp','slideInDown','slideInLeft','slideInRight','slideOutUp','slideOutDown','slideOutLeft','slideOutRight','zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp','zoomOut','zoomOutDown','zoomOutLeft','zoomOutRight','zoomOutUp','hinge','rollIn','rollOut');

$attributes = array(
    'type'          => 'dropdown',
    'heading'       => "Animation",
    'param_name'    => 'monica_animate_style',
    'description'   => 'Select animation style',
        "value" => $animate_list,
);
vc_add_param('vc_column', $attributes);
vc_add_param('vc_column_inner', $attributes);
$attributes = array(
    'type'          => 'textfield',
    'heading'       => "Animation Time",
    'param_name'    => 'monica_animate_time',
    'description'   => 'Enter animation time',
    'value'         => '0.1s',
);
vc_add_param('vc_column', $attributes);
vc_add_param('vc_column_inner', $attributes);
$attributes = array(
    'type'          => 'textfield',
    'heading'       => "Animation Delay",
    'param_name'    => 'monica_animate_delay',
    'description'   => 'Enter animation delay',
    'value'         => '0.3s',
);
vc_add_param('vc_column', $attributes);
vc_add_param('vc_column_inner', $attributes);

// Row
$attributes = array(
    'type'          => 'dropdown',
    'heading'       => "Row Style",
    'param_name'    => 'monica_row_style',
    'description'   => 'Select row style',
        "value" => array(
            'Normal'        => 'normal',
            'No Margin'     => 'nospace',
            'Small'         => 'small',
            'Border'        => 'border',
        )
);
vc_add_param('vc_row', $attributes);
$attributes = array(
    'type'          => 'dropdown',
    'heading'       => "Section Style",
    'param_name'    => 'monica_section',
    'description'   => 'Section settings.',
    'value' => array(
            'Normal'               => 'container',
            'Full Width'           => 'container-full',
        ),
);
vc_add_param('vc_row', $attributes);
$attributes = array(
    'type'          => 'checkbox',
    'heading'       => "Math Height All Columns",
    'param_name'    => 'monica_mathheight',
);
vc_add_param('vc_row', $attributes);
$attributes = array(
    'type'          => 'checkbox',
    'heading'       => "Parallax Effect",
    'param_name'    => 'monica_parallax',
);
vc_add_param('vc_row', $attributes);
vc_add_param('vc_column', $attributes);
$attributes = array(
    'type'          => 'attach_image',
    'heading'       => "Parallax Image",
    'param_name'    => 'monica_parallax_image',
    'dependency'    => array(
            'element' => 'monica_parallax',
            'value' => array( 'true' ),
        ),
);
vc_add_param('vc_row', $attributes);
vc_add_param('vc_column', $attributes);

// Button
vc_map(array(
    "name"              => __("Button", 'monica_theme'),
    "base"              => "monica_sc_button",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "dropdown",
            "heading" => __("Button Size", 'monica_theme'),
            "param_name" => "size",
            "value" => array(
                __("Normal", 'monica_theme')        => "normal",
                __("Small", 'monica_theme')         => "small",
                __("Medium", 'monica_theme')        => "medium",
                __("Large", 'monica_theme')         => "large",
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Style", 'monica_theme'),
            "param_name" => "style",
            "value" => array(
                __("Normal", 'monica_theme')          => "normal",
                __("Border", 'monica_theme')          => "border",
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Color", 'monica_theme'),
            "param_name" => "color",
            "value" => array(
                __("Theme Color", 'monica_theme')       => "default",
                __("Black", 'monica_theme')             => "black",
                __("White", 'monica_theme')             => "white",
                __("Blue", 'monica_theme')              => "blue",
                __("Green", 'monica_theme')             => "green",
                __("Red", 'monica_theme')               => "red",
                __("Orange", 'monica_theme')            => "orange",
                __("Semi-Blue", 'monica_theme')         => "blue",
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'monica_theme' ),
            'value' => array(
                esc_html__( 'Disable', 'monica_theme' ) => 'disable',
                esc_html__( 'Font Awesome', 'monica_theme' ) => 'fontawesome',
                esc_html__( 'Thememify', 'monica_theme' ) => 'themify',
                esc_html__( 'Open Iconic', 'monica_theme' ) => 'openiconic',
                esc_html__( 'Typicons', 'monica_theme' ) => 'typicons',
                esc_html__( 'Entypo', 'monica_theme' ) => 'entypo',
                esc_html__( 'Linecons', 'monica_theme' ) => 'linecons',
                esc_html__( 'ET Line', 'monica_theme' ) => 'etline',

            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_thememify',
            'value' => 'ti-camera',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
                'type' => 'themify',
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
            'element' => 'icon_type',
            'value' => 'typicons',
        ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 300, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link URL", 'monica_theme'),
            "param_name" => "link",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link Name", 'monica_theme'),
            "param_name" => "content",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Target", 'monica_theme'),
            "param_name" => "target",
            "value" => array(
                __("Blank", 'monica_theme')                 => "_blank",
                __("Self", 'monica_theme')                  => "_self",
                __("Parent", 'monica_theme')                => "_parent",
                __("Top", 'monica_theme')                   => "_top",
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Icon Box
vc_map(array(
    "name"              => __("Icon Box", 'monica_theme'),
    "base"              => "monica_sc_iconbox",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "dropdown",
            "heading" => __("Icon Style", 'monica_theme'),
            "param_name" => "icon_style",
            "value" => array(
                __("None", 'monica_theme')                 => "none",
                __("Round", 'monica_theme')                => "round",
                __("Solid", 'monica_theme')                => "solid",
                __("Border", 'monica_theme')               => "border",
                __("Round Border", 'monica_theme')         => "round border",
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", 'monica_theme'),
            "param_name" => "style",
            "value" => array(
                __("Normal", 'monica_theme')               => "normal",
                __("Left Icon", 'monica_theme')            => "left",
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'monica_theme' ),
            'value' => array(
                esc_html__( 'Disable', 'monica_theme' ) => 'disable',
                esc_html__( 'Font Awesome', 'monica_theme' ) => 'fontawesome',
                esc_html__( 'Thememify', 'monica_theme' ) => 'themify',
                esc_html__( 'Open Iconic', 'monica_theme' ) => 'openiconic',
                esc_html__( 'Typicons', 'monica_theme' ) => 'typicons',
                esc_html__( 'Entypo', 'monica_theme' ) => 'entypo',
                esc_html__( 'Linecons', 'monica_theme' ) => 'linecons',
                esc_html__( 'ET Line', 'monica_theme' ) => 'etline',

            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_thememify',
            'value' => 'ti-camera',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
                'type' => 'themify',
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
            'element' => 'icon_type',
            'value' => 'typicons',
        ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 300, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", 'monica_theme'),
            "param_name" => "title",
        ),
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'class' => 'messagebox_text',
            'heading' => esc_html__( 'Content', 'monica_theme' ),
            'param_name' => 'content',
            'value' => esc_html__( 'Insert content here ...', 'monica_theme' )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Pricing Box
vc_map(array(
    "name"              => __("Pricing Box", 'monica_theme'),
    "base"              => "monica_sc_pricingbox",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'monica_theme' ),
            'value' => array(
                esc_html__( 'Disable', 'monica_theme' ) => 'disable',
                esc_html__( 'Font Awesome', 'monica_theme' ) => 'fontawesome',
                esc_html__( 'Thememify', 'monica_theme' ) => 'themify',
                esc_html__( 'Open Iconic', 'monica_theme' ) => 'openiconic',
                esc_html__( 'Typicons', 'monica_theme' ) => 'typicons',
                esc_html__( 'Entypo', 'monica_theme' ) => 'entypo',
                esc_html__( 'Linecons', 'monica_theme' ) => 'linecons',
                esc_html__( 'ET Line', 'monica_theme' ) => 'etline',

            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_thememify',
            'value' => 'ti-camera',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
                'type' => 'themify',
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
            'element' => 'icon_type',
            'value' => 'typicons',
        ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 300, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", 'monica_theme'),
            "param_name" => "title",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", 'monica_theme'),
            "param_name" => "desc",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price", 'monica_theme'),
            "param_name" => "price",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Currency", 'monica_theme'),
            "param_name" => "currency",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", 'monica_theme'),
            "param_name" => "link",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link Title", 'monica_theme'),
            "param_name" => "link_title",
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Pricing Feature', 'monica_theme' ),
            'param_name' => 'content',
            'value' => urlencode( json_encode( array(
                array(
                    'title' => esc_html__( 'Feature Line', 'js_composer' ),
                    'desc'  => '80',
                ),
            ) ) ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'monica_theme' ),
                    'param_name' => 'title',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Description', 'monica_theme' ),
                    'param_name' => 'desc',
                    'admin_label' => false
                ),
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Fact Box
vc_map(array(
    "name"              => __("Fact Box", 'monica_theme'),
    "base"              => "monica_sc_factbox",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'monica_theme' ),
            'value' => array(
                esc_html__( 'Disable', 'monica_theme' ) => 'disable',
                esc_html__( 'Font Awesome', 'monica_theme' ) => 'fontawesome',
                esc_html__( 'Thememify', 'monica_theme' ) => 'themify',
                esc_html__( 'Open Iconic', 'monica_theme' ) => 'openiconic',
                esc_html__( 'Typicons', 'monica_theme' ) => 'typicons',
                esc_html__( 'Entypo', 'monica_theme' ) => 'entypo',
                esc_html__( 'Linecons', 'monica_theme' ) => 'linecons',
                esc_html__( 'ET Line', 'monica_theme' ) => 'etline',

            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_thememify',
            'value' => 'ti-camera',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
                'type' => 'themify',
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
            'element' => 'icon_type',
            'value' => 'typicons',
        ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 300, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Number", 'monica_theme'),
            "param_name" => "number",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", 'monica_theme'),
            "param_name" => "title",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", 'monica_theme'),
            "param_name" => "desc",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", 'monica_theme'),
            "param_name" => "style",
            "value" => array(
                __("Normal", 'monica_theme')               => "normal",
                __("Center", 'monica_theme')            => "text-center",
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Image Box
vc_map(array(
    "name"              => __("Image Box", 'monica_theme'),
    "base"              => "monica_sc_imagebox",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "attach_image",
            "heading" => __("Image", 'monica_theme'),
            "param_name" => "img",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Number", 'monica_theme'),
            "param_name" => "number",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", 'monica_theme'),
            "param_name" => "title",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", 'monica_theme'),
            "param_name" => "desc",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Round Box
vc_map(array(
    "name"              => __("Round Box", 'monica_theme'),
    "base"              => "monica_sc_roundbox",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'monica_theme' ),
            'value' => array(
                esc_html__( 'Disable', 'monica_theme' ) => 'disable',
                esc_html__( 'Font Awesome', 'monica_theme' ) => 'fontawesome',
                esc_html__( 'Thememify', 'monica_theme' ) => 'themify',
                esc_html__( 'Open Iconic', 'monica_theme' ) => 'openiconic',
                esc_html__( 'Typicons', 'monica_theme' ) => 'typicons',
                esc_html__( 'Entypo', 'monica_theme' ) => 'entypo',
                esc_html__( 'Linecons', 'monica_theme' ) => 'linecons',
                esc_html__( 'ET Line', 'monica_theme' ) => 'etline',

            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_thememify',
            'value' => 'ti-camera',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
                'type' => 'themify',
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
            'element' => 'icon_type',
            'value' => 'typicons',
        ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 300, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Number", 'monica_theme'),
            "param_name" => "number",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Progress Item
vc_map(array(
    "name"              => __("Progress Item", 'monica_theme'),
    "base"              => "monica_sc_progress_item",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", 'monica_theme'),
            "param_name" => "title",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Percent", 'monica_theme'),
            "param_name" => "percent",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Alert
vc_map(array(
    "name"              => __("Alert", 'monica_theme'),
    "base"              => "monica_sc_alert",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", 'monica_theme'),
            "param_name" => "style",
            "value" => array(
                __("Default", 'monica_theme')              => "default",
                __("Notice", 'monica_theme')               => "notice",
                __("Warning", 'monica_theme')              => "danger",
                __("Information", 'monica_theme')          => "info",
                __("Success", 'monica_theme')              => "success",
            )
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Content', 'monica_theme' ),
            'param_name' => 'content',
            'admin_label' => false
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Promotion Box
vc_map(array(
    "name"              => __("Promotion Box", 'monica_theme'),
    "base"              => "monica_sc_promobox",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "attach_image",
            "heading" => __("Image", 'monica_theme'),
            "param_name" => "img",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", 'monica_theme'),
            "param_name" => "title",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", 'monica_theme'),
            "param_name" => "desc",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", 'monica_theme'),
            "param_name" => "link",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link Title", 'monica_theme'),
            "param_name" => "link_title",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Team Member
vc_map(array(
    "name"              => __("Team Member", 'monica_theme'),
    "base"              => "monica_sc_team_member",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "attach_image",
            "heading" => __("Image", 'monica_theme'),
            "param_name" => "img",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Name", 'monica_theme'),
            "param_name" => "name",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Position", 'monica_theme'),
            "param_name" => "position",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Service Box
vc_map(array(
    "name"              => __("Service Box", 'monica_theme'),
    "base"              => "monica_sc_servicebox",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", 'monica_theme'),
            "param_name" => "style",
            "value" => array(
                __("Normal", 'monica_theme')        => "normal",
                __("White", 'monica_theme')         => "white",
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'monica_theme' ),
            'value' => array(
                esc_html__( 'Disable', 'monica_theme' ) => 'disable',
                esc_html__( 'Font Awesome', 'monica_theme' ) => 'fontawesome',
                esc_html__( 'Thememify', 'monica_theme' ) => 'themify',
                esc_html__( 'Open Iconic', 'monica_theme' ) => 'openiconic',
                esc_html__( 'Typicons', 'monica_theme' ) => 'typicons',
                esc_html__( 'Entypo', 'monica_theme' ) => 'entypo',
                esc_html__( 'Linecons', 'monica_theme' ) => 'linecons',
                esc_html__( 'ET Line', 'monica_theme' ) => 'etline',

            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_thememify',
            'value' => 'ti-camera',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
                'type' => 'themify',
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
            'element' => 'icon_type',
            'value' => 'typicons',
        ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 300, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", 'monica_theme'),
            "param_name" => "title",
        ),
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'class' => 'messagebox_text',
            'heading' => esc_html__( 'Content', 'monica_theme' ),
            'param_name' => 'content',
            'value' => esc_html__( 'Insert content here ...', 'monica_theme' )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", 'monica_theme'),
            "param_name" => "link",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link Title", 'monica_theme'),
            "param_name" => "link_title",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Timeline
vc_map(array(
    "name"              => __("Timeline", 'monica_theme'),
    "base"              => "monica_sc_timeline",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Timeline Item', 'monica_theme' ),
            'param_name' => 'timeline_item',
            'value' => urlencode( json_encode( array(
                array(
                    'date'      => esc_html__( '20/11/1991', 'js_composer' ),
                    'title'     => 'Timeline Title',
                    'content'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                ),
            ) ) ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Date', 'monica_theme' ),
                    'param_name' => 'date',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Date Description', 'monica_theme' ),
                    'param_name' => 'date_desc',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'monica_theme' ),
                    'param_name' => 'title',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content', 'monica_theme' ),
                    'param_name' => 'content',
                    'admin_label' => false
                ),
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Testimonials
vc_map(array(
    "name"              => __("Testimonial", 'monica_theme'),
    "base"              => "monica_sc_testimonials",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'monica_theme' ),
            'param_name' => 'testimonial_item',
            'value' => urlencode( json_encode( array(
                array(
                    'name'          => esc_html__( 'John Doe', 'js_composer' ),
                    'company'       => 'SC Company',
                    'content'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                ),
            ) ) ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Name', 'monica_theme' ),
                    'param_name' => 'name',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Company', 'monica_theme' ),
                    'param_name' => 'company',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content', 'monica_theme' ),
                    'param_name' => 'content',
                    'admin_label' => false
                ),
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Logo
vc_map(array(
    "name"              => __("Logo", 'monica_theme'),
    "base"              => "monica_sc_customerlogo",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "attach_image",
            "heading" => __("Logo", 'monica_theme'),
            "param_name" => "img",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Divider
vc_map(array(
    "name"              => __("Divider", 'monica_theme'),
    "base"              => "monica_sc_divider",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", 'monica_theme'),
            "param_name" => "style",
            "value" => array(
                __("Default", 'monica_theme')              => "default",
                __("Icon", 'monica_theme')                 => "icon",
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'monica_theme' ),
            'value' => array(
                esc_html__( 'Disable', 'monica_theme' ) => 'disable',
                esc_html__( 'Font Awesome', 'monica_theme' ) => 'fontawesome',
                esc_html__( 'Thememify', 'monica_theme' ) => 'themify',
                esc_html__( 'Open Iconic', 'monica_theme' ) => 'openiconic',
                esc_html__( 'Typicons', 'monica_theme' ) => 'typicons',
                esc_html__( 'Entypo', 'monica_theme' ) => 'entypo',
                esc_html__( 'Linecons', 'monica_theme' ) => 'linecons',
                esc_html__( 'ET Line', 'monica_theme' ) => 'etline',

            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_thememify',
            'value' => 'ti-camera',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
                'type' => 'themify',
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
            'element' => 'icon_type',
            'value' => 'typicons',
        ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 300, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'monica_theme' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'monica_theme' ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Headline
vc_map(array(
    "name"              => __("Headline", 'monica_theme'),
    "base"              => "monica_sc_headline",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('monica_theme', 'monica_theme'),
    "params"            => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Before Title', 'monica_theme' ),
            'param_name' => 'before_title',
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'monica_theme' ),
            'param_name' => 'title',
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'After Title', 'monica_theme' ),
            'param_name' => 'after_title',
            'admin_label' => false
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Size", 'monica_theme'),
            "param_name" => "size",
            "value" => array(
                __("Normal", 'monica_theme')        => "normal",
                __("Small", 'monica_theme')         => "small",
                __("Medium", 'monica_theme')        => "medium",
                __("Large", 'monica_theme')         => "large",
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));

// Portfolio
vc_map(array(
    "name"              => __("Portfolio", 'monica_theme'),
    "base"              => "monica_sc_portfolio_list",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('Vasca', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "textfield",
            "heading" => __("Number", 'monica_theme'),
            "param_name" => "number",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Portfolio Style", 'monica_theme'),
            "param_name" => "portfolio_style",
            "value" => array(
                __("Overlay", 'monica_theme')                    => "normal",
                __("Title", 'monica_theme')                      => "title-bottom",
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Gutter Style", 'monica_theme'),
            "param_name" => "row",
            "value" => array(
                __("No Space", 'monica_theme')   => "nospace",
                __("Small", 'monica_theme')      => "small",
                __("Normal", 'monica_theme')     => "normal",
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", 'monica_theme'),
            "param_name" => "style",
            "value" => array(
                __("Grid", 'monica_theme')                          => "grid",
                __("Carousel", 'monica_theme')                      => "carousel",
                __("Filter", 'monica_theme')                        => "filter",
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Category ID List", 'monica_theme'),
            "param_name" => "cat",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tag", 'monica_theme'),
            "param_name" => "tag",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", 'monica_theme'),
            "param_name" => "col",
            "value" => array(
                __("2 Columns", 'monica_theme')                  => "6",
                __("3 Columns", 'monica_theme')                  => "4",
                __("4 Columns", 'monica_theme')                  => "3",
                __("6 Columns", 'monica_theme')                  => "2",
            )
        ),
    )
));

// Blog
vc_map(array(
    "name"              => __("Blog", 'monica_theme'),
    "base"              => "monica_sc_blog",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('Vasca', 'monica_theme'),
    "params"            => array(

        array(
            "type" => "textfield",
            "heading" => __("Number", 'monica_theme'),
            "param_name" => "number",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", 'monica_theme'),
            "param_name" => "style",
            "value" => array(
                __("List", 'monica_theme')                    => "normal",
                __("Medium", 'monica_theme')                  => "medium",
                __("Masonry", 'monica_theme')                 => "masonry",
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Categories", 'monica_theme'),
            "param_name" => "cat",
            "value" => $monica_cat
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tag", 'monica_theme'),
            "param_name" => "tag",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", 'monica_theme'),
            "param_name" => "col",
            "value" => array(
                __("2 Columns", 'monica_theme')                  => "6",
                __("3 Columns", 'monica_theme')                  => "4",
                __("4 Columns", 'monica_theme')                  => "3",
            )
        ),
    )
));

// Gallery
vc_map(array(
    "name"              => __("Gallery", 'monica_theme'),
    "base"              => "monica_sc_gallery",
    "wrapper_class"     => "clearfix",
    "category"          => esc_html__('Vasca', 'monica_theme'),
    "params"            => array(
        array(
            "type" => "attach_images",
            "heading" => __("Images", 'monica_theme'),
            "param_name" => "img",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image Size", 'monica_theme'),
            "param_name" => "size",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", 'monica_theme'),
            "param_name" => "col",
            "value" => array(
                __("2 Columns", 'monica_theme')                  => "6",
                __("3 Columns", 'monica_theme')                  => "4",
                __("4 Columns", 'monica_theme')                  => "3",
                __("6 Columns", 'monica_theme')                  => "2",
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'monica_theme'),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monica_theme')
        )
    )
));