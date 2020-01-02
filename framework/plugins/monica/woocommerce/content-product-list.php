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
$classes = 'clearfix';

?>

<li <?php post_class( $classes ); ?>>
    <div class="product-list-image">
        <?php echo get_the_post_thumbnail($post->ID,'thumbnail',array('class'    => '')); ?>
    </div>
    <div class="product-list-content">
        <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
        <span class="price heading-font"><?php wc_get_template( 'woocommerce/loop/price.php' ); ?></span>
        <?php wc_get_template( 'woocommerce/loop/rating.php' ); ?>
    </div>
    <?php wc_get_template( 'woocommerce/loop/sale-flash.php' ); ?>
</li><!-- // class -->