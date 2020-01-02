<?php
    if ( is_front_page() && is_home() )  {
        $logo_title = 'h1';
    } else {
        $logo_title = 'p';
    }
    $logo_white = monica_option_data( 'media_white_logo' );
    $logo_black = monica_option_data( 'media_black_logo' );
    $header_pos = monica_meta_data( '_monica_custom_header_position') ? monica_meta_data( '_monica_custom_header_position') : 'default';
    $header_col = monica_meta_data( '_monica_custom_header_color') ? monica_meta_data( '_monica_custom_header_color') : 'black-color';
?>
<div class="site-header <?php echo esc_attr( $header_pos. ' '.$header_col );?>">

    <?php if ( monica_option_data( 'switch-header-notice' ) || monica_option_data( 'switch-header-social' ) ): ?>

    <div class="site-top-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <?php if ( monica_option_data( 'switch-header-notice' ) ): ?>
                        <div class="site-notice">
                            <span><i class="fa fa-envelope"></i> <?php echo monica_option_data( 'text-header-email' );?></span>
                            <span><i class="fa fa-phone"></i> <?php echo monica_option_data( 'text-header-phone' );?></span>                          
<!--                             <span><i class="fa fa-clock-o"></i> <?php echo monica_option_data( 'text-header-time' );?></span> -->
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 col-sm-6 hidden-xs">
                     <?php if ( monica_option_data( 'switch-header-social' ) ): ?>
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
                                    echo '<li class="facebook"><a href="'.esc_url( $facebook ).'"><i class="fa fa-facebook"></i></a></li>';
                                if ( $twitter )
                                    echo '<li class="twitter"><a href="'.esc_url( $twitter ).'"><i class="fa fa-twitter"></i></a></li>';
                                if ( $linkedin )
                                    echo '<li class="linkedin"><a href="'.esc_url( $linkedin ).'"><i class="fa fa-linkedin"></i></a></li>';
                                if ( $googleplus )
                                    echo '<li class="googleplus"><a href="'.esc_url( $googleplus ).'"><i class="fa fa-google-plus"></i></a></li>';
                                if ( $youtube )
                                    echo '<li class="youtube"><a href="'.esc_url( $youtube ).'"><i class="fa fa-youtube"></i></a></li>';
                                if ( $flickr )
                                    echo '<li class="flickr"><a href="'.esc_url( $flickr ).'"><i class="fa fa-flickr"></i></a></li>';
                                if ( $vimeo )
                                    echo '<li class="vimeo"><a href="'.esc_url( $vimeo ).'"><i class="fa fa-vimeo"></i></a></li>';
                                if ( $dribbble )
                                    echo '<li class="dribbble"><a href="'.esc_url( $dribbble ).'"><i class="fa fa-dribbble"></i></a></li>';
                                if ( $pinterest )
                                    echo '<li class="pinterest"><a href="'.esc_url( $pinterest ).'"><i class="fa fa-pinterest"></i></a></li>';
                                if ( $instagram )
                                    echo '<li class="instagram"><a href="'.esc_url( $instagram ).'"><i class="fa fa-instagram"></i></a></li>';
                                if ( $rss )
                                    echo '<li class="rss"><a href="'.get_bloginfo('rss2_url').'"><i class="fa fa-rss"></i></a></li>';


                            ?>
                        </ul>
                                            <ul class="language-chooser language-chooser-custom qtranxs_language_chooser" id="qtranslate-3-chooser">
<!-- <li class="language-chooser-item language-chooser-item-ru active"><a href="http://kormotech.hostenko.com/ru/" title="Русский (ru)">RU</a></li>
<li class="language-chooser-item language-chooser-item-en"><a href="http://kormotech.hostenko.com/en/" title="English (en)">EN</a></li>
<li class="language-chooser-item language-chooser-item-ua"><a href="http://kormotech.hostenko.com/ua/" title="Українська (ua)">UA</a></li> -->
<!-- <?php echo qtranxf_generateLanguageSelectCode('%c'); ?> -->
<?php the_widget('qTranslateXWidget', array('type' => 'custom', 'format' => '%c')); ?>
</ul>
                    </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="site-menu-container">
        <div class="container">
            <div class="row">

                <div class="col-md-2 col-xs-4 col-sm-4">
                    <div class="site-logo">
                        <<?php echo esc_attr( $logo_title );?>>
                            <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php if ( $logo_white && isset( $logo_white['url'] )): ?>
                                <img class="logo-white" src="<?php echo esc_url( $logo_white['url'] );?>" alt="">
                                <?php endif; ?>
                                <?php if ( $logo_black && isset( $logo_black['url'] )): ?>
                                <img class="logo-black" src="<?php echo esc_url( $logo_black['url'] );?>" alt="">
                                <?php endif; ?>
                            </a>
                        </<?php echo esc_attr( $logo_title );?>>
                    </div>
                </div><!-- // .col-md-4 -->
                <div class="col-md-10 col-xs-8 col-sm-8">
                    <div class="extra-menu">
                        <div class="header-search-form hidden-xs hidden-sm">
                            <form method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                                <input type="search" class="search-field" placeholder="<?php echo __('[:ua]Пошук ...[:ru]Поиск ...[:en]Type to search ...[:]') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr( 'Search for:', 'monica_theme' ) ?>" />
                            </form>
                        </div>
                        <nav>
                            <ul>
                                <?php if ( monica_option_data( 'switch-header-search' ) ): ?>
                                <li class="search hidden-xs hidden-sm"><a href="#"><i class="fa fa-search"></i></a></li>
                                <?php endif; ?>
                                <?php if ( monica_option_data( 'switch-header-cart' ) && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ): ?>
                                <li class="cart"><a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>"><i class="ti-shopping-cart"></i><span class="cart-total"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'woocommerce' ), WC()->cart->cart_contents_count ); ?></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div><!-- // .extra-menu -->
                    <div class="header-menu hidden-sm hidden-xs">

                        <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_html_e( 'Primary Menu', 'monica_theme' ); ?>">
                            <?php
                                if(is_page() && (monica_meta_data('_monica_custom_header_menu') != 'default' && monica_meta_data('_monica_custom_header_menu') )){
                                    wp_nav_menu( array(
                                        'menu'            => monica_meta_data('_monica_custom_header_menu'),
                                        'container'       => 'ul',
                                        'menu_class'      => 'sf-menu heading-font',
                                    ) );
                                } elseif (has_nav_menu('header')){
                                    wp_nav_menu( array(
                                        'theme_location'  => 'header',
                                        'container'       => 'ul',
                                        'menu_class'      => 'sf-menu heading-font',
                                    ) );
                                }
                            ?>
                        </nav><!-- // #site-navigation -->

                    </div><!-- // .header-menu -->
                    <span class="menu-trigger visible-xs visible-sm sb-toggle-right">
                        <i class="fa fa-bars"></i>
                    </span>
                </div><!-- // .col-md-8 -->

            </div><!-- // .row -->
        </div><!-- // .container -->
    </div><!-- // .site-menu-container -->
</div><!-- // .site-header -->