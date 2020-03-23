<?php
/**
 * Theme mods.
 *
 * @package Potter
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

/**
 * Excerpt length.
 *
 * @param integer $excerpt_length The excerpt length.
 *
 * @return integer The updated excerpt lenght.
 */
function potter_excerpt_length( $excerpt_length ) {

	if( is_admin() ) return $excerpt_length;

	$potter_excerpt_length = get_theme_mod( 'excerpt_lenght' );

	if ( ! $potter_excerpt_length || 0 == $potter_excerpt_length ) {
		return $excerpt_length;
	}

	$excerpt_length = absint($potter_excerpt_length);

	return $excerpt_length;

}
add_filter( 'excerpt_length', 'potter_excerpt_length', 999 );

/**
 * Filter 404 page title.
 *
 * @param string $title The page title.
 *
 * @return string The updated page title.
 */
function potter_custom_404_title( $title ) {

	$custom_title = get_theme_mod( '404_headline' );

	if ( $custom_title ) {
		$title = esc_html($custom_title);
	}

	return $title;

}
add_filter( 'potter_404_headline', 'potter_custom_404_title' );


/**
 * Filter 404 page text.
 *
 * @param string $text The page text.
 *
 * @return string The updated page text.
 */
function potter_custom_404_text( $text ) {

	$custom_text = get_theme_mod( '404_text' );

	if ( $custom_text ) {
		$text = esc_html($custom_text);
	}

	return $text;

}
add_filter( 'potter_404_text', 'potter_custom_404_text' );

/**
 * Hide search form from 404 page.
 */
function potter_remove_404_search_form() {

	if ( is_404() && 'hide' === get_theme_mod( '404_search_form' ) ) {

		add_filter( 'get_search_form', '__return_false' );

	}

}
add_action( 'wp', 'potter_remove_404_search_form' );

/**
 * Construct search menu item.
 *
 * @param boolean $is_navigation If we're inside the navigation.
 * @param boolean $is_mobile If we're on mobile.
 *
 * @return string The search menu item.
 */
function potter_search_menu_item( $is_navigation = true, $is_mobile = false ) {

	$class = $is_mobile ? 'potter-mobile-nav-item' : 'potter-nav-item';

	// If we have a shop, let's call the product search form
	if ( class_exists( 'WooCommerce' ) && get_theme_mod( 'woocommerce_search_menu_item' ) ) {
		$search_form = get_product_search_form( $echo = false );
	} else {
		$search_form = get_search_form( $echo = false );
	}

	// Allow the search form to be filtered for more flexibility.
	$search_form = apply_filters( 'potter_search_menu_item_form', $search_form );

	// We have a slightly different markup for the search menu item if it's being displayed outside the main menu.
	$search_item  = $is_navigation ? '<li class="menu-item potter-menu-item-search" aria-haspopup="true" aria-expanded="false"><a href="javascript:void(0)" role="button">' : '<button class="' . $class . ' potter-menu-item-search" aria-haspopup="true" aria-expanded="false">';
	$search_item .= '<span class="screen-reader-text">' . __( 'Search Toggle', 'potter' ) . '</span>';
	$search_item .= '<div class="potter-menu-search">';
	$search_item .= $search_form;
	$search_item .= '</div>';
	$search_item .= '<i class="potterf potterf-search" aria-hidden="true"></i>';
	$search_item .= $is_navigation ? '</a></li>' : '</button>';

	return $search_item;

}


/**
 * Add search menu item to main menu.
 *
 * @param string $items The menu items.
 * @param object $args The arguments.
 *
 * @return string The updated menu items.
 */
