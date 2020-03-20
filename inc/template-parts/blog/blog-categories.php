<?php
/**
 * Categories.
 *
 * Renders categories on archives.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Stop here if this is not a blog post.
if ( 'post' !== get_post_type() ) {
	return;
}

echo '<p class="footer-categories">';

echo '<span class="categories-title">' . esc_html(apply_filters( 'potter_categories_title', __( 'Filed under:', 'potter' ))) . '</span> ';

echo get_the_category_list( ', ' );

echo '</p>';
