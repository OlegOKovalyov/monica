<div id="footer" class="site-footer">

    <?php if ( monica_option_data( 'switch_footer_widget' ) ): ?>
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <?php
                    $footer_1_w = monica_option_data( 'select_footer_widget_1_width' );
                    $footer_2_w = monica_option_data( 'select_footer_widget_2_width' );
                    $footer_3_w = monica_option_data( 'select_footer_widget_3_width' );
                    $footer_4_w = monica_option_data( 'select_footer_widget_4_width' );
                    $footer_5_w = monica_option_data( 'select_footer_widget_5_width' );
                    $footer_6_w = monica_option_data( 'select_footer_widget_6_width' );
                ?>

                <?php if ( $footer_1_w ) : ?>
                <div class="col-sm-6 col-xs-12 col-md-<?php echo esc_attr( $footer_1_w );?> col-lg-<?php echo esc_attr( $footer_1_w );?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 1')); ?>
                </div>
                <?php endif; ?>

                <?php if ( $footer_2_w ) : ?>
                <div class="col-sm-6 col-xs-12 col-md-<?php echo esc_attr( $footer_2_w );?> col-lg-<?php echo esc_attr( $footer_2_w );?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 2')); ?>
                </div>
                <?php endif; ?>

                <?php if ( $footer_3_w ) : ?>
                <div class="col-sm-6 col-xs-12 col-md-<?php echo esc_attr( $footer_3_w );?> col-lg-<?php echo esc_attr( $footer_3_w );?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 3')); ?>
                </div>
                <?php endif; ?>

                <?php if ( $footer_4_w ) : ?>
                <div class="col-sm-6 col-xs-12 col-md-<?php echo esc_attr( $footer_4_w );?> col-lg-<?php echo esc_attr( $footer_4_w );?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 4')); ?>
                </div>
                <?php endif; ?>

                <?php if ( $footer_5_w ) : ?>
                <div class="col-sm-6 col-xs-12 col-md-<?php echo esc_attr( $footer_5_w );?> col-lg-<?php echo esc_attr( $footer_5_w );?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 5')); ?>
                </div>
                <?php endif; ?>

                <?php if ( $footer_6_w ) : ?>
                <div class="col-sm-6 col-xs-12 col-md-<?php echo esc_attr( $footer_6_w );?> col-lg-<?php echo esc_attr( $footer_6_w );?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 6')); ?>
                </div>
                <?php endif; ?>

            </div>
        </div><!-- // .container -->
    </div><!-- // .footer-widgets -->
    <?php endif; ?>
    <div class="footer-credits heading-font">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <span class="copyright"><?php echo esc_attr( monica_option_data( 'editor_footer_copyright' ) );?></span>
                </div>
                <div class="col-md-9">
                    <div class="social">
                        <?php
                            $facebook       = monica_option_data( 'text-facebook' );
                            $twitter        = monica_option_data( 'text-twitter' );
                            $linkedin       = monica_option_data( 'text-linkedin' );
                            $googleplus     = monica_option_data( 'text-googleplus' );
                            $youtube        = monica_option_data( 'text-youtube' );
                            $flickr         = monica_option_data( 'text-flickr' );
                            $vimeo          = monica_option_data( 'text-vimeo' );
                            $dribbble       = monica_option_data( 'text-dribbble' );
                            $pinterest      = monica_option_data( 'text-pinterest' );
                            $instagram      = monica_option_data( 'text-instagram' );
                            $rss            = monica_option_data( 'checkbox-rss' );
                        ?>
                        <ul>
                            <?php
                                if ( $facebook )
                                    echo '<li class="facebook"><a href="'.esc_url( $facebook ).'">'.esc_html__('Facebook','monica_theme').'</a></li>';
                                if ( $twitter )
                                    echo '<li class="twitter"><a href="'.esc_url( $twitter ).'">'.esc_html__('Twitter','monica_theme').'</a></li>';
                                if ( $linkedin )
                                    echo '<li class="linkedin"><a href="'.esc_url( $linkedin ).'">'.esc_html__('LinkedIn','monica_theme').'</a></li>';
                                if ( $googleplus )
                                    echo '<li class="googleplus"><a href="'.esc_url( $googleplus ).'">'.esc_html__('Google Plus','monica_theme').'</a></li>';
                                if ( $youtube )
                                    echo '<li class="youtube"><a href="'.esc_url( $youtube ).'">'.esc_html__('Youtube','monica_theme').'</a></li>';
                                if ( $flickr )
                                    echo '<li class="flickr"><a href="'.esc_url( $flickr ).'">'.esc_html__('Flickr','monica_theme').'</a></li>';
                                if ( $vimeo )
                                    echo '<li class="vimeo"><a href="'.esc_url( $vimeo ).'">'.esc_html__('Vimeo','monica_theme').'</a></li>';
                                if ( $dribbble )
                                    echo '<li class="dribbble"><a href="'.esc_url( $dribbble ).'">'.esc_html__('Dribbble','monica_theme').'</a></li>';
                                if ( $pinterest )
                                    echo '<li class="pinterest"><a href="'.esc_url( $pinterest ).'">'.esc_html__('Pinterest','monica_theme').'</a></li>';
                                if ( $instagram )
                                    echo '<li class="instagram"><a href="'.esc_url( $instagram ).'">'.esc_html__('Instagram','monica_theme').'</a></li>';
                                if ( $rss )
                                    echo '<li class="rss"><a href="'.get_bloginfo('rss2_url').'">'.esc_html__('RSS','monica_theme').'</a></li>';
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- // #footer -->