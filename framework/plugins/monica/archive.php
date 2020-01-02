<?php
    get_header();
    get_template_part( 'heading' );

    $layout = monica_option_data( 'select_archive_style' );
    $column = monica_option_data( 'select_archive_columns' );
    $column = $layout == 'default' ? 12 : $column;
    $sb     = monica_option_data( 'select_post_sidebar' );
    $ctwd   = $sb == 'fullwidth' ? 12 : 8;

    if ( $layout == 'masonry' )
        wp_enqueue_script( 'masonry' );
?>

 <div class="site-main bottom-60 site-layout-<?php echo esc_attr( $layout );?>">
    <div class="container">

        <div class="row" id="<?php echo esc_attr( $sb );?>">
            <div id="archive-content" class="content col-md-<?php echo esc_attr( $ctwd );?>">

                <div class="row layout-<?php echo esc_attr( $layout );?>">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div class="column col-sm-6 col-lg-<?php echo esc_attr( $column );?> col-md-<?php echo esc_attr( $column );?>">

                    <?php get_template_part( 'template/content', $layout ); ?>

                    </div><!-- // .column -->

                <?php endwhile; else: ?>
                    <div class="col-lg-12 col-md-12">
                        <p><?php esc_html_e( 'No post found. Please try again by another keyword.','monica_theme' );?></p>
                    </div>
                <?php endif; ?>

                </div><!-- // .row -->

                <?php
                    echo paginate_links(
                        array(
                            'type' => 'list',
                        )
                    );
                ?>

            </div><!-- // #archive-content -->

            <?php
                if ( $ctwd == 8)
                    get_sidebar();
            ?>

        </div><!-- // .row -->
    </div><!-- // .container -->
</div><!-- // .site-main -->

<?php get_footer(); ?>