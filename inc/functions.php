<?php

/*
 * Sampression - Social Media Icons
 * @param $location header / footer
 * @return Social Media Links
 */
function sampression_social_media_icons() {
	if ( sampression_get_option( 'sampression_socials_facebook' ) || sampression_get_option( 'sampression_socials_twitter' ) ||
	     sampression_get_option( 'sampression_socials_linkedin' ) || sampression_get_option( 'sampression_socials_youtube' ) ||
	     sampression_get_option( 'sampression_socials_googleplus' ) || sampression_get_option( 'sampression_socials_flicker' ) ||
	     sampression_get_option( 'sampression_socials_github' ) || sampression_get_option( 'sampression_socials_instagram' ) ||
	     sampression_get_option( 'sampression_socials_tumblr' ) || sampression_get_option( 'sampression_socials_pinterest' ) ||
	     sampression_get_option( 'sampression_socials_vimeo' )
	) {
		$social_arr = array(
			'sampression_socials_facebook'   => 'facebook',
			'sampression_socials_twitter'    => 'twitter',
			'sampression_socials_linkedin'   => 'linkedin',
			'sampression_socials_youtube'    => 'youtube',
			'sampression_socials_googleplus' => 'google-plus',
			'sampression_socials_flicker'    => 'flicker',
			'sampression_socials_github'     => 'github',
			'sampression_socials_instagram'  => 'instagram',
			'sampression_socials_tumblr'     => 'tumblr',
			'sampression_socials_pinterest'  => 'pinterest',
			'sampression_socials_vimeo'      => 'vimeo'
		);

		foreach ( $social_arr as $key => $value ) {
			if ( sampression_get_option( $key ) ) {
				?>
                <a href="<?php echo esc_url( sampression_get_option( $key ) ); ?>" target="_blank"
                   class="<?php echo esc_attr( 'social-' . $value ); ?>">
                    <i class="fa fa-<?php echo esc_attr( $value ); ?>"></i> </a>
				<?php
			}
		}
	}
}

/**
 * Sampression Post thumbnail
 *
 */
function sampression_post_thumbnail() {
	if ( has_post_thumbnail() && ! post_password_required() ) {
		$link = get_permalink();
		if ( ( is_single() || ( is_page() ) ) && wp_get_attachment_url( get_post_thumbnail_id() ) ) {
			$link = wp_get_attachment_url( get_post_thumbnail_id() );
		}
		//echo $link; die;
		//sam_p($sampression_image_settings);
		echo '<a href="' . $link . '" title="' . the_title_attribute( 'echo=0' ) . '" >';
		$thumb = 'large';
		the_post_thumbnail( $thumb );
		echo '</a>';
	}
}

/**
 * sampression sidebar class
 *
 * @global type $sampression_style
 */
function sampression_sidebar_class( $classes = array() ) {
	$position = sampression_sidebar_position();
	$class    = '';
	if ( $position === 'right' ) {
		$class = 'four columns offset-by-one';
	} else {
		$class = '';
	}
	if ( ! empty( $classes ) ) {
		if ( is_array( $classes ) ) {
			$class .= ' ' . implode( ' ', $classes );
		} else {
			$class .= ' ' . $classes;
		}
	}
	echo $class;
}

/**
 * Sampression content class
 *
 * @global type $sampression_style
 */
function sampression_content_class( $classes = array() ) {
	$position = sampression_sidebar_position();
	$class    = '';
	if ( $position === 'left' ) {
		$class = 'eleven offset-by-one columns';
	} elseif ( $position === 'right' ) {
		$class = 'eleven columns';
	} else {
		$class = 'sixteen columns';
	}
	if ( ! empty( $classes ) ) {
		if ( is_array( $classes ) ) {
			$class .= ' ' . implode( ' ', $classes );
		} else {
			$class .= ' ' . $classes;
		}
	}
	echo $class;
}

/*
 * Sampression sidebar postition/ layout
 */
function sampression_sidebar_position() {
	return sampression_get_option( 'sampression_sidebar_layout' );
}


