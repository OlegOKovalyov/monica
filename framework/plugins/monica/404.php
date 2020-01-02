<?php
    get_header();
?>
<div class="fof-page">
    <div class="text-center">
        <h2><?php esc_html_e('<strong>not found</strong> error','monica_theme');?></h2>
        <h4><?php esc_html_e('the page you\'re looking for is not available','monica_theme');?></h4>
    </div>

    <div class="widget row top-60">
        <div class="col-md-6 col-md-offset-3">
            <?php echo get_search_form(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>