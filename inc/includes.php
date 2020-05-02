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
		<svg width="60px" style="padding: 10px; display: inline-block;" viewBox="0 0 130 127" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		    <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		        <g id="Group-3" fill="#0056FF">
		            <path d="M112.564253,70.1937764 L112.742402,61.1321986 L112.719073,61.1549521 L112.719073,61.1506858 L99.8145926,73.9737001 L120.097404,43.2643087 L123.198042,63.0193162 L112.564253,70.1937764 Z M107.997421,108.093271 L54.4947991,93.0688564 L66.3819928,69.7671484 L87.7676305,91.4249167 L108.671135,70.6566677 L107.997421,108.093271 Z M86.8542642,120.251457 L76.7916823,112.303378 L85.4064514,109.667528 L69.2740838,101.266513 L104.57654,111.181346 L86.8542642,120.251457 Z M39.5486766,119.652756 L37.2178959,63.7950681 L62.9349541,67.9845546 L49.0902439,95.1486677 L75.149461,108.721125 L39.5486766,119.652756 Z M21.5188825,103.184916 L25.9280664,91.09428 L31.0802441,98.5311164 L31.0894343,98.4742327 L31.1127633,98.5083629 L34.0373735,80.5622579 L34.079083,81.5591452 L35.5721399,117.334744 L21.5188825,103.184916 Z M7.49743735,57.735529 L59.5472983,38.2521412 L63.5506987,64.1349484 L33.5813973,59.2657013 L28.8109671,88.3944361 L7.49743735,57.735529 Z M17.4971016,35.4001333 L30.2722118,35.8815119 L24.851397,43.1071674 L24.8549317,43.1064563 L24.8535178,43.1078784 L42.7914098,40.3646607 L8.46170332,53.2139837 L17.4971016,35.4001333 Z M56.1037942,7.92244866 L90.6236675,51.7250521 L69.3822456,62.5222947 L67.3816058,63.5390913 L62.712268,33.3729395 L33.7051118,37.8091592 L56.1037942,7.92244866 Z M80.3136566,10.5860292 L83.8087673,22.9646394 L75.2993322,20.0038414 L83.448228,36.3444032 L60.6762812,7.44675849 L80.3136566,10.5860292 Z M118.234618,39.0378477 L87.4784921,85.6050003 L69.131282,67.0182423 L96.2268728,53.2666011 L83.0459792,26.834866 L118.234618,39.0378477 Z M129.904074,61.2992945 L126.404722,38.9980291 C125.948038,36.0898485 123.945985,33.686511 121.179729,32.7265981 L90.747382,22.164712 L87.1186597,9.31396685 C86.280936,6.34961359 83.7847313,4.12190461 80.7597357,3.63839292 L58.5908087,0.0952477357 C55.7474966,-0.360533132 52.7811769,0.845401894 51.0463465,3.15630333 L31.6599348,28.9971587 L18.3991569,28.497293 C15.2999326,28.3792592 12.4679315,30.0637286 11.0667767,32.8261446 L0.864927604,52.9373866 C-0.464826269,55.5611485 -0.249209613,58.6883314 1.42835867,61.1009125 L19.8575738,87.6108628 L15.2702411,100.190699 C14.2147799,103.083237 14.9323238,106.361162 17.0976806,108.54123 L32.961411,124.514892 C34.454468,126.017334 36.4388482,126.844281 38.5504776,126.844281 C39.3309392,126.844281 40.1064522,126.72838 40.8536876,126.498712 L71.646574,117.051747 L82.0923173,125.303443 C83.4765056,126.397032 85.2099221,127 86.9709093,127 C88.2101748,127 89.4487335,126.70136 90.5529735,126.136078 L110.557958,115.896296 C113.166566,114.560951 114.820098,111.90377 114.874532,108.960037 L115.456344,76.5889295 L126.502986,69.1357391 C129.047263,67.4192726 130.381965,64.342574 129.904074,61.2992945 Z" id="Fill-1"></path>
		        </g>
		    </g>
		</svg>
		<div class="notification-content-potter" style="display: inline-block; padding-bottom: 10px;">
					<h2>Potter Kit - Pre Designed Pagebuilder Templates</h2>
		      <p>Did you know Potter comes with dozens of ready-to-use <a href="https://wppotter.com/potter-kit" traget="_blank">starter templates?</a></p>
					<a class="button button-primary" href="themes.php?page=demo-importer&browse=all"> Browse Now </a>
		  </div>
		</div>
		<?php
} else {
?>
<div class="updated notice is-dismissible">
<svg width="60px" style="padding: 10px; display: inline-block;" viewBox="0 0 130 127" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Group-3" fill="#0056FF">
            <path d="M112.564253,70.1937764 L112.742402,61.1321986 L112.719073,61.1549521 L112.719073,61.1506858 L99.8145926,73.9737001 L120.097404,43.2643087 L123.198042,63.0193162 L112.564253,70.1937764 Z M107.997421,108.093271 L54.4947991,93.0688564 L66.3819928,69.7671484 L87.7676305,91.4249167 L108.671135,70.6566677 L107.997421,108.093271 Z M86.8542642,120.251457 L76.7916823,112.303378 L85.4064514,109.667528 L69.2740838,101.266513 L104.57654,111.181346 L86.8542642,120.251457 Z M39.5486766,119.652756 L37.2178959,63.7950681 L62.9349541,67.9845546 L49.0902439,95.1486677 L75.149461,108.721125 L39.5486766,119.652756 Z M21.5188825,103.184916 L25.9280664,91.09428 L31.0802441,98.5311164 L31.0894343,98.4742327 L31.1127633,98.5083629 L34.0373735,80.5622579 L34.079083,81.5591452 L35.5721399,117.334744 L21.5188825,103.184916 Z M7.49743735,57.735529 L59.5472983,38.2521412 L63.5506987,64.1349484 L33.5813973,59.2657013 L28.8109671,88.3944361 L7.49743735,57.735529 Z M17.4971016,35.4001333 L30.2722118,35.8815119 L24.851397,43.1071674 L24.8549317,43.1064563 L24.8535178,43.1078784 L42.7914098,40.3646607 L8.46170332,53.2139837 L17.4971016,35.4001333 Z M56.1037942,7.92244866 L90.6236675,51.7250521 L69.3822456,62.5222947 L67.3816058,63.5390913 L62.712268,33.3729395 L33.7051118,37.8091592 L56.1037942,7.92244866 Z M80.3136566,10.5860292 L83.8087673,22.9646394 L75.2993322,20.0038414 L83.448228,36.3444032 L60.6762812,7.44675849 L80.3136566,10.5860292 Z M118.234618,39.0378477 L87.4784921,85.6050003 L69.131282,67.0182423 L96.2268728,53.2666011 L83.0459792,26.834866 L118.234618,39.0378477 Z M129.904074,61.2992945 L126.404722,38.9980291 C125.948038,36.0898485 123.945985,33.686511 121.179729,32.7265981 L90.747382,22.164712 L87.1186597,9.31396685 C86.280936,6.34961359 83.7847313,4.12190461 80.7597357,3.63839292 L58.5908087,0.0952477357 C55.7474966,-0.360533132 52.7811769,0.845401894 51.0463465,3.15630333 L31.6599348,28.9971587 L18.3991569,28.497293 C15.2999326,28.3792592 12.4679315,30.0637286 11.0667767,32.8261446 L0.864927604,52.9373866 C-0.464826269,55.5611485 -0.249209613,58.6883314 1.42835867,61.1009125 L19.8575738,87.6108628 L15.2702411,100.190699 C14.2147799,103.083237 14.9323238,106.361162 17.0976806,108.54123 L32.961411,124.514892 C34.454468,126.017334 36.4388482,126.844281 38.5504776,126.844281 C39.3309392,126.844281 40.1064522,126.72838 40.8536876,126.498712 L71.646574,117.051747 L82.0923173,125.303443 C83.4765056,126.397032 85.2099221,127 86.9709093,127 C88.2101748,127 89.4487335,126.70136 90.5529735,126.136078 L110.557958,115.896296 C113.166566,114.560951 114.820098,111.90377 114.874532,108.960037 L115.456344,76.5889295 L126.502986,69.1357391 C129.047263,67.4192726 130.381965,64.342574 129.904074,61.2992945 Z" id="Fill-1"></path>
        </g>
    </g>
</svg>
<div class="notification-content-potter" style="display: inline-block; padding-bottom: 10px;">
			<h2>Thank you for installing Potter!</h2>
      <p>Did you know Potter comes with dozens of ready-to-use <a href="https://wppotter.com/potter-kit" traget="_blank">starter templates?</a> Go to theme page and install the Potter Kit plugin to get started.</p>
			<a class="button button-primary" href="themes.php?page=potter"> Get Started </a>
  </div>
</div>
  <?php
}
}
