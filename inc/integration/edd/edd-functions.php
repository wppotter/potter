<?php
/**
 * Easy Digital Downloads functions.
 *
 * @package Potter
 * @subpackage Integration/EDD
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

/**
 * Determine if we're on an EDD product page.
 *
 * @return boolean.
 */
function potter_is_edd_single() {

	if ( is_singular( 'download' ) ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Determine if we're on an EDD archive page.
 *
 * @return boolean.
 */
function potter_is_edd_archive() {

	if ( is_post_type_archive( 'download' ) || is_tax( 'download_category' ) || is_tax( 'download_tag' ) ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Determin if we're on an EDD page.
 *
 * @return boolean.
 */
function potter_is_edd_page() {

	if ( is_singular( 'download' ) || is_post_type_archive( 'download' ) || is_tax( 'download_category' ) || is_tax( 'download_tag' ) || edd_is_checkout() || edd_is_success_page() || edd_is_failed_transaction_page() || edd_is_purchase_history_page() ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Register sidebars.
 */
function potter_edd_sidebar() {

	// Shop page sidebar.
	register_sidebar( array(
		'id'            => 'potter-edd-sidebar',
		'name'          => __( 'Easy Digital Downloads Sidebar', 'potter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="potter-widgettitle">',
		'after_title'   => '</h4>',
		'description'   => __( 'This Sidebar is being displayed on EDD Archive Pages.', 'potter' ),
	) );

	// Product page sidebar.
	register_sidebar( array(
		'id'            => 'potter-edd-product-sidebar',
		'name'          => __( 'Easy Digital Downloads Product Page Sidebar', 'potter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="potter-widgettitle">',
		'after_title'   => '</h4>',
		'description'   => __( 'This Sidebar is being displayed on EDD Product Pages.', 'potter' ),
	) );

}
add_action( 'widgets_init', 'potter_edd_sidebar' );

/**
 * Apply sidebars.
 *
 * @param string $sidebar The sidebar.
 *
 * @return string The updated sidebar.
 */
function potter_edd_sidebars( $sidebar ) {

	if ( potter_is_edd_archive() ) {

		$sidebar = 'potter-edd-sidebar';

	} elseif ( potter_is_edd_single() ) {

		$sidebar = 'potter-edd-product-sidebar';

	}

	return $sidebar;

}
add_filter( 'potter_do_sidebar', 'potter_edd_sidebars' );

/**
 * Filter sidebar layout.
 *
 * @param string $sidebar The sidebar layout.
 *
 * @return string The updated sidebar layout.
 */
function potter_edd_sidebar_layout( $sidebar ) {

	if ( potter_is_edd_single() ) {

		$edd_single_sidebar_layout = get_theme_mod( 'edd_single_sidebar_layout', 'global' );

		if ( 'global' !== $edd_single_sidebar_layout ) {
			$sidebar = $edd_single_sidebar_layout;
		}
	}

	if ( potter_is_edd_archive() ) {

		$edd_sidebar_layout = get_theme_mod( 'edd_sidebar_layout', 'global' );

		if ( 'global' !== $edd_sidebar_layout ) {
			$sidebar = $edd_sidebar_layout;
		}
	}

	return $sidebar;

}
add_filter( 'potter_sidebar_layout', 'potter_edd_sidebar_layout' );

/**
 * Construct cart menu item.
 */
function potter_edd_menu_item() {

	// Vars.
	$icon        = get_theme_mod( 'edd_menu_item_icon', 'cart' );
	$css_classes = apply_filters( 'potter_edd_menu_item_classes', 'menu-item potter-edd-menu-item' );
	$title       = apply_filters( 'potter_edd_menu_item_title', __( 'Shopping Cart', 'potter' ) );
	$cart_count  = edd_get_cart_quantity();
	$cart_url    = edd_get_checkout_uri();

	// Construct.
	$menu_item  = '<li class="' . esc_attr( $css_classes ) . '">';

	$menu_item .= '<a href="' . esc_url( $cart_url ) . '" title="' . esc_attr( $title ) . '">';

	$menu_item .= '<span class="screen-reader-text">' . __( 'Shopping Cart', 'potter' ) . '</span>';

	$menu_item .= apply_filters( 'potter_edd_before_menu_item', '' );

	$menu_item .= '<i class="potterf potterf-' . esc_attr( $icon ) . '"></i>';

	if ( 'hide' !== get_theme_mod( 'edd_menu_item_count' ) ) {
		$menu_item .= '<span class="potter-edd-menu-item-count">' . wp_kses_data( $cart_count ) . '<span class="screen-reader-text">' . __( 'Items in Cart', 'potter' ) . '</span></span>';
	}

	$menu_item .= apply_filters( 'potter_edd_after_menu_item', '' );

	$menu_item .= '</a>';

	$menu_item .= apply_filters( 'potter_edd_menu_item_dropdown', '' );

	$menu_item .= '</li>';

	return $menu_item;

}

/**
 * Add cart menu item to main navigation.
 *
 * @param string $items The HTML list content for the menu items.
 * @param object $args The arguments.
 *
 * @return string The updated HTML.
 */
function potter_edd_menu_icon( $items, $args ) {

	// Stop right here if menu item is hidden.
	if ( 'hide' === get_theme_mod( 'edd_menu_item_desktop' ) ) {
		return $items;
	}

	// Hide if we're on non-EDD pages.
	if ( get_theme_mod( 'edd_menu_item_hide_if_not_edd' ) && ! potter_is_edd_page() ) {
		return $items;
	}

	// Stop here if we're on a off canvas menu.
	if ( potter_is_off_canvas_menu() ) {
		return $items;
	}

	// Finally, add menu item to main menu.
	if ( 'main_menu' === $args->theme_location ) {
		$items .= potter_edd_menu_item();
	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'potter_edd_menu_icon', 10, 2 );

/**
 * Add cart menu item to mobile navigation.
 */
function potter_edd_menu_icon_mobile() {

	// Stop right here if menu item is hidden.
	if ( 'hide' === get_theme_mod( 'edd_menu_item_mobile' ) ) {
		return;
	}

	// Hide if we're on non-EDD pages.
	if ( get_theme_mod( 'edd_menu_item_hide_if_not_edd' ) && ! potter_is_edd_page() ) {
		return;
	}

	// Construct.
	$menu_item  = '<ul class="potter-mobile-nav-item">';
	$menu_item .= potter_edd_menu_item();
	$menu_item .= '</ul>';

	return $menu_item;

}
add_action( 'potter_before_mobile_toggle', 'potter_edd_menu_icon_mobile' );

/**
 * EDD ajax.
 */
function potter_edd_ajax() {

	wp_enqueue_script( 'potter-edd-ajax', get_template_directory_uri() . '/assets/edd/js/edd-ajax.js', array( 'jquery' ), '', true );

	wp_localize_script(
		'potter-edd-ajax',
		'potter_edd_fragments',
		array(
			'ajaxurl' => function_exists( 'edd_get_ajax_url' ) ? edd_get_ajax_url() : admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'edd_ajax_nonce' ),
		)
	);

}
add_action( 'wp_enqueue_scripts', 'potter_edd_ajax' );


/**
 * EDD fragments.
 */
function potter_edd_fragments() {

	check_ajax_referer( 'edd_ajax_nonce', 'security' );

	echo potter_edd_menu_item();
	die();

}
add_action( 'wp_ajax_potter_edd_fragments', 'potter_edd_fragments' );
add_action( 'wp_ajax_nopriv_potter_edd_fragments', 'potter_edd_fragments' );
