<div <?php post_class( 'portfolio-item '.monica_option_data( 'select_portfolio_style') ); ?>>
    <div class="portfolio-media">
        <?php the_post_thumbnail( 'monica_portfolio' ); ?>
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