/**
 * Get blog title if use-title is set in sampression backend
 * else get logo icon
 *
 * @global type $sampression_logo_icon
 */
function sampression_blog_title() {
	global $sampression_options_settings;
	$options = $sampression_options_settings;
	if ( esc_attr( $options['use_logo_title'] ) === 'use_title' ) {
		echo '<h1 class="site-title"><a href="' . esc_url( home_url() ) . '" class="home-link">' . get_bloginfo( 'name' ) . '</a></h1>';
		if ( esc_attr( $options['use_web_desc'] ) === 'yes' ) {
			echo '<h2 class="site-description">' . get_bloginfo( 'description' ) . '</h2>';
		}
	} else {
		echo '<div id="logo"><a href="' . esc_url( home_url() ) . '" class="home-link"><img src="' . esc_url( $options['logo_url'] ) . '" title="' . get_bloginfo( 'name' ) . '" alt="' . get_bloginfo( 'name' ) . '" /></a></div>';
	}
}

function sampression_navigation() {
	$args = array(
		'menu_class'      => 'main-nav clearfix',
		'theme_location'  => 'primary',
		'container'       => 'div',
		'container_class' => 'main-nav-wrapper',
		'fallback_cb'     => 'sampression_primary_navigation_fallback'
	);
	wp_nav_menu( $args );
}

function sampression_primary_navigation_fallback() {
	$args = array(
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => 'main-nav-wrapper',
	);
	wp_page_menu( $args );
}

