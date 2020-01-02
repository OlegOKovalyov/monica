<form method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="search" class="search-field" placeholder="<?php esc_html_e( 'Search ...', 'monica_theme' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_html_e( 'Search for:', 'monica_theme' ) ?>" />
    <input type="submit" class="search-submit" value="<?php esc_html_e( 'Search', 'monica_theme' ) ?>" />
</form>