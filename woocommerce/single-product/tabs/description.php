<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', esc_html__( '[:en]Product Range[:ru]Ассортимент[:ua]Асортимент[:]', 'woocommerce' ) ) );

?>

<?php if ( $heading ): ?>
  <h2 class="woo-desc"><?php echo $heading; ?></h2>
<?php endif; ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?php the_content(); ?>
    </div>
</div>