if ( ! function_exists( 'sampression_the_title' ) ) :
	function sampression_the_title() {
		if ( get_post_format() === 'link' ) {
			the_title( '<h1 class="entry-title"><a href="' . esc_url( sampression_get_link_url() ) . '" rel="bookmark">', '</a></h1>' );
		} else {
			if ( is_single() || is_page() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		}
	}
endif;

if ( ! function_exists( 'sampression_post_meta' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function sampression_post_meta() {
		$posted      = '';
		$post_format = 'Posted';
		if ( get_post_format() === 'chat' ) {
			$post_format = 'chat';
		} elseif ( get_post_format() === 'status' ) {
			$post_format = 'status';
		} elseif ( get_post_format() === 'video' ) {
			$post_format = 'video';
		}

		$sm_meta = '';

		$hide_metas = (array) sampression_get_option( 'hide_post_metas' );

		if ( ! in_array( 'author', $hide_metas ) ) {
			global $authordata;
			$sm_meta .= sprintf(
				'<span class="author">%4$s by <a href="%1$s" title="%2$s" rel="author">%3$s</a></span> ',
				esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),
				esc_attr( sprintf( __( 'Posts by %s', 'naya-lite' ), get_the_author() ) ),
				get_the_author(),
				$post_format
			);
		}
		if ( ! in_array( 'date', $hide_metas ) ) {
			$time    = '';
			$sm_meta .= sprintf(
				'<time datetime="%2$s" class="entry-date"><a href="%3$s">%1$s' . $time . '</a></time>',
				get_the_date(),
				get_the_date( 'c' ),
				get_permalink()
			);
		}

		if ( ! in_array( 'categories', $hide_metas ) ) {
			if ( get_the_category_list() ) {
				$sm_meta .= '<span class="categories-links"> under ' . get_the_category_list( __( ', ', 'naya-lite' ) ) . '</span> ';
			}
		}
		if ( ! in_array( 'tags', $hide_metas ) ) {
			if ( get_the_tag_list() ) {
				$sm_meta .= '<span class="tags-links">' . get_the_tag_list( '', ', ', '' ) . '</span>';
			}
		}

		echo $sm_meta;
	}

endif;


if ( ! function_exists( 'sampression_post_meta_content' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function sampression_post_meta_content(){
		$hide_metas = (array) sampression_get_option( 'hide_post_metas' );

		$sm_meta = '';

		$post_format = 'Posted';
		if ( get_post_format() === 'chat' ) {
			$post_format = 'chat';
		} elseif ( get_post_format() === 'status' ) {
			$post_format = 'status';
		} elseif ( get_post_format() === 'video' ) {
			$post_format = 'video';
		}

		if (  in_array( 'tags', $hide_metas ) &&  in_array( 'categories', $hide_metas ) &&   in_array( 'date', $hide_metas )  &&
		  in_array( 'author', $hide_metas )) {
			$sm_meta .= '';
		}else{
			$sm_meta .= '<div class="entry-meta meta">';
		}
		if ( ! in_array( 'author', $hide_metas ) ) {
			global $authordata;
			$sm_meta .= sprintf(
				'<span class="author">%4$s By <a href="%1$s" title="%2$s" rel="author">%3$s</a></span> ',
				esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),
				esc_attr( sprintf( __( 'Posts by %s', 'naya-lite' ), get_the_author() ) ),
				get_the_author(),
				$post_format
			);
		}
		if ( ! in_array( 'date', $hide_metas ) ) {
			$time    = '';
			$sm_meta .= sprintf(
				'<time datetime="%2$s" class="entry-date"><a href="%3$s">%1$s' . $time . '</a></time>',
				get_the_date(),
				get_the_date( 'c' ),
				get_permalink()
			);
		}

		if ( ! in_array( 'categories', $hide_metas ) ) {
			if ( get_the_category_list() ) {
				$sm_meta .= '<span class="categories-links"> under ' . get_the_category_list( __( ', ', 'naya-lite' ) ) . '</span> ';
			}
		}
		if ( ! in_array( 'tags', $hide_metas ) ) {
			if ( get_the_tag_list() ) {
				$sm_meta .= '<span class="tags-links">' . get_the_tag_list( '', ', ', '' ) . '</span>';
			}
		}
		if ( ! in_array( 'tags', $hide_metas ) && ! in_array( 'categories', $hide_metas ) &&  ! in_array( 'date', $hide_metas )  &&
		 ! in_array( 'author', $hide_metas )) {
			$sm_meta .= '</div>';
		}else{
			$sm_meta .= '';
		}

		echo $sm_meta;
	}

endif;

if ( ! function_exists( 'sampression_content_nav' ) ) :
	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function sampression_content_nav() {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

		?>
        <nav role="navigation" class="<?php echo $nav_class; ?> clearfix">
            <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'naya-lite' ); ?></h1>

			<?php if ( is_attachment() ) {

				$prev_image = sampression_get_previous_image_id();
				$next_image = sampression_get_previous_image_id( false );

				?>
                <span class="nav-next alignright"><?php next_image_link( false, sampression_truncate_text( $next_image->post_title, 35 ) ) ?></span>
                <span class="nav-prev alignleft"><?php previous_image_link( false, sampression_truncate_text( $prev_image->post_title, 35 ) ) ?></span>
				<?php
			} elseif ( is_single() ) { // navigation links for single posts ?>
				<?php
				$prev_post = get_adjacent_post( '', '', true );
				$next_post = get_adjacent_post( '', '', false );
				?>
				<?php
				if ( ! empty( $prev_post ) ) {
					previous_post_link( '%link', '&larr; ' . sampression_truncate_text( get_the_title( $prev_post->ID ), 35 ) );//'%title'
				}
				if ( ! empty( $next_post ) ) {
					next_post_link( '%link', sampression_truncate_text( get_the_title( $next_post->ID ), 35 ) . ' &rarr;' );//'%title'
				}
				?>

			<?php } elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) { // navigation links for home, archive, and search pages ?>

				<?php if ( get_next_posts_link() ) : ?>
					<?php next_posts_link( __( 'Older Posts &rarr;', 'naya-lite' ) ); ?>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<?php previous_posts_link( __( '&larr; Newer Posts', 'naya-lite' ) ); ?>
				<?php endif; ?>

			<?php } ?>

        </nav>
		<?php
	}
endif;

function sampression_get_previous_image_id( $prev = true ) {
	$post        = get_post();
	$attachments = array_values( get_children( array( 'post_parent'    => $post->post_parent,
	                                                  'post_status'    => 'inherit',
	                                                  'post_type'      => 'attachment',
	                                                  'post_mime_type' => 'image',
	                                                  'order'          => 'ASC',
	                                                  'orderby'        => 'menu_order ID'
	) ) );

	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID ) {
			break;
		}
	}
	$k      = $prev ? $k - 1 : $k + 1;
	$output = $attachment_id = null;
	if ( isset( $attachments[ $k ] ) ) {
		$attachment_id = $attachments[ $k ]->ID;
	}

	return get_post( $attachment_id );
}


