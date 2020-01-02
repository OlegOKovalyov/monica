<?php
/**
 * External product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>


<div class="clearfix product-action-external">

    <p class="cart">
    	<a href="<?php echo esc_url( $product_url ); ?>" rel="nofollow" class="single_add_to_cart_button button alt"><?php echo $button_text; ?></a>
    </p>
    <?php if( class_exists( 'YITH_WCWL_DEVOX_Shortcode' ) ): ?>
    <?php echo do_shortcode( '[devox_add_to_wishlist]' ); ?>
    <?php endif; ?>
</div>

<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
