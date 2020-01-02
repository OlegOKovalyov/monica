<?php global $product; ?>
<li>
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image(); ?>
		<h4 class="product-title"><?php echo $product->get_title(); ?></h4>
	</a>
	<?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
	<span class="heading-font">
        <?php echo $product->get_price_html(); ?>
    </span>
</li>