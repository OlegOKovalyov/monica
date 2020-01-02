<?php
/**
 * Add custom contact methods
 *
 * @since VASCA v1.0
 */
add_filter('user_contactmethods', 'er_user_contactmethods');
function er_user_contactmethods($user_contactmethods){
    $user_contactmethods['twitter']     = 'Twitter';
    $user_contactmethods['facebook']    = 'Facebook';
    $user_contactmethods['linkedin']    = 'LikedIn';
    $user_contactmethods['pinterest']   = 'Pinterest';
    $user_contactmethods['googleplus']  = 'Google Plus';
    $user_contactmethods['dribbble']    = 'Dribbble';
    return $user_contactmethods;
}

/**
 * Formatting Allowed Tags
 *
 * @since VASCA v1.0
 */
function monica_formatting_allowedtags() {

	return apply_filters(
		'monica_formatting_allowedtags',
		array(
			'a'          => array( 'href' => array(), 'title' => array(), ),
			'b'          => array(),
			'blockquote' => array(),
			'br'         => array(),
			'div'        => array( 'align' => array(), 'class' => array(), 'style' => array(), ),
			'em'         => array(),
			'i'          => array(),
			'p'          => array( 'align' => array(), 'class' => array(), 'style' => array(), ),
			'span'       => array( 'align' => array(), 'class' => array(), 'style' => array(), ),
			'strong'     => array(),
		)
	);

}

/**
 * Get custom post type terms links
 *
 * @since VASCA v1.0
 */
function monica_custom_taxonomies_terms_links($taxonomy,$sep =', ' ) {
    global $post, $post_id;
    $return = '';
    // get post by post id &get_post
    $post = get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $terms = get_the_terms( $post->ID, $taxonomy );
    if ( !empty( $terms ) ) {
        $out = array();
        foreach ( $terms as $term )
            $out[] = '<a title="'.$term->name.'" href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
        $return = join( $sep, $out );
    } else {
        $return = '';
    }
    return $return;
}

/**
 * Get second product images
 *
 * @since Ceasar 1.0
 */
function monica_second_product_image(){
    global $post, $product, $woocommerce;
    $attachment_ids = $product->get_gallery_attachment_ids();
    if ( $attachment_ids ) {
        $loop = 1;
        foreach ( $attachment_ids as $attachment_id ) {
            if($loop == 1)
            $img       = wp_get_attachment_image_src( $attachment_id, 'shop_catalog');
            $image = $img[0];
            $loop++;
        }
    } else {
        $image = '';
    }

    return $image;
}

/**
 * Get custom post type terms slig
 *
 * @since VASCA v1.0
 */
function monica_custom_taxonomies_terms_slug($taxonomy) {
    global $post, $post_id;
    $return = '';
    // get post by post id
    $post = get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $terms = get_the_terms( $post->ID, $taxonomy );
    if ( !empty( $terms ) ) {
        $out = array();
        foreach ( $terms as $term )
            $out[] = $term->slug;
        $return = join( ' ', $out );
    }
    return $return;
}

/**
 * Creat random string
 *
 * @since VASCA v1.0
 */
function monica_rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = '';
    $size = strlen( $chars );
    for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }

    return $str;
}

function monica_hex2rgba($hex,$a=1) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }

   $rgb = array($r, $g, $b);

   return 'rgba('.$r.','.$g.','.$b.','.$a.')';
}

/**
 * Add Responsive Images Class
 *
 * @since VASCA v1.0
 */
add_filter('post_thumbnail_html','monica_add_class_to_thumbnail');
function monica_add_class_to_thumbnail($thumb) {
    $thumb = str_replace('attachment-', 'img-responsive attachment-', $thumb);
    return $thumb;
}

/**
 * Count total post in special term
 *
 * @since VASCA v1.0
 */
function monica_term_post_count($type,$term){
    $args = array(
        'post_type' => $type,
        'post_status' => 'published',
        'numberposts' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $term
            )
        )
    );
    return count( get_posts( $args ) );
    wp_reset_postdata();
}

/**
 * Get custom product category content
 *
 * @since VASCA v1.0
 */
function monica_custom_tax_content($id,$term_id,$field_id){
    $meta = get_option($id);
    if (empty($meta)) $meta = array();
    if (!is_array($meta)) $meta = (array) $meta;
    $meta = isset($meta[$term_id]) ? $meta[$term_id] : array();
    isset($meta[$field_id]) ? $value = $meta[$field_id] : $value = '';
    return $value;
}

