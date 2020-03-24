<?php
/**
 * Body classes.
 *
 * @package Potter
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

/**
 * Body classes.
 *
 * @param array $classes The body classes.
 *
 * @return array The updated body classes.
 */
function potter_body_classes( $classes ) {

	// Add potter body class.
	$classes[] = 'potter';

	// Add potter-{post-name} body class on singular.
	if ( is_singular() ) {
		global $post;
		$classes[] = 'potter-' . $post->post_name;
	}

	// Sidebar classes.
	if ( is_page() && ! is_page_template( 'sidebar-page.php' ) ) {
		$classes[] = 'potter-no-sidebar';
	} else {
		$classes[] = 'none' === potter_sidebar_layout() ? 'potter-no-sidebar' : 'potter-sidebar-' . potter_sidebar_layout();
	}

	// Full width body class.
	$inner_content = potter_inner_content( $echo = false );

	if ( ! $inner_content ) {
		$classes[] = 'potter-full-width';
	}

	// WooCommerce list layout.
	if ( 'list' === get_theme_mod( 'woocommerce_loop_layout' ) ) {
		$classes[] = 'potter-woo-list-view';
	}

	return $classes;

}
add_filter( 'body_class', 'potter_body_classes' );

/**
 * Post classes.
 *
 * @param array $classes The post classes.
 *
 * @return array The updated post classes.
 */
function potter_post_classes( $classes ) {

	// Add potter-post class to all posts.
	$classes[] = 'potter-post';

	return $classes;

}
add_filter( 'post_class', 'potter_post_classes' );
