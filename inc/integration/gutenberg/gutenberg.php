<?php
/**
 * Gutenberg integration.
 *
 * @package Potter
 * @subpackage Integration/Gutenberg
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

/**
 * Theme setup.
 */
function potter_gutenberg_theme_setup() {

	// Editor styles.
	add_theme_support( 'editor-styles' );

	// Add support for wide aligned elements.
	add_theme_support( 'align-wide' );

	// Gutenberg default font sizes.

	// Page font size.
	$page_font_size_desktop = get_theme_mod( 'page_font_size_desktop' ) ? (int) get_theme_mod( 'page_font_size_desktop' ) : 16;

	// Only use page font size if it's not greater then the next larger font size.
	if ( $page_font_size_desktop >= 20 ) {
		$page_font_size_desktop = 16;
	}

	add_theme_support( 'editor-font-sizes', array(

		array(
			'name'      => __( 'tiny', 'potter' ),
			'shortName' => __( 'XS', 'potter' ),
			'size'      => 12,
			'slug'      => 'tiny',
		),

		array(
			'name'      => __( 'small', 'potter' ),
			'shortName' => __( 'S', 'potter' ),
			'size'      => 14,
			'slug'      => 'small',
		),

		array(
			'name'      => __( 'regular', 'potter' ),
			'shortName' => __( 'M', 'potter' ),
			'size'      => $page_font_size_desktop,
			'slug'      => 'regular',
		),

		array(
			'name'      => __( 'large', 'potter' ),
			'shortName' => __( 'L', 'potter' ),
			'size'      => 20,
			'slug'      => 'large',
		),

		array(
			'name'      => __( 'larger', 'potter' ),
			'shortName' => __( 'XL', 'potter' ),
			'size'      => 32,
			'slug'      => 'larger',
		),

		array(
			'name'      => __( 'extra', 'potter' ),
			'shortName' => __( 'XXL', 'potter' ),
			'size'      => 44,
			'slug'      => 'extra',
		),

	) );

}
add_action( 'after_setup_theme', 'potter_gutenberg_theme_setup' );

/**
 * Generate CSS.
 */
function potter_generate_gutenberg_css() {

	ob_start();
	include_once POTTER_THEME_DIR . '/inc/integration/gutenberg/gutenberg-styles.php';
	return potter_minify_css( ob_get_clean() );

}

/**
 * Add editor styles.
 */
function potter_gutenberg_block_editor_assets() {

	$inline_styles = potter_generate_gutenberg_css();

	wp_enqueue_style( 'potter-gutenberg-style', get_template_directory_uri() . '/css/block-editor-styles.css', '', POTTER_VERSION );
	wp_add_inline_style( 'potter-gutenberg-style', $inline_styles );

}
add_action( 'enqueue_block_editor_assets', 'potter_gutenberg_block_editor_assets' );
