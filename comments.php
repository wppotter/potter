<?php
/**
 * Comments template.
 *
 * @package Potter
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Don't load it if you can't comment.
if ( post_password_required() )	return;

?>

<?php if ( have_comments() ) : ?>

	<?php do_action( 'potter_before_comments' ); ?>

	<section class="commentlist">

		<h3 id="comments-title">
			<?php
			comments_number(
				__( '<span>No</span> Comments', 'potter' ),
				__( '<span>One</span> Comment', 'potter' ),
				__( '<span>%</span> Comments', 'potter' )
			);
			?>
		</h3>

		<ul id="comments" class="comments">
			<?php
			wp_list_comments( array(
				'avatar_size' => 80,
				'callback'    => 'potter_comments',
				'reply_text'  => __( 'Reply', 'potter' ),
			) );
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="potter-comment-nav potter-clearfix" aria-label="<?php esc_attr_e( 'Comments Navigation', 'potter' ); ?>">
			<span class="screen-reader-text"><?php esc_attr_e( 'Comments Navigation', 'potter' ) ?></span>
			<div class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'potter' ) ); ?></div>
			<div class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'potter' ) ); ?></div>
		</nav>
		<?php endif; ?>

	</section>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php esc_attr_e( 'Comments are closed.' , 'potter' ); ?></p>
	<?php endif; ?>

	<?php do_action( 'potter_after_comments' ); ?>

<?php endif; ?>

<?php

$args = array(
	'title_reply'          => apply_filters( 'potter_leave_comment', __( 'Leave a Comment', 'potter' ) ),
	/* translators: Comment title */
	'title_reply_to'       => apply_filters( 'potter_leave_reply', __( 'Leave a Reply to %s', 'potter' ) ),
	'cancel_reply_link'    => apply_filters( 'potter_cancel_reply', __( 'Cancel Reply', 'potter' ) ),
	'label_submit'         => apply_filters( 'potter_post_comment', __( 'Post Comment', 'potter' ) ),
);

do_action( 'potter_before_comment_form' );

comment_form( $args );

do_action( 'potter_after_comment_form' );
