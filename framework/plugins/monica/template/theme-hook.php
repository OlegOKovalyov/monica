<?php
function monica_theme_preloader_body(){
    if ( monica_option_data( 'switch-fixed-preloader' )): ?>
    <div class="loader">
        <div class="load-spinner">
            <div class="loader-inner ball-clip-rotate-multiple">
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <?php endif;
}
add_action( 'monica_before_site', 'monica_theme_preloader_body' );

function monica_theme_slidebar_content() { ?>

<div class="sb-slidebar sb-right">
    <div class="mobile-menu-area">
        <span class="dl-trigger"></span>
    </div>
</div><!-- // .sb-slidebar -->

<?php }
add_action( 'monica_end_site', 'monica_theme_slidebar_content' );