if ( ! function_exists( 'sampression_attached_image' ) ) {

	function sampression_attached_image() {

		$post                = get_post();
		$next_attachment_url = wp_get_attachment_url();

		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, 'large' )
		);
	}

}

add_filter( 'next_posts_link_attributes', 'sampression_next_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'sampression_previous_posts_link_attributes' );

function sampression_next_posts_link_attributes() {
	return 'class="nav-next alignright"';
}

function sampression_previous_posts_link_attributes() {
	return 'class="nav-prev alignleft"';
}

add_filter( 'next_post_link', 'sampression_next_post_link' );
add_filter( 'previous_post_link', 'sampression_previous_post_link' );

function sampression_next_post_link( $url ) {
	return preg_replace( '/rel="next"/', 'rel="next" class="nav-next alignright"', $url );
}

function sampression_previous_post_link( $url ) {
	return preg_replace( '/rel="prev"/', 'rel="next" class="nav-prev alignleft"', $url );
}

/*=======================================================================
 * Comment Reply
 *=======================================================================*/
function sampression_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'sampression_enqueue_comment_reply' );

if ( ! function_exists( 'sampression_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 */
	function sampression_comment( $comment_nayalite, $args, $depth ) {
		//$GLOBALS['comment'] = $comment_nayalite;

		if ( 'pingback' == $comment_nayalite->comment_type || 'trackback' == $comment_nayalite->comment_type ) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <div class="comment-body">
				<?php _e( 'Pingback:', 'naya-lite' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'naya-lite' ), '<span class="edit-link">', '</span>' ); ?>
            </div>

		<?php else : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

                <div class="author-avatar vcard">
					<?php if ( 0 != $args['avatar_size'] ) {
						echo get_avatar( $comment_nayalite, $args['avatar_size'] );
					} ?>

                </div><!-- .comment-author -->

                <div class="comment-wrapper">
                    <div class="comment-meta">
                        <div class="comment-author clearfix">

                            <span class="fn"><?php echo get_comment_author_link() ?></span>
                            <a href="<?php echo esc_url( get_comment_link( $comment_nayalite->comment_ID ) ); ?>">
                                <time datetime="<?php comment_time( 'c' ); ?>"><span
                                            class="date-details"><?php echo get_comment_date(); ?>
                                        at <?php echo get_comment_time(); ?></span></time>
                            </a>
                        </div>
                    </div>
                    <div class="comment-content clearboth">
						<?php comment_text(); ?>
                    </div>
                    <!--                                        <a href="#" class="comment-reply-link">Reply</a>-->
					<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
					) ) );
					?>
                </div>


				<?php if ( '0' == $comment_nayalite->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'naya-lite' ); ?></p>
				<?php endif; ?>


            </article><!-- .comment-body -->

			<?php
		endif;
	}
endif;

/**
 * Return the post URL.
 *
 */
function sampression_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Truncate string in center
 *
 * @param $file File basename
 *
 * @return truncated file name
 */
function sampression_truncate_text( $str, $length = 20 ) {
	if ( strlen( $str ) <= $length ) {
		return $str;
	}
	$separator       = '...';
	$separatorlength = strlen( $separator );
	$maxlength       = $length - $separatorlength;
	$start           = $maxlength / 2;
	$trunc           = strlen( $str ) - $maxlength;

	return substr_replace( $str, $separator, $start, $trunc );
}

