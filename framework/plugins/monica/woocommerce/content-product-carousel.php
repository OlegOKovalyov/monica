<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
    return;
}

// Extra post classes
$classes = array();

?>

<div <?php post_class( $classes ); ?>>
    <div class="product-item hover">
        <div class="product-images">
            <div class="product-image-front-end">
                <a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail($post->ID,'shop_catalog',array('class' => '')); ?></a>
            </div>
            <div class="product-image-back-end">
            <?php if(monica_second_product_image()): ?>
                <a href="<?php the_permalink();?>"><img class="back-end img-responsive" src="<?php echo monica_second_product_image(); ?>" alt="" /></a>
            <?php else: ?>
            <?php echo get_the_post_thumbnail($post->ID,'shop_catalog',array('class'    => '')); ?>
            <?php endif; ?>
            </div>

            <div class="product-action-button">
                <?php if( class_exists( 'YITH_WCWL_DEVOX_Shortcode' ) ): ?>
                <div class="wishlist action"><?php echo do_shortcode( '[devox_add_to_wishlist]' ); ?></div>
                <?php endif; ?>
                <div class="quickview action"><a href="#" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->id );?>"><i class="fa fa-eye"></i></a></div>
            </div><!-- // .product-action-button -->

        </div><!-- // .product-images -->
        <div class="product-title-area">
            <div class="product-title">
                <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                <div class="product-price-star <?php if ( !$product->get_rating_html() ) : ?>no-rating<?php endif; ?>">
                    <div class="product-price">
                        <?php wc_get_template( 'woocommerce/loop/price.php' ); ?>
                    </div>
                    <div class="product-rating">
                        <?php wc_get_template( 'woocommerce/loop/rating.php' ); ?>
                    </div>
                </div>
            </div><!-- // .product-title -->

            <div class="product-action-area heading-font">
                <?php wc_get_template( 'woocommerce/loop/add-to-cart.php' ); ?>
            </div><!-- // .product-action-area -->

            <div class="product-desc entry-summary">
                <?php the_excerpt();?>
            </div><!-- // .product-desc -->

        </div><!-- // .product-title-area -->

        <?php wc_get_template( 'woocommerce/loop/sale-flash.php' ); ?>
    </div><!-- // .product-item -->
</div><!-- // class -->