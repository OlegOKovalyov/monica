<div id="post-<?php the_ID(); ?>" <?php post_class( 'entry-item border' ); ?>>
    <?php get_template_part( 'template/content', 'media' ); ?>
    <div class="entry-content-container">
        <div class="entry-title">
            <?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
        </div>
        <div class="entry-info heading-font">
            <span>
                <?php esc_html_e( 'by','vasca' );?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo get_the_author();?></a> <?php esc_html_e( 'on','monica_theme' );?> <?php monica_entry_taxonomies(); ?>
                <?php esc_html_e( 'at','vasca' );?> <time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) );?>"><?php echo get_the_date();?></time><time class="updated" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) );?>"><?php echo get_the_modified_date();?></time>
            </span>
        </div>
        <div class="entry-summary">
            <?php echo strip_tags(get_the_excerpt());?>
        </div>
        <div class="entry-link heading-font">
            <a href="<?php the_permalink();?>"><?php esc_html_e( 'read full article', 'monica_theme' );?></a>
        </div>
    </div>
</div><!-- // article -->