// Validation Data
function monica_validator($data,$type='normal'){
    $out = $data;
    return $out;
}

/**
 * Get save option data
 *
 * @since VASCA v1.0
 */
function monica_option_data($data){
    global $_monica_option;
    if (isset($_monica_option[$data]))
    return $_monica_option[$data];
}
/**
 * Get save meta data
 *
 * @since VASCA v1.0
 */
if ( ! class_exists( 'EVR_Metadata' ) )
{
    /**
     * Wrapper class for helper functions
     */
    class EVR_Metadata
    {
        /**
         * Do actions when class is loaded
         *
         * @return void
         */
        static function on_load()
        {

        }

        /**
         * Shortcode to display meta value
         *
         * @param $atts Array of shortcode attributes, same as meta() function, but has more "meta_key" parameter
         * @see meta() function below
         *
         * @return string
         */
        static function shortcode( $atts )
        {
            $atts = wp_parse_args( $atts, array(
                'type'    => 'text',
                'post_id' => get_the_ID(),
            ) );
            if ( empty( $atts['meta_key'] ) )
                return '';

            $meta = self::meta( $atts['meta_key'], $atts, $atts['post_id'] );

            $content = $meta;

            return apply_filters( __FUNCTION__, $content );
        }

        /**
         * Get post meta
         *
         * @param string   $key     Meta key. Required.
         * @param int|null $post_id Post ID. null for current post. Optional
         * @param array    $args    Array of arguments. Optional.
         *
         * @return mixed
         */
        static function meta( $key, $args = array(), $post_id = null )
        {
            $post_id = empty( $post_id ) ? get_the_ID() : $post_id;

            $args = wp_parse_args( $args, array(
                'type' => 'text',
            ) );

            // Set 'multiple' for fields based on 'type'
            if ( !isset( $args['multiple'] ) )
                $args['multiple'] = in_array( $args['type'], array( 'checkbox_list', 'file', 'file_advanced', 'image', 'image_advanced', 'plupload_image', 'thickbox_image' ) );

            $meta = get_post_meta( $post_id, $key, !$args['multiple'] );

            return apply_filters( __FUNCTION__, $meta, $key, $args, $post_id );
        }

    }

    EVR_Metadata::on_load();
}

/**
 * Get post meta
 *
 * @param string   $key     Meta key. Required.
 * @param int|null $post_id Post ID. null for current post. Optional
 * @param array    $args    Array of arguments. Optional.
 *
 * @return mixed
 */
function monica_meta_data( $key, $args = array(), $post_id = null )
{
    return EVR_Metadata::meta( $key, $args, $post_id );
}

/**
 * Breadcrumb
 * Custom fixed for email request
 *
 * @since Peace 1.x
 */
function monica_breadcrumb() {

    /* === OPTIONS === */
    $text['home']     = 'Home'; // text for the 'Home' link
    $text['category'] = 'Archive by Category "%s"'; // text for a category page
    $text['search']   = 'Search Results for "%s"'; // text for a search results page
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
    $text['author']   = 'Articles Posted by %s'; // text for an author page
    $text['404']      = 'Error 404'; // text for the 404 page

    $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
    $show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_title     = 1; // 1 - show the title for the links, 0 - don't show
    $delimiter      = ''; // delimiter between crumbs
    $before         = '<li class="current"><span>'; // tag before the current crumb
    $after          = '</span></li>'; // tag after the current crumb
    /* === END OF OPTIONS === */

    global $post;
    $home_link    = esc_url( home_url('/') );
    $link_before  = '<li>';
    $link_after   = '</li>';
    $link_attr    = '';
    $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    if(!is_search() && !is_404())
    $parent_id    = $parent_id_2 = $post->post_parent;
    $frontpage_id = get_option('page_on_front');

    if (is_home() || is_front_page()) {

        if ($show_on_home == 1) echo '<ul class="breadcrumbs clearfix"><li class="home">' . $text['home'] . '</li></ul>';

    } else {

        echo '<ul class="breadcrumbs clearfix">';
        if ($show_home_link == 1) {
            echo '<li><a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a></li>';
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
        }

        if ( is_category() ) {
            $this_cat = get_category(get_query_var('cat'), false);
            if ($this_cat->parent != 0) {
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

        } elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;

        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if ($show_current == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
            $cats = str_replace('</a>', '</a>' . $link_after, $cats);
            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_page() && !$parent_id ) {
            if ($show_current == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $parent_id ) {
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $delimiter;
                }
            }
            if ($show_current == 1) {
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                echo $before . get_the_title() . $after;
            }

        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;

        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo esc_html__('Page','peace') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</ul><!-- .breadcrumbs -->';

    }
}

add_filter( 'body_class', 'monica_body_class' );
function monica_body_class( $classes ) {

    if (monica_option_data( 'switch_fixed_preloader' ) == 1)
        $classes[] = 'loaded';
    $classes[] = 'theme-layout-'.monica_option_data( 'select_layout_style' ).' '.monica_option_data( 'select_layout_style' );
    return $classes;

}

/**
 * Get Page URL
 *
 * @since VASCA v1.0
 */
function devox_url_origin($s, $use_forwarded_host=false)
{
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}
function devox_full_url($s, $use_forwarded_host=false)
{
    return devox_url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}
function monica_page_url(){
    $url = devox_full_url( $_SERVER );
    return $url;
}

/**
 * WordPress Admin Link
 *
 * @since VASCA v1.0
 */
add_action( 'admin_bar_menu', 'monica_support_link', 999 );
function monica_support_link( $wp_admin_bar ) {
    $args = array(
        'id'    => 'theme_support',
        'title' => 'Theme Support',
        'href'  => 'http://vasca.ticksy.com/',
        'meta'  => array( 'class' => 'my-toolbar-page' )
    );
    $wp_admin_bar->add_node( $args );
}

/**
 * WordPress Body Class
 *
 * @since VASCA v1.0
 */
add_filter( 'body_class', 'monica_body_class_names' );
function monica_body_class_names( $classes ) {
    if ( monica_meta_data( '_monica_hidden_heading' ) ) {
        $classes[] = 'no-page-heading';
    }
    return $classes;
}

/**
 * Convert HEX to RGBA
 *
 * @since VASCA v1.0
 */
function monica_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb);
}