function potter_search_menu_icon( $items, $args ) {

	// Stop here, if we have an off canvas menu.
	if ( potter_is_off_canvas_menu() ) {
		return $items;
	}

	// Only add the search menu item to the main navigation and if it's enabled.
	if ( 'main_menu' === $args->theme_location && get_theme_mod( 'menu_search_icon' ) ) {
		$items .= potter_search_menu_item();
	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'potter_search_menu_icon', 20, 2 );




/**
 * Add search menu item to mobile menu.
 */
function potter_search_menu_icon_mobile() {

	// Stop here if search menu item is turned off.
	if ( ! get_theme_mod( 'mobile_menu_search_icon' ) ) {
		return;
	}

	$menu_item = potter_search_menu_item( $is_navigation = false, $is_mobile = true );

	echo $menu_item;

}
add_action( 'potter_before_mobile_toggle', 'potter_search_menu_icon_mobile', 20 );




/**
 * Construct HTML Button.
 *
 * @param boolean $is_navigation If we're inside the navigation.
 * @param boolean $is_mobile If we're on mobile.
 *
 * @return string The search menu item.
 */
function potter_html_button_item( $is_navigation = true, $is_mobile = false ) {
	$menu_html_button_content = get_theme_mod( 'menu_html_button_content', __('<a href="#">Contact Us</a>', 'potter'  ));
	$class = $is_mobile ? 'potter-mobile-nav-item' : 'potter-nav-item';


	// We have a slightly different markup for the search menu item if it's being displayed outside the main menu.
	$button_item = '<li class="menu-item potter-menu-item-button">';
	$button_item .=  wp_kses_post( $menu_html_button_content );
	$button_item .= '</li>';

	return $button_item;

}

/**
 * Add Button item  to main menu.
 *
 * @param string $items The menu items.
 * @param object $args The arguments.
 *
 * @return string The updated menu items.
 */
function potter_nav_html_button( $items, $args ) {

	// Stop here, if we have an off canvas menu.
	if ( potter_is_off_canvas_menu() ) {
		return $items;
	}

	// Only add the search menu item to the main navigation and if it's enabled.
	if ( 'main_menu' === $args->theme_location && get_theme_mod( 'menu_html_button' ) ) {
		$items .= potter_html_button_item();
	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'potter_nav_html_button', 20, 2 );


/**
 * Construct custom icon.
 *
 * @param boolean $is_navigation If we're inside the navigation.
 * @param boolean $is_mobile If we're on mobile.
 *
 * @return string The search menu item.
 */



function potter_nav_icon_link( $is_navigation = true, $is_mobile = false ) {
	$class = $is_mobile ? 'potter-mobile-nav-item' : 'potter-nav-item';

	$defaults = [
[
	'link_text' => esc_html__( 'pottericon-twitter', 'potter' ),
	'link_url'  => esc_url('#'),
	'link_color' => '#333333',
],
];
// Theme_mod settings to check.
$settings = get_theme_mod( 'potter_icon_nav_bar', $defaults );
$icon_item = '';
	foreach( $settings as $setting ) :
		$icon_item .= '<li class="menu-item potter-menu-item-icon"><a href="' . esc_url($setting['link_url']) . '" target="_blank">';
		$icon_item .= '<span class="' . esc_attr($setting['link_text']) . '" style="color: '. esc_attr($setting['link_color']) .'">';
		$icon_item .= '</span></a></li>';
	endforeach;
	return $icon_item;
	// We have a slightly different markup for the search menu item if it's being displayed outside the main menu.
}

/**
 * Add Button item  to main menu.
 *
 * @param string $items The menu items.
 * @param object $args The arguments.
 *
 * @return string The updated menu items.
 */
function potter_nav_bar_icon_link( $items, $args ) {
	// Stop here, if we have an off canvas menu.
	if ( potter_is_off_canvas_menu() ) {
		return $items;
	}
	// Only add the search menu item to the main navigation and if it's enabled.
	if ( 'main_menu' === $args->theme_location && get_theme_mod( 'menu_icon_link' ) ) {
		$items .= potter_nav_icon_link();
	}
	return $items;

}
add_filter( 'wp_nav_menu_items', 'potter_nav_bar_icon_link', 20, 2 );



/**
 * Custom breadcrumbs separator.
 *
 * @param string $separator The separator.
 *
 * @return string The updated separator.
 */
function potter_breadcrumbs_custom_separator( $separator ) {

	$custom_separator = get_theme_mod( 'breadcrumbs_separator' );

	if ( $custom_separator ) {
		$separator = $custom_separator;
	}

	return $separator;

}
add_filter( 'potter_breadcrumbs_separator', 'potter_breadcrumbs_custom_separator' );

/**
 * Next post link.
 *
 * @param string $next The next post link.
 *
 * @return string The updated post link.
 */
function potter_next_post_link( $next ) {

	if ( 'default' !== get_theme_mod( 'single_post_nav' ) ) {
		return $next;
	}

	$next = '%title &rarr;';

	return $next;

}
add_filter( 'potter_next_post_link', 'potter_next_post_link' );

/**
 * Previous post link.
 *
 * @param string $next The previous post link.
 *
 * @return string The updated post link.
 */
function potter_previous_post_link( $prev ) {

	if ( 'default' !== get_theme_mod( 'single_post_nav' ) ) {
		return $prev;
	}

	$prev = '&larr; %title';

	return $prev;

}
add_filter( 'potter_previous_post_link', 'potter_previous_post_link' );

/**
 * Categories title.
 *
 * @param string $title The categories title.
 *
 * @return string The updated categories title.
 */
function potter_categories_title( $title ) {

	$cat_title = get_theme_mod( 'blog_categories_title' );

	if ( $cat_title && __( 'Filed under:', 'potter' ) !== $cat_title ) {

		$title = $cat_title;

	}

	return $title;

}
add_filter( 'potter_categories_title', 'potter_categories_title' );

/**
 * Read more text.
 *
 * @param string $text The read more text.
 *
 * @return string The updated read more text.
 */
function potter_read_more_text( $text ) {

	$read_more_text = get_theme_mod( 'blog_read_more_text' );

	if ( $read_more_text && __('Read more', 'potter') !== $read_more_text ) {

		$text = $read_more_text;

	}

	return $text;

}
add_filter( 'potter_read_more_text', 'potter_read_more_text' );

/**
 * Article meta separatpr.
 *
 * @param string $separator The separator.
 *
 * @return string The updated separator.
 */
function potter_article_meta_separator( $separator ) {

	$blog_meta_separator = get_theme_mod( 'blog_meta_separator' );

	if ( $blog_meta_separator ) {
		$separator = ' ' . $blog_meta_separator . ' ';
	}

	return esc_html($separator);

}
add_filter( 'potter_article_meta_separator', 'potter_article_meta_separator' );

/**
 * Custom mobile logo.
 *
 * @param string $logo_url The logo url.
 *
 * @return string The updated logo url.
 */
function potter_mobile_logo( $logo_url ) {

	$custom_logo_url = get_theme_mod( 'menu_mobile_logo' );

	if ( $custom_logo_url ) {
		$logo_url = $custom_logo_url;
	}

	return $logo_url;

}
add_filter( 'potter_logo_mobile', 'potter_mobile_logo' );
