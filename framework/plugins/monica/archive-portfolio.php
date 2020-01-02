<?php
    get_header();
    get_template_part( 'heading' );

    $column = monica_option_data( 'select_portfolio_columns' );
    $row = monica_option_data( 'select_portfolio_row' );
    $con = monica_option_data( 'select_portfolio_container' );
?>

<div class="site-main portfolio-container-<?php echo esc_attr( $row );?>">

    <div class="<?php echo esc_attr( $con );?>">

        <div class="row top-60 portfolio-<?php echo esc_attr( $row. ' '.$row );?>">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="column col-sm-6 col-lg-<?php echo esc_attr( $column );?> col-md-<?php echo esc_attr( $column );?>">

                <?php get_template_part( 'template/content', 'portfolio' ); ?>

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

    </div><!-- // .container -->
</div><!-- // .site-main -->

<?php get_footer(); ?>