/**
 * Languages List
 *
 * @since VASCA v1.0
 */
function monica_languages_list(){
    if(function_exists('icl_get_languages')){
        $languages = icl_get_languages('skip_missing=0&orderby=code');
            if(!empty($languages)){
                echo '<div id="language_list"><ul class="sf-menu top-menu">';
                echo '<li><a href="#">Languages</a><ul>';
                foreach($languages as $l){
                    echo '<li>';
                    if(!$l['active']) echo '<a href="'.$l['url'].'">';
                    echo icl_disp_language($l['native_name']);
                    if(!$l['active']) echo '</a>';
                    echo '</li>';
                }
                echo '</ul></li></ul></div>';
            }
    }
}

add_filter( 'body_class', 'devox_custom_body_class' );
function devox_custom_body_class( $classes ) {
    if (!monica_option_data( 'switch-site-sidebar' ))
        $classes[] = 'no-small-sidebar';
    return $classes;
}

/**
 * Theme Color
 *
 * @since VASCA v1.0
 */
add_action( 'wp_head', 'monica_theme_color' );
function monica_theme_color(){
    ?>
<style type="text/css">
input,
select,
textarea,
select,
.button,
button,
input[type="submit"],
input[type="button"],
input[type="reset"] {
    -webkit-box-shadow: 5px 5px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
    -moz-box-shadow:    5px 5px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
    box-shadow:         5px 5px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
}
.page-numbers li a,
.page-numbers li span {
    -webkit-box-shadow: 3px 3px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
    -moz-box-shadow:    3px 3px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
    box-shadow:         3px 3px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
}
.servicebox,
.servicebox.white.active,
.servicebox.white:hover,
.slider .slick-arrow,
.image-slider .slick-arrow,
.testimonial-slider .slick-arrow {
    -webkit-box-shadow: 4px 4px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
    -moz-box-shadow:    4px 4px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
    box-shadow:         4px 4px 0px 0px <?php echo monica_option_data( 'color-main-theme' );?>;
}
.imagebox .image:before,
.promobox:hover:before,
.slider .portfolio-media-grid-item:before,
.portfolio-item:hover .portfolio-media-inner {
    opacity: 1;
    background-color: rgba(<?php echo monica_hex2rgb(monica_option_data( 'color-main-theme' ));?>,0.9);
}
</style>
<?php }

/**
 * Theme Icon
 *
 * @since VASCA v1.0
 */
function monica_theme_site_icon() {
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
        $favicon = monica_option_data( 'media_favicon' );
        if ( $favicon && isset( $favicon['url'] )) {
            echo '<link rel="shortcut icon" href="'.esc_url( $favicon['url'] ).'" type="image/x-icon">';
        }
    } else {
        wp_site_icon();
    }
}
add_action( 'wp_head', 'monica_theme_site_icon' );