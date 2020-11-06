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

/**
* render admin Notices
*/

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
add_action( 'admin_notices', 'potter_theme_activation_notice' );
}

function potter_theme_activation_notice(){
	if ( is_plugin_active( 'potter-kit/potter-kit.php' ) ) {
		?>
		<div class="updated notice is-dismissible">
		<svg width="60px" style="padding: 10px; display: inline-block; vertical-align: middle;" viewBox="0 0 362 362" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<defs>
			<linearGradient x1="0%" y1="0%" x2="101.315975%" y2="100.322682%" id="linearGradient-1">
					<stop stop-color="#372E8B" offset="0%"></stop>
					<stop stop-color="#753E7E" offset="100%"></stop>
			</linearGradient>
	</defs>
	<g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<path d="M97.8266208,341.8005 C39.7108455,311.679242 0,250.977103 0,181 C0,81.0364603 81.0364603,0 181,0 C280.96354,0 362,81.0364603 362,181 C362,279.883851 282.704607,360.247271 184.232363,361.971718 C194.582499,358.226645 193.499867,352.433108 193.499867,352.433108 L193.499867,289.211653 L158.278654,289.211653 C89.41688,292.123936 95.2603648,334.132043 95.2603648,334.132043 C95.6602411,336.966062 96.552089,339.512512 97.8266208,341.8005 Z M89,296.698712 C107.780647,269.663474 150.767202,268.831648 150.767202,268.831648 L211.281524,268.831648 C308.106052,254.2738 297.671962,164.848932 297.671962,164.848932 C286.404111,84.1591301 212.11618,80 212.11618,80 L157.444446,80 C92.7559502,80.4150205 89,127.831781 89,127.831781 L89,296.698712 Z" id="Combined-Shape-Copy-3" fill="url(#linearGradient-1)"></path>
	</g>
		</svg>
		<div class="notification-content-potter" style="display: inline-block; padding-bottom: 10px; vertical-align: middle;">
					<h2 style="margin-bottom: 2px;">Thanks for activating Potter Theme!</h2>
		      <p>Now You can import predesigned Websites and can create Elementor Blocks to publish them in several none editable places in the website. <a href="https://wppotter.com/potter-kit" traget="_blank">Visit Potter Kit for More info</a></p>
					<a class="button button-primary" href="themes.php?page=demo-importer&browse=all"> Browse Now </a>
		  </div>
		</div>
		<?php
} else {
?>
<div class="updated notice is-dismissible">
	<svg width="60px" style="padding: 10px; display: inline-block; vertical-align: middle;" viewBox="0 0 270 270" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	    <title>Group 7</title>
	    <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	        <g id="Group-7">
	            <circle id="Oval" fill="#20447E" cx="135" cy="135" r="135"></circle>
	            <polygon id="Fill-1" fill="#F15A24" points="128.231899 46 98.6949519 62.9885515 98 86.217522 138.656923 109.446493 138.308702 154.865108 158.463053 167 188 148.970635 187.305048 80.3237929"></polygon>
	            <polygon id="Fill-2" fill="#FFFFFF" points="83.3496399 223 133 194.637286 132.65036 151.054469 83 122"></polygon>
	        </g>
	    </g>
	</svg>
<div class="notification-content-potter" style="display: inline-block; padding-bottom: 20px; vertical-align: middle;">
			<h2 style="margin-bottom: 2px;">Thank you for installing Potter!</h2>
      <p>Did you know Potter comes with dozens of ready-to-use <a href="https://wppotter.com/potter-kit" target="_blank">starter templates?</a> and other features. Go to theme page and install the Potter Kit plugin to get started.</p>
			<a class="button button-primary" href="themes.php?page=potter"> Get Started </a>
  </div>
</div>
  <?php
}
}
