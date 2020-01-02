<?php
/**
 * Template Name: We in News
 *
 * @package WordPress
 * @subpackage monica
 * @since monica 1.0
 */


    get_header();
    get_template_part( 'heading' );

    // get options
    $sb     = monica_meta_data( '_monica_radio_sidebar_layout' ) ? monica_meta_data( '_monica_radio_sidebar_layout' ) : monica_option_data( 'select_post_sidebar' );
    $fp     = monica_meta_data( '_monica_full_page_width' ) ? 'container-full' : 'container';
    $ctwd   = $sb == 'fullwidth' ? 12 : 8;
?>

 <div class="site-main <?php echo esc_attr( $fp );?>-wrapper">
    <div class="<?php echo esc_attr( $fp );?>">

        <div class="row" id="<?php echo esc_attr( $sb );?>">
            <div id="page-content" >

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
<?php wp_reset_query(); 
   ?>
            </div><!-- // #archive-content -->
<div class='f4-posts-task'>
<?php
   $args = array(
   'post_type' => 'post',
   'category_name'=> 'mi-v-zmi',
   'orderby' => 'date',
   'order' => 'DESC',
   'posts_per_page' => 6
   );
   
   $wp_query = new WP_Query( $args );
   ?>


<?php
   if ($wp_query->have_posts()) : ?>
   <div class="container">
    <div class="row weinnewsposts">
<?php
   while ($wp_query->have_posts()) :
   
   $wp_query->the_post();
   
 ?>
   
<?php get_template_part( 'template/content-posts', get_post_format() ); ?>
   
   <?php endwhile; ?>
   
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
   <script>
   var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
   var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
   var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
   var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
   </script>

<?php endif; ?>
</div></div>
   <?php endif; ?>
   
   <?php wp_reset_query(); 
   ?>
      <div id="true_loadmore"><?php _e("[:ua]Показати більше[:en]Load more[:ru]Показать больше[:]"); ?></div></div> 

<!--
            <?php
                if ( $ctwd == 8)
                    get_sidebar();
            ?>
-->
        </div><!-- // .row -->
    </div><!-- // .container -->
</div><!-- // .site-main -->

<?php get_footer(); ?>