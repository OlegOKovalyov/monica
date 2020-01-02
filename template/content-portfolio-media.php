<div class="portfolio-media-content">
<?php
    $portfolio_format = monica_meta_data( '_monica_portfolio_format' ) ? monica_meta_data( '_monica_portfolio_format' ) : 'default';

    if ( $portfolio_format == 'normal' ) {
        echo get_the_post_thumbnail( get_the_id(), 'full' );
    }

    if ( $portfolio_format == 'gallery' ) {
        $images = monica_meta_data( '_monica_portfolio_format_gallery' );
        $col = monica_meta_data( '_monica_portfolio_gallery_col' );
        $row = monica_meta_data( '_monica_portfolio_gutter_style' );
        echo '<div class="row '.esc_attr( $row ).'">';
        foreach ($images as $id => $img) {
            echo '<div class="portfolio-media-grid-item col-sm-6 col-xs-12 col-md-'.$col.'">'.wp_get_attachment_image( $id, 'monica_portfolio' ).'</div>';
        }
        echo '</div>';
    }

    if ( $portfolio_format == 'media' ) {
        $url = wp_oembed_get( esc_html( monica_meta_data( '_monica_portfolio_format_media' ) ) );
        if ($url) {
            echo str_replace(array(' webkitallowfullscreen mozallowfullscreen allowfullscreen','frameborder="0"','frameborder="no"','scrolling="no"','allowfullscreen=""','&'), array('','','','','','&amp;'), $url);
        } else {
            echo wp_kses( monica_meta_data( '_monica_portfolio_format_media' ) ,array (
                'iframe' => array(),
                'src'    => array(),
            ));
        }
    }

    if ( $portfolio_format == 'slider' ) {
        $images = monica_meta_data( '_monica_portfolio_format_gallery' );
        $col = monica_meta_data( '_monica_portfolio_slider_number' );
        echo '<div class="slider" data-sts="1" data-column="'.$col.'">';
        foreach ($images as $id => $img) {
            echo '<div class="portfolio-media-grid-item">'.wp_get_attachment_image( $id, 'full' ).'</div>';
        }
        echo '</div>';
    }

?>
</div>