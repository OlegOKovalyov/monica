<?php
/*
    Template Name: Foto
*/
    get_header();
    get_template_part( 'heading' );

    // get options
    $sb     = monica_meta_data( '_monica_radio_sidebar_layout' ) ? monica_meta_data( '_monica_radio_sidebar_layout' ) : monica_option_data( 'select_post_sidebar' );
    $fp     = monica_meta_data( '_monica_full_page_width' ) ? 'container-full' : 'container';
    $ctwd   = $sb == 'fullwidth' ? 12 : 8;
?>

 <div class="site-main <?php echo esc_attr( $fp );?>-wrapper gallery-page">
    <div class="<?php echo esc_attr( $fp );?>">

        <div class="row" id="<?php echo esc_attr( $sb );?>">
            <div id="page-content" class="content col-md-<?php echo esc_attr( $ctwd );?>">

                <?php while ( have_posts() ) : the_post(); ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class( 'page-entry' ); ?>>

                    <div class="entry-content-container <?php echo esc_attr( $sb );?>-wrap">

                        <div class="entry-content format-content clearfix">

                            <?php
                                /* translators: %s: Name of current post */
                                the_content( sprintf(
                                    esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'monica_theme' ),
                                    get_the_title()
                                ) );

                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'monica_theme' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'monica_theme' ) . ' </span>%',
                                    'separator'   => '<span class="screen-reader-text">, </span>',
                                ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div><!-- // .entry-content-container -->

                </div><!-- // .entry-item -->

                <?php
                    if ( monica_option_data( 'switch_comment_page') && ( comments_open() || get_comments_number() )) {
                        comments_template();
                    }
                ?>

                <?php endwhile; ?>

            </div><!-- // #archive-content -->

            <?php
                if ( $ctwd == 8)
                    get_sidebar();
            ?>

        </div><!-- // .row -->
    </div><!-- // .container -->
</div><!-- // .site-main -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        //gallery
        //alert('asdasd');
        $('.gallery a').attr('rel', 'gallery').fancybox();

    });
    jQuery(window).load(function ($) {
        jQuery('.gallery').isotope({
          itemSelector: '.gallery-item',
          percentPosition: true,
          /*masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: '.grid-sizer'
          }*/
        });
    })
</script>
<?php get_footer(); ?>