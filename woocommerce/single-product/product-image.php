<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>
<div class="images">

	<div class="row">
		<div class="col-md-12">
			<div class="main-images-area">
				<?php
				if ( has_post_thumbnail() && !get_field('main_img_product_en')) {

					$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
					$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
					$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
					$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
						'title'	=> $image_title,
						'alt'	=> $image_title
						) );

					$attachment_count = count( $product->get_gallery_attachment_ids() );

					if ( $attachment_count > 0 ) {
						$gallery = '[product-gallery]';
					} else {
						$gallery = '';
					}

					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );

				} else { ?>

					<?php 
						$locale =  get_locale();
						switch ($locale) {
							case 'ru_RU': ?>
							<a href="<?php echo get_field('main_img_product_ru')['url']; ?>" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto">
								<img src="<?php echo get_field('main_img_product_ru')['url']; ?>" alt="<?php echo get_field('main_img_product_ru')['alt']; ?>" />
							</a>
							<?php break; ?>
					  <?php case 'en_US': ?>
							<a href="<?php echo get_field('main_img_product_en')['url']; ?>" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto">
								<img src="<?php echo get_field('main_img_product_en')['url']; ?>" alt="<?php echo get_field('main_img_product_en')['alt']; ?>" />
							</a>
							<?php break; ?>
					  <?php case 'uk': ?>
							<a href="<?php echo get_field('main_img_product_ua')['url']; ?>" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto">
								<img src="<?php echo get_field('main_img_product_ua')['url']; ?>" alt="<?php echo get_field('main_img_product_ua')['alt']; ?>" />
							</a>
							<?php break; ?>
					<?php }
				}
				?>	
			</div>
		</div>
		<div class="col-md-2">
			<?php do_action( 'woocommerce_product_thumbnails' ); ?>
		</div>
	</div>

</div>