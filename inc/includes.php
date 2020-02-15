<?php
/**
 * Init.
 *
 * @package Potter
 */
defined( 'ABSPATH' ) || die( "Can't access directly" );
/**
 *
 * @return bool True or false.
 */
// Backwards compatibility.
require_once POTTER_THEME_DIR . '/inc/theme-functions/backwards-compatibility.php';

// Options.
require_once POTTER_THEME_DIR . '/inc/theme-functions/options.php';

// Kirki framework.
require_once POTTER_THEME_DIR . '/assets/kirki/kirki.php';

// Kirki customizer settings.
require_once POTTER_THEME_DIR . '/inc/customizer/potter-kirki.php';

// Body classes.
require_once POTTER_THEME_DIR . '/inc/theme-functions/body-classes.php';

// Breadcrumbs.
if ( ! function_exists( 'breadcrumb_trail' ) ) {
	require_once POTTER_THEME_DIR . '/inc/theme-functions/breadcrumbs.php';
}
// Helpers.
require_once POTTER_THEME_DIR . '/inc/theme-functions/functions.php';

// Comments.
require_once POTTER_THEME_DIR . '/inc/template-parts/comments.php';

// Misc.
require_once POTTER_THEME_DIR . '/inc/theme-functions/misc.php';

// Gutenberg integration.
require_once POTTER_THEME_DIR . '/inc/integration/gutenberg/gutenberg.php';

// Customizer functions.
require_once POTTER_THEME_DIR . '/inc/customizer/customizer-functions.php';

// Theme mods.
require_once POTTER_THEME_DIR . '/inc/theme-functions/theme-mods.php';

/* Integration */

// Header/Footer Elementor integration.
if ( ! function_exists( 'potter_header_footer_elementor_support' ) ) {
	// Backwards compatibility check .
	require_once POTTER_THEME_DIR . '/inc/integration/header-footer-elementor.php';
}

/**
 * Elementor Pro integration.
 *
 * @since 2.1
 */
function potter_do_elementor_pro_integration() {

	// Backwards compatibility check
	if ( function_exists( 'potter_elementor_pro_integration' ) ) {
		return;
	}

	require_once POTTER_THEME_DIR . '/inc/integration/elementor-pro.php';

}
add_action( 'elementor_pro/init', 'potter_do_elementor_pro_integration' );

// Beaver Themer integration.
// Backwards compatibility check .
if ( ! function_exists( 'potter_bb_header_footer_support' ) && class_exists( 'FLThemeBuilderLoader' ) && class_exists( 'FLBuilderLoader' ) ) {
	require_once POTTER_THEME_DIR . '/inc/integration/beaver-themer.php';
}

// Easy Digital Downloads integration.
if ( class_exists( 'Easy_Digital_Downloads' ) ) {
	require_once POTTER_THEME_DIR . '/inc/integration/edd/edd.php';
}

// WooCommerce integration.
if ( class_exists( 'WooCommerce' ) ) {
	require_once POTTER_THEME_DIR . '/inc/integration/woocommerce/woocommerce.php';
}

/**
 * Render pre header.
 */
function potter_do_pre_header() {
	get_template_part( 'inc/template-parts/pre-header' );
}
add_action( 'potter_pre_header', 'potter_do_pre_header' );

/**
 * Render header.
 */
function potter_do_header() {
	get_template_part( 'inc/template-parts/header' );
}
add_action( 'potter_header', 'potter_do_header' );

/**
 * Render footer.
 */
function potter_do_footer() {
	get_template_part( 'inc/template-parts/footer' );
}
add_action( 'potter_footer', 'potter_do_footer' );

/**
 * Render 404 page.
 */
function potter_do_404() {
	get_template_part( 'inc/template-parts/404' );
}
add_action( 'potter_404', 'potter_do_404' );
