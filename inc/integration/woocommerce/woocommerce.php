<?php
/**
 * WooCommerce integration.
 *
 * @package Potter
 * @subpackage Integration/WooCommerce
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

/**
 * Change inline styles location.
 *
 * @param string $location The stylesheet handle.
 *
 * @return string The updated stylesheet handle.
 */

/**
 * Theme setup.
 */
function potter_woo_theme_setup() {

	add_theme_support( 'woocommerce', array(
		'gallery_thumbnail_image_width' => 300,
		'single_image_width'            => 800,
	) );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'potter_woo_theme_setup' );

// Remove default WooCommerce styles.
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Enqueue scripts & styles.
 */
function potter_woo_scripts() {

	// WooCommerce layout.
	wp_enqueue_style( 'potter-woocommerce-layout', get_template_directory_uri() . '/css/min/woocommerce-layout-min.css', '', POTTER_VERSION );

	// WooCommerce.
	wp_enqueue_style( 'potter-woocommerce', get_template_directory_uri() . '/css/min/woocommerce-min.css', '', POTTER_VERSION );

	// WooCommerce smallscreen.
	wp_enqueue_style( 'potter-woocommerce-smallscreen', get_template_directory_uri() . '/css/min/woocommerce-smallscreen-min.css', '', POTTER_VERSION );

}
add_action( 'wp_enqueue_scripts', 'potter_woo_scripts', 10 );

// WooCommerce customizer settings.
require_once POTTER_THEME_DIR . '/inc/integration/woocommerce/potter-kirki-woocommerce.php';

// WooCommerce functions.
require_once POTTER_THEME_DIR . '/inc/integration/woocommerce/woocommerce-functions.php';

// WooCommerce customizer styles.
require_once POTTER_THEME_DIR . '/inc/integration/woocommerce/woocommerce-styles.php';
