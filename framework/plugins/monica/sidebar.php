<div id="sidebar" class="sidebar col-md-3 col-md-offset-1">

    <?php
        if (is_singular( 'portfolio' )):
            $meta = monica_meta_data( '_monica_portfolio_meta_group' );
                if ( $meta ) {
    ?>
    <div class="portfolio-sidebar">
        <div class="portfolio-meta">
            <ul>
            <?php
                $meta = monica_meta_data( '_monica_portfolio_meta_group' );
                    foreach ($meta as $meta_item) {
                    ?>
                    <li>
                        <span class="title"><?php echo esc_attr( $meta_item['title'] );?></span>
                        <span class="desc"><?php echo esc_attr( $meta_item['content'] );?></span>
                    </li>
            <?php
                }
            ?>
            </ul>
        </div><!-- // .portfolio-meta -->
    </div>
    <?php } ?>
    <?php endif; ?>
    <?php
        $sidebar = monica_meta_data('_monica_radio_widget_sidebar') ? esc_attr(monica_meta_data('_monica_radio_widget_sidebar')) : 'default-sidebar';
        if ( is_active_sidebar ( $sidebar ) ) {
            dynamic_sidebar ( $sidebar );
        }
    ?>
</div>