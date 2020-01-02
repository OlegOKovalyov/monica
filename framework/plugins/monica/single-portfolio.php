<?php
    get_header();
    get_template_part( 'heading' );

    // get settings
    $sec = monica_meta_data( '_monica_portfolio_section_style' );
?>

<div class="site-main">
    <?php
        if ( monica_meta_data( '_monica_portfolio_media_pos') == 'top' ) {
            echo '<div class="portfolio-section bottom-60 '.esc_attr( $sec ).'">';
            get_template_part( 'template/content','portfolio-media' );
            echo '</div>';
        }
    ?>
    <div class="container">
        <div class="row">
            <div id="archive-content" class="content col-md-8">

                <?php while ( have_posts() ) : the_post(); ?>

                <section id="portfolio-<?php the_ID(); ?>" <?php post_class( 'portfolio-detail' ); ?>>

                    <div class="entry-content-container">

                        <?php
                            if ( monica_meta_data( '_monica_portfolio_media_pos') == 'con' ) {
                                get_template_part( 'template/content','portfolio-media' );
                            }
                        ?>

                        <div class="entry-content format-content">
                            <?php
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

                </section><!-- // .entry-item -->

                <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                ?>

                <?php endwhile; ?>

            </div><!-- // #archive-content -->

            <div id="sidebar" class="sidebar col-md-4">
                <div class="portfolio-meta">
                    <ul>
                        <li>
                            <span class="title"><?php esc_html_e( 'Published','monica_theme' );?></span>
                            <div class="desc"><?php echo get_the_date();?></div>
                        </li>
                        <li>
                            <span class="title"><?php esc_html_e( 'Published by','monica_theme' );?></span>
                            <div class="desc"><?php the_author();?></div>
                        </li>
                        <?php
                            $portfolio_meta = monica_meta_data( '_monica_portfolio_meta_group' );
                            if ( $portfolio_meta ) {
                                foreach ($portfolio_meta as $portfolio_meta_item) {
                                    echo '<li>
                                            <span class="title">'.$portfolio_meta_item['title'].'</span>
                                            <div class="desc">'.$portfolio_meta_item['content'].'</div>
                                        </li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div><!-- // #sidebar -->

        </div><!-- // .row -->
    </div><!-- // .container -->
    <div class="section relate-portfolio">
        <div class="container">

            <?php
                $portfolio_query = new WP_Query(
                    array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => '4',
                        )
                    );
                if( $portfolio_query->have_posts() ) :
                    echo '<div class="row">';
                    while( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
                        echo '<div class="col-md-3">';
                        get_template_part( 'template/content-portfolio' );
                        echo '</div>';
                    endwhile;
                    echo '</div>';
                endif;
            ?>

        </div><!-- // .container -->
    </div><!-- // .section relate-portfolio -->
</div><!-- // .site-main -->

<?php get_footer(); ?>