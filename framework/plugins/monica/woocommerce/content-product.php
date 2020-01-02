<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $post;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}

if ( 6 == $woocommerce_loop['columns'] ) {
	$classes[] = 'col-lg-2 col-md-2 col-sm-6 col-xs-12';
}

if ( 5 == $woocommerce_loop['columns'] ) {
	$classes[] = 'col-lg-25 col-md-25 col-sm-6 col-xs-12';
}

if ( 4 == $woocommerce_loop['columns'] ) {
	$classes[] = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
}

if ( 3 == $woocommerce_loop['columns'] ) {
	$classes[] = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
}

if ( 2 == $woocommerce_loop['columns'] ) {
	$classes[] = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
}

?>

<div <?php post_class( $classes ); ?>>
	<div class="product-item">
	    <div class="product-images">
	        <div class="front-image">
	        	<a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail($post->ID,'shop_catalog',array('class'	=> '')); ?></a>
	        </div>
	        <?php if (monica_second_product_image()): ?>
	    	<div class="back-image">
	    		<a href="<?php the_permalink();?>"><img src="<?php echo monica_second_product_image();?>" alt="<?php the_title();?>"></a>
	    	</div>
	    	<?php endif; ?>
	    </div>
	    <div class="product-title clearfix">
	        <div class="title-area">
	            <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
				<div class="title-desc">
					<span class="price"><?php wc_get_template( 'woocommerce/loop/price.php' ); ?></span>
	            	<span class="cart"><?php wc_get_template( 'woocommerce/loop/add-to-cart.php' ); ?></span>
				</div>
	        </div>
	    </div>
	</div>
</div>