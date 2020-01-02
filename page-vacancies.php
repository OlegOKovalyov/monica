<?php
/*
    Template Name: Vacancies
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

                <?php endwhile; ?>
                
                
                    <?php
                        $locale = get_locale(); // ru_RU, uk, en_US

                        // задаем нужные нам критерии выборки данных из БД
                        
                       if ($locale !="ru_RU")        
                        $ppp = 9;

                        $args = array(
                            'post_type' => 'vacancies',
                            'posts_per_page' => $ppp,
                        );

                        $query = new WP_Query( $args );

                        // Цикл
                        if ( $query->have_posts() ) { ?>
                            <div class="vacancies-wrap">
                            <?php while ( $query->have_posts() ) {
                                $query->the_post(); ?>

                                <?php if ($locale == "ru_RU") { ?>

                                <?php } else { ?>
                                    <article <?php post_class('vacancies-item'); ?>>
                                        <div class="vacancies-item-date">
                                            <i class="fa fa-clock-o"></i>
                                            <?php echo get_the_date('d.m.Y'); ?>
                                        </div>
                                        <h4>
                                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        </h4>
                                        <div class="vacancies-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="entry-link heading-font">
                                            <a href="<?php the_permalink() ?>"><?php _e('[:ua]читати далі[:ru]читать дальше[:en]read more[:]') ?></a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php
                            } ?>
                            </div>

                            <?php

                            if ($locale == "ru_RU") {
                                echo '<div class="interested">
                                        <p style="text-align: center; font-weight: bold; color: #000000; font-size: 20px;">Kormotech ищет людей в свою команду только на территории Украины. Вы можете ознакомиться со всеми вакансиями на украиноязычной версии сайта. Пожалуйста, измените язык страницы или нажмите кнопку ниже</p>
                                        </div>';
                            }

                            $all_vacancies = wp_count_posts('vacancies')->publish;


                            if (wp_count_posts('vacancies')->publish > $ppp) {
                                if ($locale == "ru_RU") {
                                    echo "<a href='http://kormotech.com/ua/vacancies/' class='more_vacancies' data-page='0'>".__('Посмотреть вакансии')." </a>";
                                } else {
                                    echo "<a href='#' class='more_vacancies' data-page='0'>" . __('[:ua]Більше вакансій[:en]More vacancies[:]') . " <span>(" . ($all_vacancies - $ppp) . ")</span></a>";
                                }
                            }




                        } else {
                            _e('[:ua]Поки що нема вакансій[:ru]Пока что нет вакансий[:en]No vacancies found[:].');
                        }

                        
                        /* Возвращаем оригинальные данные поста. Сбрасываем $post. */
                        wp_reset_postdata();
                    ?>

            </div><!-- // #archive-content -->

            <?php
                if ( $ctwd == 8)
                    get_sidebar();
            ?>

        </div><!-- // .row -->
    </div><!-- // .container -->
</div><!-- // .site-main -->
<script type="text/javascript">
    function morePost () {
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
        var ppp = 3; // Post per page

        jQuery(".more_vacancies").on("click", function(e) { // When btn is pressed.
            e.preventDefault();
            that = jQuery(this);
            
            page = that.attr('data-page');
            //console.log(page);

            that.attr("disabled",true); // Disable the button, temp.

            jQuery.post(ajaxUrl, {
                action:"more_vacancies",
                offset: page == 0 ? <?php echo $ppp; ?> :  (page * ppp) + <?php echo $ppp; ?>,
                ppp: ppp,
            }).success(function(resp){

                jQuery('.vacancies-wrap').append(resp.data.posts);

                that.attr('data-page', ++page);

                if (resp.data.vacancies_count >= 0 && resp.data.vacancies_count != '') {
                    that.find('span').text('('+resp.data.vacancies_count+')');
                    that.attr("disabled",false);
                } else {
                    that.fadeOut(300);
                }
                
            });

       });
    }
    document.addEventListener("DOMContentLoaded", morePost);
    </script>
<?php get_footer(); ?>