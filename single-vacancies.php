<?php
    get_header();
    //get_template_part( 'heading' );

    // get options
    $sb     = monica_meta_data( '_monica_radio_sidebar_layout' )? monica_meta_data( '_monica_radio_sidebar_layout' ) : monica_option_data( 'select_post_sidebar' );
    $ctwd   = $sb == 'fullwidth' ? 12 : 8;
?>

 <div class="site-main bottom-60 vacancies-inner">
    <div class="container">

        <div class="row" id="<?php echo esc_attr( $sb );?>">
            <div id="post-content" class="content col-md-<?php echo esc_attr( $ctwd );?>">

                <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-item single' ); ?>>

                    <?php get_template_part( 'template/content', 'media' ); ?>
                    <h1 class="post_title"><?php the_title(); ?></h1>

                    <div class="vacancies-item-date">
                        <i class="fa fa-clock-o"></i>
                        <?php echo get_the_date('d.m.Y'); ?>
                    </div>
                    <?php if (get_field('place')) { ?>
                        <div class="vacancies-item-place">
                            <i class="fa fa-map-marker"></i>
                            <?php the_field('place'); ?>
                        </div>
                    <?php } ?>

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

                                _e('<b>[:ua]Щоб відповісти на вакансію, зверніться до контактної особи[:ru]Чтобы ответить на вакансию, обратитесь к контактному лицу[:en]To answer a vacancy, contact us[:]</b>');
                            ?> 
                            <ul class="vacancies-inner-contact-data">
                                <?php if (get_field('name')) { ?>
                                    <li class="vacancies-item-contact-name">
                                        <span><?php the_field('name'); ?></span>
                                    </li>
                                <?php } ?>

                                <?php if (get_field('email')) { ?>
                                    <li class="vacancies-item-contact-email">
                                        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if (get_field('phone')) { ?>
                                    <li class="vacancies-item-contact-phone">
                                        <a href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                            
                            <?php _e('<b>[:ua]Також ви можете скористатись формою на сайті, щоб відправити резюме[:ru]Также вы можете воспользоваться формой на сайте, чтобы отправить резюме[:en]You can also use the form on the site to send a resume[:]</b>'); ?><br>
                            <a href="#" id="send_resume"><?php _e('[:ua]Надіслати резюме[:ru]Отправить резюме[:en]Send resume[:]') ?></a>

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
    <div class="container">
        <div class="row">
    <?php if (get_field('content_bottom_icon')) { ?>
        <img src="<?php the_field('content_bottom_icon'); ?>" class="img-responsive" style="margin: auto;">
    <?php } ?>
        </div>
    </div>
</div><!-- // .site-main -->
<div class="content_bottom_icon">

</div>
<div class="resume-wrap">
    <div class="container">
        <form action="<?php echo admin_url('admin-ajax.php')?>?action=send_resume_form" id="resume-form" method="post" enctype="multipart/form-data">
            <h5><?php _e('[:ua]Заповніть форму для звернення щодо вакансії[:ru]Заполните форму для обращения по вакансии[:en]Fill out the job vacancy form[:]') ?></h5>
            <i class="close-form"></i>
            <div class="row">
                <div class="res_main_data_wrap col-md-4">
                    <input type="text" required name="name" placeholder="<?php _e('*[:ua]П.І.Б.[:ru]Ф.И.О.[:en]NAME[:]') ?>">
                    <input type="email" required name="email" placeholder="<?php _e('*EMAIL') ?>">
                </div>
                <div class="res_text_wrap col-md-8">
                    <textarea name="message" placeholder="<?php _e('[:ua]Текст повідомлення[:ru]Текст сообщения[:en]Message[:]') ?>"></textarea>
                </div>
            </div>
            <div class="res_form_bottom row">
                <div class="col-md-4 file_wrap">
                    <div class="res_chose_file" data-placeholder="<?php _e('[:ua]Вибрати файл[:ru]Выбрать файл[:en]Chose file[:]') ?>">
                        <?php _e('[:ua]Вибрати файл[:ru]Выбрать файл[:en]Chose file[:]') ?>
                    </div>
                    <span class="res_file_notification">
                        <?php _e('[:ua]Тільки файл до 20 Мб у форматі: *.doc, *.pdf[:ru]Только файл до 20 Мб в формате * .doc, * .pdf[:en]Only a file up to 20 MB in format: * .doc, * .pdf[:]') ?>
                    </span>
                    <input type="file" name="file" id="file" accept="application/msword, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.wordprocessingml.documen, application/pdf">
                    <label>
                        <input type="checkbox" required="">  <?php _e('[:ua]Погоджуюсь з[:ru]Согласен с[:en]I agree with the[:]') ?> <a href="/obrobka-personalnyh-danyh/"><?php _e('[:ua]обробкою персональних даних[:ru]обработкой персональных данных[:en]processing personal data[:]') ?></a>
                    </label>
                </div>
                <div class="col-md-4 recaptcha_wrap">
                   <div class="g-recaptcha" id="g-recaptcha" data-callback="verifyCaptcha"></div>
                   <div id="error_validation"></div>
                </div>
                <div class="col-md-4">
                    <input type="submit" value="<?php _e('[:ua]Надіслати звернення[:ru]Отправить обращение[:en]Submit[:]') ?>">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function verifyCaptcha() {
        document.getElementById('error_validation').innerHTML = '';
    }
    var onloadCallback = function() {
        grecaptcha.render(document.getElementById('g-recaptcha'), {
           'sitekey' : '6Le9L6oUAAAAAN7byznoM8KQN7SmC2t5PhGwJrck',

        });
    };
</script>

<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>
<?php get_footer(); ?>