/*
 * Display font select menu
 *
 * @param $name Select Menu Name
 * @param $class Select Menu Class Name(s)
 * @param $default Select Menu Default Value i.e. selected value
 */
function sampression_font_select( $name = '', $class = '', $default = '' ) {
	$default_fonts = (object) sampression_fonts_style();
	$fonts         = $default_fonts->fonts;
	$return        = '';
	$return        .= '<select name="' . $name . '" class="' . $class . '">';
	foreach ( $fonts as $fkey => $fval ) {
		$return .= '<optgroup label="' . ucwords( str_replace( '-', ' ', $fkey ) ) . '">';
		foreach ( $fval as $key => $val ) {
			$sel = '';
			if ( $default !== '' && ( $val == $default ) ) {
				$sel = ' selected="selected"';
			}
			$return .= '<option value="' . $val . '"' . $sel . '>' . $key . '</option>';
		}
		$return .= '</optgroup>';
	}
	$return .= '</select>';
	echo $return;
}

/*
 * Display font size select menu
 *
 * @param $name Select Menu Name
 * @param $class Select Menu Class Name(s)
 * @param $default Select Menu Default Value i.e. selected value
 * @param $min Minimum size value
 * @param $max Maximum size value
 */
function sampression_font_size_select( $name = '', $class = '', $default = '' ) {
	$default_fonts = (object) sampression_fonts_style();
	$size          = $default_fonts->size;
	$return        = '';
	$return        .= '<select name="' . $name . '" class="' . $class . '">';
	for ( $i = $size['min_value']; $i <= $size['max_value']; $i ++ ) {
		$sel = '';
		if ( $default !== '' && ( $i == $default ) ) {
			$sel = ' selected="selected"';
		}
		$return .= '<option value="' . $i . '"' . $sel . '>' . $i . 'px</option>';
	}
	$return .= '</select>';
	echo $return;
}

/*
 * Display font style select menu
 *
 * @param $name Select Menu Name
 * @param $class Select Menu Class Name(s)
 * @param $default Select Menu Default Value i.e. selected value
 */
function sampression_font_style_select( $name = '', $class = '', $default = '' ) {
	$default_fonts = (object) sampression_fonts_style();
	$style         = $default_fonts->style;
	$return        = '';
	$return        .= '<select name="' . $name . '" class="' . $class . '">';
	foreach ( $style as $key => $val ) {
		$sel = '';
		if ( $default !== '' && ( $val == $default ) ) {
			$sel = ' selected="selected"';
		}
		$return .= '<option value="' . $val . '"' . $sel . '>' . $key . '</option>';
	}
	$return .= '</select>';
	echo $return;
}

/*
 * Display font transformation select menu
 *
 * @param $name Select Menu Name
 * @param $class Select Menu Class Name(s)
 * @param $default Select Menu Default Value i.e. selected value
 */
function sampression_font_transformation_select( $name = '', $class = '', $default = '' ) {
	$default_transformation = (object) sampression_fonts_style();
	$transformation         = $default_transformation->transformation;
	$return                 = '';
	$return                 .= '<select name="' . $name . '" class="' . $class . '">';
	foreach ( $transformation as $key => $val ) {
		$sel = '';
		if ( $default !== '' && ( $val == $default ) ) {
			$sel = ' selected="selected"';
		}
		$return .= '<option value="' . $val . '"' . $sel . '>' . $key . '</option>';
	}
	$return .= '</select>';
	echo $return;
}

function sampression_readmore_link() {
	if ( get_the_excerpt() ) {
		$more = 'Read more';
		printf( '<div class="entry-footer"><a href="%2$s">%1$s</a></div>', $more, get_permalink() );
	}
}

function sampression_post_class() {
	global $sampression_options_settings;
	$options = $sampression_options_settings;
	if ( $options['show_meta_icon'] == 'yes' ) {
		return array( 'format-icon', 'clearfix' );
	}

	return array( 'clearfix' );

}

function sampression_get_post_format() {
	$format = get_post_format();
	if ( false === $format ) {
		$format = 'standard';
	}

	return $format;
}
