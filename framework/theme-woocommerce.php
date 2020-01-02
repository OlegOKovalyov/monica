<?php

// Remove default WC Breadcrumbs
add_action( 'init', 'monica_remove_wc_breadcrumbs' );
function monica_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Remove WC General Style
add_filter( 'woocommerce_enqueue_styles', 'monica_dequeue_styles' );
function monica_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] ); // Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );     // Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
    wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
    return $enqueue_styles;
}

// Change Product Per Page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

// Add WC Default Images Size
add_action( 'init', 'monica_woocommerce_image_dimensions', 1 );
function monica_woocommerce_image_dimensions() {
    $catalog = array(
        'width' => '450',   // px
        'height'    => '535',// px
        'crop'  => 1 // true
        );

    $single = array(
        'width' => '900',   // px
        'height'    => '880',   // px
        'crop'  => 1 // true
        );

    $thumbnail = array(
        'width' => '200',   // px
        'height'    => '200',   // px
        'crop'  => 1 // false
        );

    // Image sizes
    update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
    update_option( 'shop_single_image_size', $single ); // Single product image
    update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
}

// Define Woocommerce Columns
add_filter('loop_shop_columns', 'monica_wc_product_columns_frontend');
function monica_wc_product_columns_frontend() {
    global $woocommerce;

    $columns =  monica_option_data( 'site_woo_columns' ) ? monica_option_data( 'site_woo_columns' ) : 3;

    if ( is_single() ) :
        $columns = 4;
    endif;

    return $columns;

}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
    function woocommerce_output_upsells() {
        woocommerce_upsell_display( 4,4 );
    }
}

function woo_related_products_limit() {
    global $product;
    $args['posts_per_page'] = 6;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'devox_related_products_args' );
function devox_related_products_args( $args ) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
}

add_action('wp_print_styles', 'devox_dequeue_css_from_plugins', 100);
function devox_dequeue_css_from_plugins()  {
    wp_dequeue_style( 'yith-wcwl-font-awesome' );
}

remove_action( 'woocommerce_single_product_summary', array( 'YITH_Woocompare_Frontend', 'add_compare_link' ), 35 );
remove_action( 'woocommerce_after_shop_loop_item', array( 'YITH_Woocompare_Frontend', 'add_compare_link' ), 20 );

// WooCommerce Share
//add_action( 'woocommerce_single_product_summary', 'monica_woo_share', 9999 );
function monica_woo_share() { ?>
    <div class="woocommerce-social-share">
        <span><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo htmlspecialchars(get_permalink());?>"><i class="fa fa-facebook"></i></a></span>
        <span><a href="http://twitter.com/home?status=<?php echo urlencode(get_the_title());?><?php echo esc_attr(get_permalink());?>"><i class="fa fa-twitter"></i></a></span>
        <span><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_title());?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>&amp;description=<?php echo urlencode(get_the_title());?>"><i class="fa fa-pinterest"></i></a></span>
        <span><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_attr(get_permalink());?>&amp;title=<?php echo urlencode(get_the_title());?>&amp;summary=<?php echo urlencode(get_the_title());?>"><i class="fa fa-linkedin"></i></a></span>
        <span><a href="https://plus.google.com/share?url=<?php echo urlencode(get_the_title());?><?php echo esc_attr(get_permalink());?>"><i class="fa fa-google-plus"></i></a></span>
        <span><a href="mailto:?subject=<?php echo urlencode(get_the_title());?>&amp;body=<?php echo esc_attr(get_permalink());?>"><i class="fa fa-envelope"></i></a></span>
    </div>
<?php }

function monica_woo_breadcrumbs() {
    echo monica_breadcrumb();
}
add_action( 'woocommerce_single_product_summary', 'monica_woo_breadcrumbs', 0 );

add_filter( 'woocommerce_add_to_cart_fragments', 'monica_woocommerce_header_add_to_cart_total_fragment' );
function monica_woocommerce_header_add_to_cart_total_fragment( $fragments ) {
    ob_start();
    ?>
    <li class="cart"><a href="<?php echo WC()->cart->get_cart_url(); ?>">
        <i class="ti-shopping-cart"></i><span class="cart-total"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'woocommerce' ), WC()->cart->cart_contents_count ); ?></span>
    </a></li>
    <?php

    $fragments['.extra-menu .cart'] = ob_get_clean();

    return $fragments;
}