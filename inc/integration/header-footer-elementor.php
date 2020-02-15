<?php
/**
 * Header Footer Elementor integration.
 *
 * https://wordpress.org/plugins/header-footer-elementor/
 *
 * @package Potter Premium Add-On
 * @subpackage Integration
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

/**
 * Render header if HFE header termplate exists.
 */
function potter_do_hfe_header() {

	if ( function_exists( 'hfe_render_header' ) && hfe_header_enabled() ) {
		hfe_render_header();
	}

}
add_action( 'potter_header', 'potter_do_hfe_header' );

/**
 * Render footer if HFE footer template exists.
 */
function potter_do_hfe_footer() {

	if ( function_exists( 'hfe_render_footer' ) && hfe_footer_enabled() ) {
		hfe_render_footer();
	}

}
add_action( 'potter_footer', 'potter_do_hfe_footer' );

/**
 * Remove theme header/footer if the respective HFE template is present.
 */
function potter_remove_header_footer_hfe() {

	if ( function_exists( 'hfe_render_header' ) && hfe_header_enabled() ) {
		remove_action( 'potter_header', 'potter_do_header' );
	}

	if ( function_exists( 'hfe_render_footer' ) && hfe_footer_enabled() ) {
		remove_action( 'potter_footer', 'potter_do_footer' );
	}

}
add_action( 'wp', 'potter_remove_header_footer_hfe' );

/**
 * Add HFE theme support.
 */
function potter_header_footer_elementor() {
	add_theme_support( 'header-footer-elementor' );
}
add_action( 'after_setup_theme', 'potter_header_footer_elementor' );
