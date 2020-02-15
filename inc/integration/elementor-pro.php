<?php
/**
 * Elementor Pro integration.
 *
 * @package Potter
 * @subpackage Integration
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

/**
 * Register Elementor locations.
 *
 * @param object $elementor_theme_manager The elementor theme manager.
 */
function potter_elementor_locations( $elementor_theme_manager ) {

	// Header.
	$elementor_theme_manager->register_location(
		'header',
		[
			'hook'         => 'potter_header',
			'remove_hooks' => ['potter_do_header'],
		]
	);

	$elementor_theme_manager->register_location(
		'before-header',
		[
			'label'    => __( 'Before Header', 'potter' ),
			'multiple' => true,
			'hook'     => 'potter_before_header',
		]
	);

	$elementor_theme_manager->register_location(
		'pre-header',
		[
			'label'        => __( 'Pre Header', 'potter' ),
			'multiple'     => true,
			'hook'         => 'potter_before_header',
			'remove_hooks' => ['potter_do_pre_header'],
		]
	);

	$elementor_theme_manager->register_location(
		'after-header',
		[
			'label'    => __( 'After Header', 'potter' ),
			'multiple' => true,
			'hook'     => 'potter_after_header',
		]
	);

	// Footer.
	$elementor_theme_manager->register_location(
		'footer',
		[
			'hook'         => 'potter_footer',
			'remove_hooks' => ['potter_do_footer'],
		]
	);

	$elementor_theme_manager->register_location(
		'before-footer',
		[
			'label'    => __( 'Before Footer', 'potter' ),
			'multiple' => true,
			'hook'     => 'potter_before_footer',
		]
	);

	$elementor_theme_manager->register_location(
		'after-footer',
		[
			'label'    => __( 'After Footer', 'potter' ),
			'multiple' => true,
			'hook'     => 'potter_after_footer',
		]
	);

	// Article.
	$elementor_theme_manager->register_location(
		'before-post',
		[
			'label'    => __( 'Before Post', 'potter' ),
			'multiple' => true,
			'hook'     => 'potter_before_article',
		]
	);

	$elementor_theme_manager->register_location(
		'after-post',
		[
			'label'    => __( 'After Post', 'potter' ),
			'multiple' => true,
			'hook'     => 'potter_after_article',
		]
	);

	// Sidebar.
	$elementor_theme_manager->register_location(
		'before-sidebar',
		[
			'label'    => __( 'Before Sidebar', 'potter' ),
			'multiple' => true,
			'hook'     => 'potter_sidebar_open',
		]
	);

	$elementor_theme_manager->register_location(
		'after-sidebar',
		[
			'label'    => __( 'After Sidebar', 'potter' ),
			'multiple' => true,
			'hook'     => 'potter_sidebar_close',
		]
	);

}
add_action( 'elementor/theme/register_locations', 'potter_elementor_locations' );
