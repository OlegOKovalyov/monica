<?php
/*
    Template Name: User page
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
                                if (get_locale() == 'ru_RU') {
                                    $btnText = 'Назад к альбомам';
                                    $href = '/ru/fotoblog/';
                                } else if (get_locale() == 'en_US') {
                                    $btnText = 'Back to album';
                                    $href = '/en/fotoblog/';
                                } else {
                                    $btnText = 'Назад до альбомів';
                                    $href = '/fotoblog/';
                                }
                                echo '<a href="'.$href.'">'.$btnText.'</a>';
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
        //$('.gallery a').attr('rel', 'gallery').fancybox();
//        jQuery('.wonderplugin-gridgallery-list > div:first-child a').click();
        if (jQuery('html').attr('lang') == 'ru-RU') {
            btnText = 'Назад к альбомам';
            href = '/ru/fotoblog/';
        } else if (jQuery('html').attr('lang') == 'en-US') {
            btnText = 'Back to album';
            href = '/en/fotoblog/';
        } else {
            btnText = 'Назад до альбомів';
            href = '/fotoblog/';
        }
        jQuery('<a href="'+href+'">'+btnText+'</a>').insertAfter('div#html5-text');
        jQuery('.wonderplugin-gridgallery-list > div a').click(function () {

            jQuery('<a href="'+href+'">'+btnText+'</a>').insertAfter('div#html5-text');
        });
    });
//    jQuery(window).load(function ($) {
//        jQuery('.gallery').isotope({
//          itemSelector: '.gallery-item',
//          percentPosition: true,
//          /*masonry: {
//            // use outer width of grid-sizer for columnWidth
//            columnWidth: '.grid-sizer'
//          }*/
//        });
//    });
</script>
<style>
    div#html5-text {
        display: none !important;
    }
    div#html5-text + a {
        padding-left: 10px;
    }
</style>
<?php get_footer(); ?>