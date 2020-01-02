<?php
    if ( monica_meta_data( '_monica_hidden_heading' ) != 'on' ) :
    $heading_size = monica_meta_data('_monica_custom_heading_size') ? monica_meta_data('_monica_custom_heading_size') : monica_option_data( 'select_page_heading_size' );
    $heading_bgcl = monica_meta_data('_monica_custom_heading_bgcolor') ? monica_meta_data('_monica_custom_heading_bgcolor') : monica_option_data( 'select_page_heading_bgcolor' );
    $option_bg    = monica_option_data( 'media_heading_bg' );
    $option_bg    = ( $option_bg && isset( $option_bg['url'] ) ) ? $option_bg['url'] : '';
    $heading_bg   = monica_meta_data('_monica_custom_heading_background') ? monica_meta_data('_monica_custom_heading_background') : $option_bg;
    $heading_tcl  = monica_meta_data('_monica_custom_heading_text_color') ? monica_meta_data('_monica_custom_heading_text_color') : monica_option_data('select_page_heading_text_color');
    $heading_cl   = $heading_bgcl == 'bg' ? $heading_tcl : 'default-color';
    $col = $heading_size == 'small' ? 6 : 12;
?>
<div class="site-heading section <?php echo esc_attr( $heading_size. ' '. $heading_bgcl. ' '.$heading_cl );?>">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_attr( $col );?>">

                    <h2>
                        <span>
                            <?php
                                if (monica_meta_data('_monica_custom_heading_title')) :
                                    echo esc_attr( monica_meta_data('_monica_custom_heading_title') );
                                elseif ( is_home() ) :
                                    printf( get_bloginfo( 'name' ));
                                elseif ( is_404() ):
                                    printf( esc_html__( 'Content not found', 'monica_theme' ) );
                                elseif ( is_day() ) :
                                    printf( __( '%s', 'monica_theme' ), get_the_date() );
                                elseif ( is_month() ) :
                                    printf( __( '%s', 'monica_theme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'monica_theme' ) ) );
                                elseif ( is_year() ) :
                                    printf( __( '%s', 'monica_theme' ), get_the_date( _x( 'Y', 'yearly archives date format', 'monica_theme' ) ) );
                                elseif ( is_singular() ) :
                                    echo the_title('', '', $echo = false );
                                elseif ( is_category() ) :
                                    printf( __( '%s', 'monica_theme' ), single_cat_title( '', false ) );
                                elseif ( is_tag() ) :
                                    printf( __( '%s', 'monica_theme' ), single_tag_title( '', false ) );
                                elseif ( is_search() ) :
                                    printf( __( '%s', 'monica_theme' ), get_search_query() );
                                elseif ( is_tax() ) :
                                    printf( __( '%s', 'monica_theme' ), single_cat_title( '', false ) );
                                elseif ( is_archive( 'product' ) && single_cat_title( '', false ) ):
                                    printf( __( '%s', 'monica_theme' ), single_cat_title( '', false ) );
                                elseif ( is_archive( 'product' ) ):
                                    printf( esc_html__( 'Shop', 'monica_theme' ), single_cat_title( '', false ) );
                                else :
                                    esc_html_e( 'Archives', 'monica_theme' );
                                endif;
                            ?>
                        </span>
                    </h2>

                    <div class="page-tagline">
                        <span>
                            <?php
                                if (monica_meta_data('_monica_custom_heading_desc')) :
                                    echo '<span class="subheading">'.esc_attr( monica_meta_data('_monica_custom_heading_desc') ).'</span>';
                                elseif ( is_home() ) :
                                    printf( '<span class="subheading">'.get_bloginfo( 'description' ).'</span>');
                                elseif ( is_404() ):
                                    printf( '<span class="subheading">'.esc_html__( 'Please try another keywords', 'monica_theme' ).'</span>' );
                                elseif ( is_singular('portfolio') ) :
                                    printf( '<span class="subheading">'.esc_html__( 'Portfolio', 'monica_theme' ).'</span>' );
                                elseif ( is_singular('product') ) :
                                    printf( '<span class="subheading">'.esc_html__( 'Product', 'monica_theme' ).'</span>' );
                                elseif ( is_single() ) :
                                    printf( '<span class="subheading">'.esc_html__( 'Blog', 'monica_theme' ).'</span>' );
                                elseif ( is_category() ) :
                                    printf( '<span class="subheading">'.esc_html__( 'Category Archives', 'monica_theme' ), single_cat_title( '', false ).'</span>' );
                                elseif ( is_tag() ) :
                                    printf( '<span class="subheading">'.esc_html__( 'Tag Archives', 'monica_theme' ), single_tag_title( '', false ).'</span>' );
                                elseif ( is_search() ) :
                                    printf( '<span class="subheading">'.esc_html__( 'Search Results', 'monica_theme' ), get_search_query().'</span>' );
                                endif;
                            ?>
                        </span>
                    </div>

                    <?php if ( $col == 12 && $heading_size != 'small' ): ?>

                    <div class="divider-icon">
                        <span><i class="ti-medall"></i></span>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <?php if ( $heading_bgcl == 'bg' && $heading_bg ): ?>
    <div class="background-image parallax">
        <img src="<?php echo esc_url( $heading_bg );?>" alt="">
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>