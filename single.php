<?php
    get_header();
    //get_template_part( 'heading' );

    // get options
    $sb     = monica_meta_data( '_monica_radio_sidebar_layout' )? monica_meta_data( '_monica_radio_sidebar_layout' ) : monica_option_data( 'select_post_sidebar' );
    $ctwd   = $sb == 'fullwidth' ? 12 : 8;
?>

 <div class="site-main bottom-60">
    <div class="container">

        <div class="row" id="<?php echo esc_attr( $sb );?>">
            <div id="post-content" class="content col-md-<?php echo esc_attr( $ctwd );?>">

                <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-item single' ); ?>>

                    <?php get_template_part( 'template/content', 'media' ); ?>
                    <h1 class="post_title"><?php the_title(); ?></h1>
                    <div class="entry-content-container">

                        <div class="entry-info heading-font">
                            <span>
                                <?php esc_html_e( 'by','vasca' );?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo get_the_author();?></a> <?php esc_html_e( 'on','monica_theme' );?> <?php monica_entry_taxonomies(); ?>
                                <?php esc_html_e( 'at','vasca' );?> <time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) );?>"><?php echo get_the_date();?></time><time class="updated" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) );?>"><?php echo get_the_modified_date();?></time>
                            </span>
                        </div>

                        <div class="entry-content format-content">
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

                        <?php if (has_tag()): ?>

                        <div class="entry-meta heading-font">
                            <?php the_tags( '','' );?>
                        </div>

                        <?php endif; ?>

                        <div class="authorbox">
                            <div class="avatar-area">
                                <div class="avatar-img">
                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                                    </a>
                                </div>
                                <div class="avatar-content">
                                    <h4><?php the_author_meta( 'display_name' ); ?></h4>
                                </div>
                            </div><!-- // .avatar-area -->
                            <div class="author-content">
                                <p><?php the_author_meta( 'user_description' ); ?></p>
                            </div><!-- // .author-content -->
                        </div><!-- // .authorbox -->


                    </div><!-- // .entry-content-container -->

                </article><!-- // .entry-item -->

                <?php
                    if ( monica_option_data( 'switch_comment_posts') && ( comments_open() || get_comments_number() )) {
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
    <div class="conteiner">
        <div class="row">
    <?php if (get_field('content_bottom_icon')) { ?>
        <img src="<?php the_field('content_bottom_icon'); ?>" class="img-responsive" style="margin: auto;">
    <?php } ?>
        </div>
    </div>
</div><!-- // .site-main -->
<div class="content_bottom_icon">

</div>
<?php get_footer(); ?>