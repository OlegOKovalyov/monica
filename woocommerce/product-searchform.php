<form method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <label>
        <input type="search" class="search-field" placeholder="<?php esc_html_e( 'Search ...', 'devox' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_html_e( 'Search for:', 'devox' ) ?>" />
    </label>
    <button><i class="fa fa-search"></i></button>
    <input type="hidden" name="post_type" value="product" />
</form>
