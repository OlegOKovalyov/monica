<?php
/**
 * The template for displaying comments.
 *
 * @author      VASCA
 * @package     Monica
 * @version     1.0
 */

if ( post_password_required() )
    return;
?>

<?php if ( have_comments() ) : ?>

<div id="comment-list" class="top-60">

    <div class="comment-nav clearfix heading-font">
        <span class="comment-number"><?php comments_number( esc_html__('No Comment','monica_theme'), esc_html__('1 Comment','monica_theme'), esc_html__('% Comments','monica_theme') );?></span>
        <span class="comment-add"><a href="#"><?php esc_html_e( 'Add your comment','monica_theme' ) ;?></a></span>
    </div>

    <div class="commet-list-content">
        <ul class="commentlist list-unstyled">
            <?php wp_list_comments(array( 'callback' => 'monica_comment' )); ?>
        </ul><!-- .comment-list -->
    </div><!-- // .commet-list-content -->

    <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'monica_theme' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'monica_theme' ) ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'monica_theme' ); ?></p>
    <?php endif; ?>

</div><!-- #comments -->
<?php endif; // have_comments() ?>

<?php if ( comments_open() ) : ?>
<div class="comment-form top-60">
    <h3 class="bottom-40"><?php esc_html_e('Leave a Comment','monica_theme');?></h3>
    <div class="form full">
    <?php

        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        //Custom Fields
        $fields =  array(
            'author'=> '<div class="row form-input"><div class="col-md-4 col-lg-4 bottom-30 field icon-field"><input name="author" type="text" placeholder="' . esc_html__('Name (required)', 'monica_theme') . '" size="30"' . $aria_req . ' /></div>',

            'email' => '<div class="col-md-4 col-lg-4 bottom-30 field icon-field"><input name="email" type="text" placeholder="' . esc_html__('E-Mail (required)', 'monica_theme') . '" size="30"' . $aria_req . ' /></div>',

            'url'   => '<div class="col-md-4 col-lg-4 bottom-30 field icon-field"><input name="url" type="text" placeholder="' . esc_html__('Website', 'monica_theme') . '" size="30" /></div></div>',
        );

        //Comment Form Args
        $comments_args = array(
            'fields' => $fields,
            'comment_notes_after' => ' ',
            'title_reply'=>'',
            'comment_field' => '<textarea class="bottom-30 placeholder="' . esc_html__('Comment', 'monica_theme') . '" id="comment" name="comment" aria-required="true" cols="30" rows="5" tabindex="4"></textarea>',
            'label_submit' => esc_html__('Submit','monica_theme')
        );

        // Show Comment Form
        comment_form($comments_args);
    ?>
    </div>
</div>
<?php endif; ?>