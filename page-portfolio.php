<?php
/**
 * Template Name: VOSCO - Portfolio
 *
 * @package VOSCO
 */
    get_header();
    get_template_part( 'heading' );

    // get options
    $sb     = monica_meta_data( '_monica_radio_sidebar_layout' ) ? monica_meta_data( '_monica_radio_sidebar_layout' ) : monica_option_data( 'select_post_sidebar' );
    $fp     = monica_meta_data( '_monica_full_page_width' ) ? 'container-full' : 'container';
    $ctwd   = $sb == 'fullwidth' ? 12 : 8;

    // portfolio page
    $layout     = monica_meta_data( '_monica_portfolio_page_layout' );
    $gutter     = monica_meta_data( '_monica_portfolio_page_gutter' );
    $colunn     = monica_meta_data( '_monica_portfolio_page_columns' );
    $pistyle    = monica_meta_data( '_monica_portfolio_page_pistyle' );
    $pstyle     = monica_meta_data( '_monica_portfolio_page_pstyle' );
    $number     = monica_meta_data( '_monica_portfolio_page_pnumber' );
    $filter     = monica_meta_data( '_monica_portfolio_filter' );

    if ( $pstyle == 'masonry' ) {
        $pstyle = 'monica_portfolio-masonry';
        wp_enqueue_script( 'masonry' );
    } else {
        $pstyle = 'monica_portfolio';
    }
?>

 <div class="site-main <?php echo esc_attr( $fp );?>-wrapper">
    <div class="<?php echo esc_attr( $fp );?>">

        <div class="row" id="<?php echo esc_attr( $sb );?>">
            <div id="page-content" class="content col-md-<?php echo esc_attr( $ctwd );?>">



                <article id="page-<?php the_ID(); ?>" <?php post_class( 'page-entry' ); ?>>

                    <div class="entry-content-container <?php echo esc_attr( $sb );?>-wrap">

                        <?php if ( $filter ): wp_enqueue_script( 'isotope.pkgd.min' ); ?>

                        <div class="container top-60 bottom-60">
                            <div class="portfolio-filter-nav heading-font">
                                <nav>
                                    <ul>
                                        <li><a class="selected" data-filter="*" href="#portfolio-filter"><?php esc_html_e('All','monica_theme');?></a></li>
                                        <?php
                                            $terms = get_terms('portfolio_category');
                                            if($terms) {
                                                foreach ( $terms as $term ) {
                                                    echo '<li><a data-filter=".'.$term->slug.'" href="#portfolio-filter">' . $term->name . '</a></li>';
                                                }
                                            }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <?php endif; ?>

                        <div class="row portfolio-filter-isotope portfolio-list <?php echo esc_attr( $gutter. ' '.$pistyle. ' '.$pstyle );?>">

                            <?php
                                global $wp_query;
                                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                                $args = array(
                                    'post_type'         => 'portfolio',
                                    'posts_per_page'    => $number,
                                    'post_status'       => 'publish',
                                    'orderby'           => 'date',
                                    'order'             => 'ASC',
                                    'paged'             => $paged
                                );
                                if ( monica_meta_data( '_monica_portfolio_cat' ) ){
                                    $cat_list = explode(',', monica_meta_data( '_monica_portfolio_cat' ));
                                    $args['tax_query'] = array(
                                        array(
                                            'taxonomy' => 'portfolio_category',
                                            'field'    => 'term_id',
                                            'terms'    => $cat_list,
                                            )
                                        );
                                }
                                $wp_query = new WP_Query($args);
                                while ( $wp_query->have_posts() ) : $wp_query->the_post();

                            ?>
                                <div class="col-md-<?php echo esc_attr( $colunn );?> col-lg-<?php echo esc_attr( $colunn );?> col-sm-6 col-xs-12 <?php echo monica_meta_data( '_monica_portfolio_filter') == 'filter1' ? 'element-item' : 'isotope-item'; ?> <?php echo monica_custom_taxonomies_terms_slug( 'portfolio_category' );?>">
                                    <div <?php post_class( 'portfolio-item '.$pistyle );?>>
                                        <div class="portfolio-media">
                                            <?php the_post_thumbnail( $pstyle ); ?>
                                            <div class="portfolio-media-inner">
                                                <div class="portfolio-media-link">
                                                    <div class="portfolio-media-link-inner">
                                                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                                        <span class="desc"><?php echo monica_custom_taxonomies_terms_slug( 'portfolio_category' );?></span>
                                                    </div>
                                                </div>
                                            </div><!-- // .portfolio-media-inner -->
                                            <a class="portfolio-link" href="<?php the_permalink();?>"></a>
                                        </div><!-- // .portfolio-media -->
                                    </div><!-- // .portfolio-item -->
                                </div><!-- // end column -->
                            <?php endwhile; ?>
                            <?php
                                echo paginate_links(
                                    array(
                                        'type' => 'list',
                                    )
                                );
                            ?>
                            <?php wp_reset_postdata(); ?>
                        </div><!-- // .portfolio-list -->

                    </div><!-- // .entry-content-container -->

                </article><!-- // .entry-item -->

            </div><!-- // #archive-content -->

            <?php
                if ( $ctwd == 8)
                    get_sidebar();
            ?>

        </div><!-- // .row -->
    </div><!-- // .container -->
</div><!-- // .site-main -->

<?php get_footer(); ?>