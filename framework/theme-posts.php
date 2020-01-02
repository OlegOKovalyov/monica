<?php

/**
 * Custom Expcerpt Length
 *
 * @since VASCA v1.0
 */
function monica_excerpt_length( $length ) {
	monica_option_data('text_excerptlength') ? $lg = monica_option_data('text_excerptlength') : $lg = 30;
	return $lg;
}
add_filter( 'excerpt_length', 'monica_excerpt_length', 999 );
function monica_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'monica_excerpt_more');

function monica_custom_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

/**
*
* Post Comments
*
* @since VASCA v1.0
*/
function monica_comment( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
    <li id="li-comment-<?php comment_ID() ?>" <?php comment_class('media comment-item'); ?>>
        <div class="comment-body clearfix" id="comment-<?php comment_ID() ?>">
            <div class="avatar">
                <?php echo get_avatar( $comment,$size='100'); ?>
            </div>
            <div class="comment-text">
                <div class="author">
                    <span class="heading-font"><?php printf( __( '%s', 'monica_theme'), get_comment_author_link() ) ?></span>
                    <time class="comment-date" datetime="<?php echo get_comment_date('c');?>"><?php printf(esc_html__('%1$s at %2$s', 'monica_theme'), get_comment_date(),  get_comment_time() ) ?></time>
                </div>
                <div class="text format-content">
                    <?php comment_text() ?>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'monica_theme' ) ?></em>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php
}

function monica_entry_taxonomies() {
    $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'monica_theme' ) );
    if ( $categories_list && monica_categorized_blog() ) {
        echo $categories_list;
    }
}
function monica_get_entry_taxonomies() {
    $out = '';
    $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'monica_theme' ) );
    if ( $categories_list && monica_categorized_blog() ) {
        $out =  $categories_list;
    }
    return $out;
}

function monica_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'monica_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'monica_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so monica_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so monica_categorized_blog should return false.
        return false;
    }
}

function monica_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'monica_categories' );
}
add_action( 'edit_category', 'monica_category_transient_flusher' );
add_action( 'save_post',     'monica_category_transient_flusher' );

/* Blog Media */
function monica_blog_media( $size = 'monica_blog-normal'  ) {
    $out = '';
    $post_format = get_post_format();
    if (($post_format == 'quote') && monica_meta_data( '_monica_post_quotes' )):
        $out = '<div class="entry-media 222"><div class="entry-quotes"><a href="'.get_permalink().'">'.monica_meta_data( '_monica_post_quotes' ).'</a></div></div>';
    elseif (($post_format == 'video' || $post_format == 'audio') && ( monica_meta_data( '_monica_post_format_media' )) || monica_meta_data( '_monica_custom_post_format_media' ) ):
        $out .= '<div class="entry-media 222">';
        $url = wp_oembed_get( esc_html( monica_meta_data( '_monica_post_format_media' ) ) );
            if ($url) {
                $out .= str_replace(array(' webkitallowfullscreen mozallowfullscreen allowfullscreen','frameborder="0"','frameborder="no"','scrolling="no"','allowfullscreen=""','&'), array('','','','','','&amp;'), $url);
            } else {
                $out .= wp_kses( monica_meta_data( '_monica_custom_post_format_media' ) ,array (
                    'iframe' => array(),
                    'src'    => array(),
                ));
            }
        $out .= '</div>';
    elseif ($post_format == 'gallery' && monica_meta_data ('_monica_post_gallery')): $gallery_images = monica_meta_data ('_monica_post_gallery');
        $out .= '<div class="entry-media 222 gallery-'.monica_meta_data( '_monica_post_gallery_style').'">';
        if ( monica_meta_data( '_monica_post_gallery_style') == 'slide' ) :
        $out .= '<div class="image-slider">';
                foreach( $gallery_images as $image => $image_id ) :
                $img = wp_get_attachment_image_src( $image, $size );

        $out .= '<div class="item"><img src="'.esc_url( $img[0] ).'" alt="" class="img-responsive" draggable="false"></div>';
            endforeach;
        $out .= '</div>';
        else: wp_enqueue_script( 'masonry' );
        $out .= '<div class="image-masonry row small">';
            foreach( $gallery_images as $image => $image_id ) :
            $img = wp_get_attachment_image_src( $image, 'monica_blog-masonry' );
        $out .= '<div class="col-md-4 masonry-item"><img src="'.esc_url( $img[0] ).'" alt="" class="img-responsive" draggable="false"></div>';
           endforeach;
        $out .= '</div>';
        endif;
        $out .= '</div>';
    elseif(has_post_thumbnail()):
        $out .= '<div class="entry-media 222">';
        $out .= '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail( get_the_id(), $size ).'</a>';
        $out .= '</div>';
    endif;
    return $out;
}