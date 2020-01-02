<?php $post_format = get_post_format(); ?>
<?php if (($post_format == 'quote') && monica_meta_data( '_monica_post_quotes' )): ?>

<div class="entry-media">
    <div class="entry-quotes">
        <a href="<?php the_permalink();?>"><?php echo monica_meta_data( '_monica_post_quotes' ); ?></a>
    </div>
</div><!--/.entry-media-->

<?php elseif (($post_format == 'video' || $post_format == 'audio') && ( monica_meta_data( '_monica_post_format_media' )) || monica_meta_data( '_monica_custom_post_format_media' ) ): ?>

<div class="entry-media">
        <?php
            $url = wp_oembed_get( esc_html( monica_meta_data( '_monica_post_format_media' ) ) );
            if ($url) {
                echo str_replace(array(' webkitallowfullscreen mozallowfullscreen allowfullscreen','frameborder="0"','frameborder="no"','scrolling="no"','allowfullscreen=""','&'), array('','','','','','&amp;'), $url);
            } else {
                echo wp_kses( monica_meta_data( '_monica_custom_post_format_media' ) ,array (
                    'iframe' => array(),
                    'src'    => array(),
                ));
            }
        ?>
</div>

<?php
    elseif ($post_format == 'gallery' && monica_meta_data ('_monica_post_gallery')): $gallery_images = monica_meta_data ('_monica_post_gallery');
?>
<div class="entry-media gallery-<?php echo monica_meta_data( '_monica_post_gallery_style');?>">
    <?php if ( monica_meta_data( '_monica_post_gallery_style') == 'slide' ) : ?>
    <div class="image-slider">
        <?php
            foreach( $gallery_images as $image => $image_id ) :
            $img = wp_get_attachment_image_src( $image, 'monica_blog-normal' );
        ?>
        <div class="item"><img src="<?php echo esc_url( $img[0] );?>" alt="" class="img-responsive" draggable="false"></div>
        <?php endforeach; ?>
    </div>
    <?php else: wp_enqueue_script( 'masonry' );?>
    <div class="image-masonry row small">
        <?php
            foreach( $gallery_images as $image => $image_id ) :
            $img = wp_get_attachment_image_src( $image, 'monica_blog-masonry' );
        ?>
        <div class="col-md-4 masonry-item"><img src="<?php echo esc_url( $img[0] );?>" alt="" class="img-responsive" draggable="false"></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<?php elseif(has_post_thumbnail()): ?>

<div class="entry-media">
    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_post_thumbnail( 'monica_blog-normal' ); ?></a>
</div><!-- // .entry-media -->

<?php endif; ?>